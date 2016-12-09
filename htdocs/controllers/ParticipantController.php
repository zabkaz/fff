<?php

class ParticipantController extends Controller{

	
	function participant(){
		$this->f3->set('content','participant.htm');
		$this->f3->set('map','map.htm');
		$this->f3->set('title','Chci se zucastnit');
		$this->f3->set('state','2');
		echo View::instance()->render('layout.htm');
	}	
	
	function loginMobile(){
		$this->f3->set('content','loginMobile.htm');
		$this->f3->set('title','Login');
		echo View::instance()->render('layout.htm');
	}
	
	function authenticate() {
        $username = $this->f3->get('POST.username');
        $password = $this->f3->get('POST.password');

        $user = new UserP($this->db);
        $user->getByName($username);

        if($user->dry()) {
            $this->f3->reroute('/unknow');
        }
        //TODO add verification like bcrypt
        if($password == $user->password) {
            $this->f3->set('SESSION.user', $user->username);
            
            $this->f3->reroute('/participant/auth');
        } else {
            $this->f3->reroute('/wrong');
            //TODO reroute to previous page? how to choose between / and /uchazec
        }
    }
}
