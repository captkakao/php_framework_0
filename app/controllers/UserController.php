<?php


namespace app\controllers;


use app\models\User;
use fw\core\base\View;

class UserController extends AppController
{
    public function signupAction() {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            if ($user->validate($data)) {
                echo 667;
            }
            else {
                echo 45;
            }
            $user->load($data);
            die();
        }
        View::setMeta('Registration');
    }

    public function loginAction() {

    }

    public function logoutAction() {

    }
}