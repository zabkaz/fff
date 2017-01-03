<?php

class Controller {
	
	protected $db;
	protected $f3;

	function beforeroute(){
		//echo 'Before routing - ';		
	}

	function afterroute(){
		//echo '- After routing';
	}

	function __construct() {
	
		$f3=Base::instance();
		$this->f3=$f3;
		
	    $db=new DB\SQL(
	        $f3->get('devdb'),
	        $f3->get('devdbusername'),
	        $f3->get('devdbpassword')
	    );

	    $this->db=$db;
	}
}