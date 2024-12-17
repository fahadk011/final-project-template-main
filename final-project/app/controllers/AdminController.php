<?php

namespace app\controllers;

class AdminController extends Controller {

    public function handle($path_fragment) {
        $this->homepage();
    }

    public function homepage() {
        $this->returnView('admin.php');
    }

}
