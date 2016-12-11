<?php

class ExhibitorController extends Controller{

	function exhibitor(){
		$this->f3->set('error','');
		$this->f3->set('content','exhibitor.htm');
		$this->f3->set('slider','slider.htm');
		$this->f3->set('map','map.htm');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('title','Vystavovatel');
		echo View::instance()->render('layout.htm');
	}	
	
	function exhibitorWrong(){
		$this->f3->set('error','true');
		$this->f3->set('content','exhibitor.htm');
		$this->f3->set('slider','slider.htm');
		$this->f3->set('map','map.htm');
		$this->f3->set('contact','contact.htm');
		$this->f3->set('title','Vystavovatel');
		echo View::instance()->render('layout.htm');
	}	
	
	function loginMobileE(){
		$this->f3->set('content','loginMobileE.htm');
		$this->f3->set('title','Prihlášení');
		echo View::instance()->render('layout.htm');
	}
	
	function registerMobileE(){
		$this->f3->set('content','registerMobileE.htm');
		$this->f3->set('title','Registrace');
		echo View::instance()->render('layout.htm');
	}
			
	function authenticate() {
        $username = $this->f3->get('POST.username');
        $password = $this->f3->get('POST.password');

        $user = new UserE($this->db);
        $user->getByName($username);

        if($user->dry()) {
            $this->f3->reroute('/exhibitorWrong');
        }
        //TODO add verification like bcrypt
        if($password == $user->password) {
            $this->f3->set('SESSION.user', $user->username);
            
            $this->f3->reroute('/exhibitor/auth');
        } else {
            $this->f3->reroute('/exhibitorWrong');            
        }
    }
}
