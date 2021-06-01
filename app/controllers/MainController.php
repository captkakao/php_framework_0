<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;

class MainController extends AppController
{
    public $layout = 'main';

    public function indexAction()
    {
//        App::$app->getList();
        $model = new Main();
        $posts = App::$app->cache->get('posts');
        \R::fancyDebug(true);
        if (!$posts) {
            $posts = \R::findAll('posts');
            App::$app->cache->set('posts', $posts);
        }
        echo date('Y-m-d H:i', time());
        echo '<br>';
        echo date('Y-m-d H:i', 1622530554);
        $this->setVars(compact('posts'));
    }
}