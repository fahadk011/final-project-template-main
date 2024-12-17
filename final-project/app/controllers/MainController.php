<?php

namespace app\controllers;

use app\models\ExperienceModel;

class MainController extends Controller {

    public function handle($path_fragment) {
        $this->homepage();
    }

    public function homepage() {
        //remember to route relative to index.php
        //require page and exit to return an HTML page
        $experiences = (new ExperienceModel())->fetchAll();
        $this->returnView('home.php', array('experiences' => $experiences));
    }
}