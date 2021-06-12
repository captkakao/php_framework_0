<?php

namespace app\controllers;

use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MainController extends AppController
{
//    public $layout = 'main';

    public function indexAction()
    {
        $model = new Main();
        App::$app->setProperty('test', 'TEST VALUE');
//        dd(App::$app->getProperties());

        $total = \R::count('posts');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 2;

        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getStart();

        $posts = \R::findAll('posts', "LIMIT $start, $perPage");
        View::setMeta('Main page', 'Page description', 'Keywords');
        $this->setVars(compact('posts', 'pagination', 'total'));
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