<?php

namespace app\controllers;

use app\models\ContactModel;
use app\models\ModelException;

class ContactController extends Controller {

    public function handle($path_fragment) {
        if ($this->isPostRequest()) {
            // var_dump($_POST);
            $this->addContact($_POST);
        }elseif ($this->isGetRequest()) {
            // var_dump($path_fragment);
            $this->getContactList();
        }
    }

    public function addContact($data) {

        header("Content-Type: application/json");
        $response = array();

        $model = new ContactModel();
        $model->name = $data['name'];
        $model->email = $data['email'];
        $model->message = $data['message'];

        try {
            $entity = $model->save();
            $response['status'] = 'success';
            $response['message'] = 'Contact added successfully';
            $response['data'] = $entity;
        } catch (ModelException $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }

        // remove header and footer from the response
        ob_clean();
        echo json_encode($response);
        exit();
    }

    public function getContactList() {
        $contacts = (new ContactModel())->fetchAll();
        $this->returnView("contact_list_view.php",array('contacts' => $contacts));
    }
}