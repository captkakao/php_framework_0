<?php

namespace app\controllers;

class Main extends App
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