<?php

class ExhibitorController extends Controller{

	function exhibitor(){
		$this->f3->set('content','exhibitor.htm');
		$this->f3->set('map','map.htm');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('title','Vystavovatel');
		echo View::instance()->render('layout.htm');
	}	
			
	function authenticate() {
        $username = $this->f3->get('POST.username');
        $password = $this->f3->get('POST.password');

        $user = new UserE($this->db);
        $user->getByName($username);

        if($user->dry()) {
            $this->f3->reroute('/unknow');
        }
        //TODO add verification like bcrypt
        if($password == $user->password) {
            $this->f3->set('SESSION.user', $user->username);
            
            $this->f3->reroute('/exhibitor/auth');
        } else {
            $this->f3->reroute('/wrong');
            //TODO reroute to previous page? how to choose between / and /uchazec
        }
    }
}
