<?php 

namespace app\models;

use app\models\ModelException;

class UserModel extends Model {

    public $id;
    public $username;
    public $email;
    public $password;
    
    public function __construct() {
        parent::__construct("users");
    }

    protected function get_insert_name_value() {
        return array(
            "username" => $this->username,
            "email" => $this->email,
            "password" => $this->password
        );
    }

    protected function set_inserted_id($id) {
        $this->id = $id;
    }

    protected function create_model_from_result_array($r) {
        $m = new UserModel();
        $m->id = $r['id'];
        $m->username = $r['username'];
        $m->email = $r['email'];
        $m->password = $r['password'];
        return $m;
    }
}