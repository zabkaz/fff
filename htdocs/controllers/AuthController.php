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
		$this->f3->set('content','exhibitorProfile.htm');
		$this->f3->set('title','Profil');
		echo View::instance()->render('layout.htm');
	}
	
	function logout(){
		$this->f3->clear('SESSION');
		$this->f3->reroute('/');
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
}