<?php

namespace app\controllers;

use app\models\UserModel;
session_start();

class LoginController extends Controller {

    public function handle($path_fragment) {
        if ($this->isPostRequest()) {
            $this->login($_POST);
        }elseif ($this->isGetRequest()) {
            $this->homepage();
        }
    }

    public function handleRegistration($path_fragment) {
        if ($this->isPostRequest()) {
            $this->register($_POST);
        }elseif ($this->isGetRequest()) {
            $this->registationView();
        }
    }

    public function homepage() {
        $this->returnView('login.php');
    }

    public function registationView() {
        $this->returnView('registration.php');
    }

    public function register($POST) {
        // var_dump($POST);
        // exit;
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // find user by email
        $user = (new UserModel())->getByEmail($email);
        if($user) {
            session_start();
            $_SESSION['message'] = "User with email already exists";
            $_SESSION['message_type'] = "alert-danger";
            header('Location: ./registration');
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $c_user = new UserModel();
        $c_user->username = $username;
        $c_user->email = $email;
        $c_user->password = $hashedPassword;
        $c_user->save();

        
        $_SESSION['message'] = "Registration successful";
        $_SESSION['message_type'] = "alert-success";
        header('Location: ./admin');
    }

    public function login() {
        session_start();
    
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Fetch the user by email
        $user = (new UserModel())->getByEmail($email);
    
        if (!$user) {
            $_SESSION['message'] = "User not found";
            $_SESSION['message_type'] = "alert-danger";
            header('Location: ./login');
            exit;
        }
    
        // Verify password securely
        if (password_verify($password, $user->password)) {
            $_SESSION['user_name'] = $user->username;
            header('Location: ./admin');
            exit;
        } else {
            $_SESSION['message'] = "Invalid password";
            $_SESSION['message_type'] = "alert-danger";
            header('Location: ./login');
            exit;
        }
    }
    

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ./login');
    }
}