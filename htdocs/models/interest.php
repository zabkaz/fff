<?php
class Interest extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db) {
	    parent::__construct($db,'odvetvie'); // TODO rename
	}
	
	public function all() {
	    $this->load();
	    return $this->query;
	}

	public function getById($id) {
        $this->load(array('id=?',$id));
        return $this->query;
    }

    public function add($id) {
        $this->id = $id;
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