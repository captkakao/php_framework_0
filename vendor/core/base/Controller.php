<?php


namespace vendor\core\base;


abstract class Controller
{
    /**
     * current route and params (controller, action, params)
     * @var array
     */
    public $route;

    /**
     * current layout
     * @var string
     */
    public $layout;

    /**
     * current view
     * @var string
     */
    public $view;

    /**
     * user data
     * @var array
     */
    public $vars = [];


    /**
     * Controller constructor.
     */
    public function __construct($route = [])
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView() {
        $viewObject = new View($this->route, $this->layout, $this->view);
        $viewObject->render($this->vars);
    }

    /**
     * @return array
     */
    public function getVars()
    {
        return $this->vars;
    }

    /**
     * @param array $vars
     */
    public function setVars($vars)
    {
        $this->vars = $vars;
    }


}