<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;

class MainController extends AppController
{
//    public $layout = 'main';

    public function indexAction()
    {
        $model = new Main();
//        \R::fancyDebug(true);
        $posts = \R::findAll('posts');
        $this->setVars(compact('posts'));
    }

    public function testAction()
    {
        if ($this->isAjax()) {
            echo 111;
            die;
        }
        echo 222;
    }


}