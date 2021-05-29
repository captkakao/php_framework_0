<?php

namespace app\controllers;

class MainController extends AppController
{
    public $layout = 'main';

    public function indexAction()
    {
//        $this->layout = false;
        $name = "Sultanbek";
        $hi = "Hello";

        $this->setVars(compact('name', 'hi'));
    }
}