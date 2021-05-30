<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
    public $layout = 'main';

    public function indexAction()
    {
        $model = new Main();
        $posts = $model->findAll();
        $post = $model->findOne(2);
        $data = $model->findBySql("SELECT * FROM posts ORDER BY id DESC LIMIT 2");
        debug($data);
//        debug($post);

        $this->setVars(compact('posts'));
    }
}