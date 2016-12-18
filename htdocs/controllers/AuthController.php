<?php

class AuthController extends Controller{

    function beforeroute(){
        if($this->f3->get('SESSION.user') === null ) {
            $this->f3->reroute('/fail');
            exit;
        }
    }
	
	function participantAuth(){
        $this->f3->set('content','participantAuth.htm');
		$this->f3->set('title','Chci se zucastnit');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('map','map.htm');
        echo View::instance()->render('layout.htm');
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
}