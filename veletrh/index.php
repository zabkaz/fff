<?php
$f3 = require('lib/base.php');

$f3->set('DEBUG',1);
if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

// Load configuration
$f3->config('config.ini');

$f3->route('GET /',
	function($f3) {
		$f3->set('content','index.htm');
		$f3->set('map','map.htm');
		$f3->set('contact','contact.htm');
		$f3->set('title','JobChallenge');
		echo View::instance()->render('layout.htm');
	}
);

$f3->route('GET /exhibitor',
	function($f3) {
		$f3->set('content','exhibitor.htm');
		$f3->set('map','map.htm');
		$f3->set('contact','contact.htm');
		$f3->set('title','Vystavovatel');
		echo View::instance()->render('layout.htm');
	}
);

$f3->route('GET /participant',
	function($f3) {
		$f3->set('content','participant.htm');
		$f3->set('map','map.htm');
		$f3->set('title','Chci se zucastnit');
		$f3->set('state','2');
		echo View::instance()->render('layout.htm');
	}
);

$f3->route('GET /login',
	function($f3) {
		$f3->set('content','loginMobile.htm');
		$f3->set('title','Login');
		echo View::instance()->render('layout.htm');
	}
);

$f3->route('GET /participantLog',
	function($f3) {
		$f3->set('content','participantLog');
		$f3->set('title','Chci se zucastnit');
		echo View::instance()->render('layout.htm');
	}
);

$f3->route('GET /exhibitorLog',
	function($f3) {
		$f3->set('content','exhibitorLog');
		$f3->set('map','map.htm');
		$f3->set('contact','contact.htm');
		$f3->set('title','Profil');
		echo View::instance()->render('layout.htm');
	}
);


$f3->run();