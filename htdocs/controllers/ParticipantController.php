<?php

class ParticipantController extends Controller{
	
	function participant(){
		$this->f3->set('error','');
		$this->f3->set('content','participant.htm');
		$this->f3->set('map','map.htm');
		$this->f3->set('slider','slider.htm');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('title','Chci se zucastnit');
		echo View::instance()->render('layout.htm');
	}	
	
	function participantWrong(){
		$this->f3->set('error','true');
		$this->f3->set('content','participant.htm');
		$this->f3->set('map','map.htm');
		$this->f3->set('slider','slider.htm');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('title','Chci se zucastnit');
		echo View::instance()->render('layout.htm');
	}	
	
	function registerP(){
        $user = new UserP($this->db);
        $user->add();

        $info = new InfoP($this->db);
        $info->add($user->id);

        $interest = new Interest($this->db);
        $interest->add($user->id);

		$this->f3->set('SESSION.user', $user->username);
		$this->f3->set('SESSION.type', 'p');
		$this->f3->reroute('/participant/auth');
    }
	
	function loginMobileP(){
		$this->f3->set('content','loginMobileP.htm');
		$this->f3->set('title','Login');
		echo View::instance()->render('layout.htm');
	}
	
	function registerMobileP(){
		$this->f3->set('content','registerMobileP.htm');
		$this->f3->set('title','Registrace');
		echo View::instance()->render('layout.htm');
	}

	function checkLoginP(){
		$login = $this->f3->get('GET.login');
		$user =  new UserP($this->db);
		$user->getByName($login);
		if ($user->dry()) {
			echo 'success';
		} else {
			echo 'failed';
		}
	}
	
	function authenticate() {
        $username = $this->f3->get('POST.username');
        $password = $this->f3->get('POST.password');

        $user = new UserP($this->db);
        $user->getByName($username);

        if($user->dry()) {
            $this->f3->reroute('/participantWrong');
        }
        if(\Bcrypt::instance()->verify($password, $user->password)){
            $this->f3->set('SESSION.user', $user->username);
			$this->f3->set('SESSION.type', 'p');
            
            $this->f3->reroute('/participant/auth');
        } else {
            $this->f3->reroute('/participantWrong');
        }
    }
}
