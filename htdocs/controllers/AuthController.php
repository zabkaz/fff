<?php

class AuthController extends Controller{

    function beforeroute(){
        if($this->f3->get('SESSION.user') === null ) {
            $this->f3->reroute('/fail');
            exit;
        }
    }
}