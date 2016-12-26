<?php

class AuthController extends Controller{

    function beforeroute(){
        if($this->f3->get('SESSION.user') === null ) {
            $this->f3->reroute('/fail');
            exit;
        }
    }
	
	function participantAuth(){
		$this->loadLectures();
        $this->f3->set('content','participantAuth.htm');
		$this->f3->set('title','Chci se zucastnit');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('map','map.htm');
        echo View::instance()->render('layout.htm');
    }
	
	 function enroll(){
    	$curse = $this->f3->get('PARAMS.curse');    	
    	$studenName = $this->f3->get('SESSION.user');

		$student = new UserP($this->db);
    	$student->getByName($studenName);
    	echo 'Start';
    	echo $student->id;
    	echo $curse;

    	$lectures = new Lectures($this->db);
    	$lectures->getLecture($student->id, $curse);

    	if($lectures->dry()){
    		$lectures->addLecture($student->id, $curse);
    	}else{
    		$lectures->delete($student->id, $curse);
    	}
		$this->f3->reroute('/participant/auth#programmeTable');

		// $this->participantAuth();
	}
	
	function participantProfile(){
		$this->f3->set('content','participantProfile.htm');
		$this->f3->set('title','Profil');
		echo View::instance()->render('layout.htm');
	}
	
	function exhibitorAuth(){
		$this->loadPinfo();
		$this->f3->set('content','exhibitorAuth.htm');
		$this->f3->set('map','map.htm');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('title','Vystavovatel');
		echo View::instance()->render('layout.htm');
	}
	
	function order(){
		$this->f3->set('content','order.htm');
		$this->f3->set('title','Objednani');
		echo View::instance()->render('layout.htm');
	}
	
	function exhibitorProfile(){
		$this->loadEinfo();
		$this->f3->set('content','exhibitorProfile.htm');
		$this->f3->set('title','Profil');
		echo View::instance()->render('layout.htm');
	}
	
	function exhibitorEdit(){
		$name = $this->f3->get('SESSION.user');
		$user = new UserE($this->db);
    	$user->getByName($name);

    	$info = new infoE($this->db);
    	$info->edit($user->id);

    	$address = new Address($this->db);
    	$address->edit($info->address_id);

    	$this->f3->reroute('/exhibitor/auth');
	}
	
	function participantEdit(){
		$name = $this->f3->get('SESSION.user');
		$user = new UserP($this->db);
    	$user->getByName($name);

    	$info = new infoP($this->db);
    	$info->edit($user->id);    

    	$this->f3->reroute('/participant/auth');
	}
	
	function logout(){
		$this->f3->clear('SESSION');
		$this->f3->reroute('/');
	}
	
	function checkLogin(){
		$db = $this->db;
		$login = $this->f3->get('GET.login');
		$result = $db->exec('SELECT username FROM login WHERE username=?', $login);
		if (sizeof($result) == 0) {
			echo 'success';
		} else {
			echo 'failed';
    }
	
	}
	
	// ----------------------------
	// Helper functions
	// ----------------------------
	private function loadLectures(){
		$this->f3->set('hash',array( '0'=>0,'1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0,'8'=>0 ) );
		$this->f3->set('capacity',array( '0'=>0,'1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0,'8'=>0 ) );

		$studenName = $this->f3->get('SESSION.user');
		$student = new UserP($this->db);
    	$student->getByName($studenName);

    	$lectures = new Lectures($this->db);

    	$enrolled = $lectures->find(array('studentID=?',$student->id),array('order'=>'lecture'));
    	foreach ($enrolled as $obj){
    		$this->f3['hash'][$obj->lecture] = 1;
    	}
		for ($i = 0; $i < 9; $i++) {
    		$this->f3['capacity'][$i] = $lectures->count(array('lecture=?',$i));
		}		
	}	
	
	private function loadEinfo(){
		$name = $this->f3->get('SESSION.user');
		$user = new UserE($this->db);
    	$user->getByName($name);

    	$info = new infoE($this->db);
    	$info->getById($user->id);

    	$this->f3->set('c_name', $info->c_name);
    	$this->f3->set('email', $info->email);
    	$this->f3->set('tel_num', $info->tel_num);
    	$this->f3->set('full_name', $info->full_name);
    	$this->f3->set('con_email', $info->con_email);
    	$this->f3->set('con_tel_num', $info->con_tel_num);
    	$this->f3->set('con_country', $info->con_country);

    	$address = new Address($this->db);
    	$address->getById($info->address_id);

    	$this->f3->set('street', $address->street);
    	$this->f3->set('city', $address->city);
    	$this->f3->set('zip', $address->zip);
    	$this->f3->set('country', $address->country);

    	$this->f3->set('user_id', $user->id);
    	// TODO cor address
		
		$interest = new Interest($this->db);
		$interest->getById($user->id);
		
    	$this->f3->set('o_fin', $interest->fin == 1 ? 'active' : '');
		$this->f3->set('o_hr', $interest->hr == 1 ? 'active' : '');
		$this->f3->set('o_chem', $interest->chem == 1 ? 'active' : '');
		$this->f3->set('o_it', $interest->it == 1 ? 'active' : '');
		$this->f3->set('o_jaz', $interest->jaz == 1 ? 'active' : '');
		$this->f3->set('o_obch', $interest->obch == 1 ? 'active' : '');
		$this->f3->set('o_por', $interest->por == 1 ? 'active' : '');
		$this->f3->set('o_prav', $interest->prav == 1 ? 'active' : '');
		$this->f3->set('o_stav', $interest->stav == 1 ? 'active' : '');
		$this->f3->set('o_serv', $interest->serv == 1 ? 'active' : '');		
		$this->f3->set('o_stro', $interest->stro == 1 ? 'active' : '');		
		$this->f3->set('o_tech', $interest->tech == 1 ? 'active' : '');		
		$this->f3->set('o_zem', $interest->zem == 1 ? 'active' : '');
		
    }
	
	private function loadPinfo(){
		$name = $this->f3->get('SESSION.user');
		$user = new UserE($this->db);
    	$user->getByName($name);

    	$info = new infoE($this->db);
    	$info->getById($user->id);

       	$this->f3->set('first_name', $info->first_name);
    	$this->f3->set('last_name', $info->last_name);
    	$this->f3->set('email', $info->email);
    	$this->f3->set('studium', $info->studium);
    	$this->f3->set('univerzita', $info->univerzita);
    	$this->f3->set('fakulta', $info->fakulta);
		$this->f3->set('rocnik', $info->rocnik);

		$interest = new Interest($this->db);
		$interest->getById($user->id);
		
    	$this->f3->set('o_fin', $interest->fin == 1 ? 'active' : '');
		$this->f3->set('o_hr', $interest->hr == 1 ? 'active' : '');
		$this->f3->set('o_chem', $interest->chem == 1 ? 'active' : '');
		$this->f3->set('o_it', $interest->it == 1 ? 'active' : '');
		$this->f3->set('o_jaz', $interest->jaz == 1 ? 'active' : '');
		$this->f3->set('o_obch', $interest->obch == 1 ? 'active' : '');
		$this->f3->set('o_por', $interest->por == 1 ? 'active' : '');
		$this->f3->set('o_prav', $interest->prav == 1 ? 'active' : '');
		$this->f3->set('o_stav', $interest->stav == 1 ? 'active' : '');
		$this->f3->set('o_serv', $interest->serv == 1 ? 'active' : '');		
		$this->f3->set('o_stro', $interest->stro == 1 ? 'active' : '');		
		$this->f3->set('o_tech', $interest->tech == 1 ? 'active' : '');		
		$this->f3->set('o_zem', $interest->zem == 1 ? 'active' : '');
		
		
    }
}