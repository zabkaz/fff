<?php

class MainController extends Controller{

	function homepage(){
		$this->f3->set('content','index.htm');
		$this->f3->set('map','map.htm');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('title','JobChallenge');
		echo View::instance()->render('layout.htm');
	}		
		
	function error(){
		echo \Template::instance()->render('error.html');
	}	
	
}
