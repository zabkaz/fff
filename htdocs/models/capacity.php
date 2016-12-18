<?php

class capacity extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db) {
	    parent::__construct($db,'capacity');
	}
	
	public function all() {
	    $this->load();
	    return $this->query;
	}

	public function getByPosition($position) {
        $this->load(array('position=?',$position));
        return $this->query;
    }

    public function enroll($position) {
        $this->getByPosition($position);
        $this->registred++; // TODO rename to registered
        $this->save();
    }

    public function disenroll($position) {
        $this->getByPosition($position);
        $this->registred--; // TODO rename to registered
        $this->save();
    }

    public function delete($position) {
        $this->load(array('position=?',$position));
        $this->erase();
    }
}