<?php


namespace app\controllers\admin;


use fw\core\base\View;

class UserController extends AppController
{

    public function indexAction() {
        View::setMeta('Admin :: Main page', 'Admin description', 'Admin keywords');
        $test = 'Test variable';
        $data = ['test', 2];
        $this->setVars(compact('test', 'data'));
    }

    public function testAction() {
//        echo __METHOD__;
    }

}