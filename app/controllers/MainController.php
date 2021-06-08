<?php

namespace app\controllers;

use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MainController extends AppController
{
//    public $layout = 'main';

    public function indexAction()
    {
//        // create a log channel
//        $log = new Logger('name');
//        $log->pushHandler(new StreamHandler(ROOT . '/tmp/your.log', Logger::WARNING));
//
//        // add records to the log
//        $log->warning('Foo');
//        $log->error('Bar');

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