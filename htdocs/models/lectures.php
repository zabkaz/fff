<?php

class Lectures extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db) {
	    parent::__construct($db,'lectures');
	}
	
	public function all() {
	    $this->load();
	    return $this->query;
	}

	public function getLecture($id, $lect) {
        $this->load(array('studentID=? AND lecture=?',$id, $lect));
        return $this->query;
    }

    public function addLecture($id, $lect){
        $this->studentID = $id;
        $this->lecture = $lect;
        $this->save();
    }

    public function delete($id, $lect) {
        $this->load(array('studentID=? AND lecture=?' ,$id, $lect));
        $this->erase();
    }
}