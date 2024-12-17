<?php

namespace app\controllers;

abstract class Controller {

    private static $loggedin = false;

    public abstract function handle($path_fragment);

    public function returnView($pathToView, $data = []) {
        $this->loadView($pathToView, $data);
        exit();
    }

    public function loadView($pathToView, $data = []) {
        extract($data);
        require "../app/views/$pathToView";
    }

    public function returnJSON($json) {
        header("Content-Type: application/json");
        echo json_encode($json);
        exit();
    }

    public function getRequestMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function isGetRequest() {
        return 'GET' === $this->getRequestMethod();
    }

    public function isPostRequest() {
        return 'POST' === $this->getRequestMethod();
    }

    public function redirect($url) {
        header("Location: $url");
        exit();
    }
}