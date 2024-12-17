<?php 

namespace app\models;

use app\models\ModelException;

class ContactModel extends Model {

    public $id;
    public $name;
    public $email;
    public $message;
    
    public function __construct() {
        parent::__construct("contacts");
    }

    protected function get_insert_name_value() {
        return array(
            "name" => $this->name,
            "email" => $this->email,
            "message" => $this->message
        );
    }

    protected function set_inserted_id($id) {
        $this->id = $id;
    }

    protected function create_model_from_result_array($r) {
        $m = new ContactModel();
        $m->id = $r['id'];
        $m->name = $r['name'];
        $m->email = $r['email'];
        $m->message = $r['message'];
        return $m;
    }
}