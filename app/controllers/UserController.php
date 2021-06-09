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
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            if ($user->save('users')) {
                $_SESSION['success'] = 'You have successfully signed up';
            }
            else {
                $_SESSION['error'] = 'Something went wrong try again later';
            }
            redirect('/');
        }
        View::setMeta('Registration');
    }

    public function loginAction() {
        if (!empty($_POST)) {
            $user = new User();
            if ($user->login()) {
                $_SESSION['success'] = 'You have successfully loged in';
            }
            else {
                $_SESSION['error'] = 'Incorrect login or password';
            }
            redirect();
        }
        View::setMeta('Login');
    }

    public function logoutAction() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            redirect('/user/login');
        }
    }
}