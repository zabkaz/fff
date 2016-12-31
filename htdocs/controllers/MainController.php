<?php

class MainController extends Controller{

	function homepage(){
		$this->f3->set('navigation','navigation.htm');
		$this->f3->set('content','index.htm');
		$this->f3->set('video','video.htm');
		$this->f3->set('map','map.htm');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('title','JobChallenge');
		echo View::instance()->render('layout.htm');
	}		
		
	function error(){
		$this->f3->set('content','error.htm');
		$this->f3->set('title','Chyba');
        echo View::instance()->render('layout.htm');
	}	
	
}
