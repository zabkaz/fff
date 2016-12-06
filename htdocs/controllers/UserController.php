<?php

class UserController extends AuthController{

    function render(){
        $this->f3->set('content','participantLog.htm');
        echo View::instance()->render('layout.htm');
    }

    function beforeroute(){
    }

    function authenticate() {

        $username = $this->f3->get('POST.username');
        $password = $this->f3->get('POST.password');

        $user = new User($this->db);
        $user->getByName($username);

        if($user->dry()) {
            $this->f3->reroute('/unknow');
        }

        //TODO add verification like bcrypt
        if($password == $user->password) {
            $this->f3->set('SESSION.user', $user->username);
            
            $this->f3->reroute('/uchazec/auth');
        } else {
            $this->f3->reroute('/wrong');
            //TODO reroute to previous page? how to choose between / and /uchazec
        }
    }
}