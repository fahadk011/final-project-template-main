<?php

namespace app\core;

use app\controllers\MainController;
use app\controllers\AdminController;
use app\controllers\ContactController;
use app\controllers\LoginController;

class Router {

    public $urlArray;

    public function __construct()
    {
        $this->urlArray = $this->routeSplit();
        // var_dump($this->urlArray);
    }

    public function handleRoutes() {
        $urlArray = $this->urlArray;
        $size = count($urlArray);
        if ($size == 0) {
            $this->handleMainRoutes([]);
            return;
        }

        $first_path = $urlArray[0];
        $path_fragment = array_slice($urlArray, 1);
        // return $path_fragment;
        switch ($first_path) {
            case "admin": {
                $this->handleAdminRoutes($path_fragment);
            }
            break;
            case "contact": {
                $this->handleContactRoutes($path_fragment);
            }
            break;
            case "login": {
                $this->handleLoginRoutes($path_fragment);
            }
            case "logout": {
                $this->handleLogoutRoutes($path_fragment);
            }
            case "registration": {
                $this->handleRegistraionRoutes($path_fragment);
            }
            break;
            default: {
                $this->handleMainRoutes($path_fragment);
            }
        }
    }

    // private function routeSplit() {
    //     $url = strtok($_SERVER["REQUEST_URI"], '?');
    //     var_dump($url); 
    //     $pathpos = strpos($url, BASE_URL_PATH);
    //     var_dump($pathpos);
    //     exit;
    //     $tail = substr($url, $pathpos + strlen(BASE_URL_PATH) );
    //     return explode("/", $tail);
    // }

    private function routeSplit() {
        $url = strtok($_SERVER["REQUEST_URI"], '?');
        $pathpos = strpos($url, BASE_URL_PATH);
        
    
        if ($pathpos === false) {
            return []; // BASE_URL_PATH not found in the URL
        }
        
        $tail = substr($url, $pathpos + strlen(BASE_URL_PATH));
        if (empty($tail)) {
            return []; // Handle empty tail gracefully
        }
    
        return explode("/", $tail);
    }

    protected function handleMainRoutes($path_fragment) {
        $conotroller = new MainController();
        $conotroller->handle($path_fragment);
    }

    protected function handleAdminRoutes($path_fragment) {
        $controller = new AdminController($path_fragment);
        $controller->handle($path_fragment);
    }

    protected function handleContactRoutes($path_fragment) {
        $controller = new ContactController();
        $controller->handle($path_fragment);
    }

    protected function handleLoginRoutes($path_fragment) {
        $controller = new LoginController();
        $controller->handle($path_fragment);
    }
    protected function handleRegistraionRoutes($path_fragment) {
        $controller = new LoginController();
        $controller->handleRegistration($path_fragment);
    }

    protected function handleLogoutRoutes($path_fragment) {
        $controller = new LoginController();
        $controller->logout();
    }

}