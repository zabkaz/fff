<?php

class UserE extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db) {
	    parent::__construct($db,'login_vyst'); //TODO zmenit nazov
	}
	
	public function all() {
	    $this->load();
	    return $this->query;
	}

	public function getById($id) {
        $this->load(array('id=?',$id));
        return $this->query;
    }

    public function getByName($name) {
        $this->load(array('username=?', $name));
		return $this->query;
    }

    public function add() {
        $this->copyFrom('POST',function($val) {
            // the 'POST' array is passed to our callback function
            return array_intersect_key($val, array_flip(array('username','password')));
        });
        $this->save();
    }

    public function edit($id) {
        $this->load(array('id=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }

    public function delete($id) {
        $this->load(array('id=?',$id));
        $this->erase();
    }
}