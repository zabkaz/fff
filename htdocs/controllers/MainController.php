<?php

class MainController extends Controller{

	function homepage(){
		$this->f3->set('content','index.htm');
		$this->f3->set('map','map.htm');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('title','JobChallenge');
		echo View::instance()->render('layout.htm');
	}	
	
	function exhibitor(){
		$this->f3->set('content','exhibitor.htm');
		$this->f3->set('map','map.htm');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('title','Vystavovatel');
		echo View::instance()->render('layout.htm');
	}	
	
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
	
	function participantLog(){
		$this->f3->set('content','participantLog.htm');
		$this->f3->set('title','Chci se zucastnit');
		echo View::instance()->render('layout.htm');
	}
	
	function participantProfile(){
		$this->f3->set('content','participantProfile.htm');
		$this->f3->set('title','Profil');
		echo View::instance()->render('layout.htm');
	}
	
	function exhibitorLog(){
		$this->f3->set('content','exhibitorLog.htm');
		$this->f3->set('map','map.htm');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('title','Profil');
		echo View::instance()->render('layout.htm');
	}
	
	function exhibitorProfile(){
		$this->f3->set('content','exhibitorPofile.htm');
		$this->f3->set('title','Profil');
		echo View::instance()->render('layout.htm');
	}
	
	function error(){
		echo \Template::instance()->render('error.html');
	}
}
