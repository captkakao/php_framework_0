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
//        \R::fancyDebug(true);
        $posts = \R::findAll('posts');
        View::setMeta('Main page', 'Page description', 'Keywords');
        $this->setVars(compact('posts'));
    }

    public function testAction()
    {
        if ($this->isAjax()) {
            $model = new Main();
            $post = \R::findOne('posts', "id = {$_POST['id']}");
            $this->loadView('_test', compact('post'));
            die;
        }
        echo 222;
    }


}