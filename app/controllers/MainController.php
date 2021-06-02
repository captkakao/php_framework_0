<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;
use vendor\core\base\View;

class MainController extends AppController
{
//    public $layout = 'main';

    public function indexAction()
    {
        $model = new Main();
        $posts = \R::findAll('posts');
        View::setMeta('Main page', 'Page description', 'Keywords');
        $this->setVars(compact('posts'));
    }

    public function testAction()
    {
        if ($this->isAjax()) {
            $model = new Main();
//            $data = ['answer' => 'Response from server', 'code' => 200];
//            echo json_encode($data);
            $post = \R::findOne('posts', "id = {$_POST['id']}");
            $this->loadView('_test', compact('post'));
            die;
        }
        echo 222;
    }


}