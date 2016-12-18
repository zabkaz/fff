<?php

class infoP extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db) {
	    parent::__construct($db,'student_info');
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
        $f3 = Base::instance();
        $this->id = $id;
       
        $this->first_name = $f3->get('POST.first_name');
        $this->last_name = $f3->get('POST.last_name');
        $this->email = $f3->get('POST.email');
        $this->studium = $f3->get('POST.studium');
        $this->univerzita = $f3->get('POST.univerzita');
        $this->fakulta = $f3->get('POST.fakulta');
        $this->rocnik = $f3->get('POST.rocnik');

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