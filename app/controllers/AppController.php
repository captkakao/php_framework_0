<?php


namespace app\controllers;


use app\models\Main;
use fw\core\App;
use fw\core\base\Controller;
use fw\widgets\language\Language;

class AppController extends Controller
{
    public function __construct($route = [])
    {
        parent::__construct($route);
        new Main();
        App::$app->setProperty('langs', Language::getLanguages());
        App::$app->setProperty('lang', Language::getLanguage(App::$app->getProperty('langs')));

    }
}