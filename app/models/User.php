<?php


namespace app\models;


use fw\core\base\Model;

class User extends Model
{
    public $attributes = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => ''
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['email'],
            ['name'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6],
        ]
    ];

    public function checkUnique() {
        $user = \R::findOne('users', 'login = ? OR email = ? LIMIT 1', [$this->attributes['login'], $this->attributes['email']]);
        if ($user) {
            if ($user->login == $this->attributes['login']) {
                $this->errors['unique'][] = 'Login is already busy';
            }
            if ($user->email == $this->attributes['email']) {
                $this->errors['unique'][] = 'Email is already busy';
            }
            return false;
        }
        return true;
    }

    public function login() {
        $login = !empty($_POST['login']) ? trim($_POST['login']) : null;
        $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
        if ($login && $password) {
            $user = \R::findOne('users', 'login = ? LIMIT 1', [$login]);
            if ($user && password_verify($password, $user->password)) {
                foreach ($user as $k => $v) {
                    if ($k != 'password') {
                        $_SESSION['user'][$k] = $v;
                    }
                }
                return true;
            }
        }
        return false;
    }

}