<?php


namespace app\controllers;


use vendor\core\base\Controller;

class Page extends Controller
{
    public function viewAction()
    {
        echo __METHOD__;
        debug($this->route);
        debug($_GET);
        echo $_GET['page'];
    }
}