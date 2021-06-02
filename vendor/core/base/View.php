<?php


namespace vendor\core\base;


class View
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

    public $scripts = [];

    public static $meta = ['title' => '', 'desc' => '', 'keywords' => ''];

    /**
     * View constructor.
     * @param array $route
     * @param string $layout
     * @param string $view
     */
    public function __construct($route = [], $layout = '', $view = '')
    {
        $this->route = $route;
        if ($layout === false) {
            $this->layout = false;
        }
        else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    public function render($vars) {
        if (is_array($vars)) {
            extract($vars);
        }
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view)) {
            require $file_view;
        }
        else {
            echo "<p>View not found <b>{$file_view}</b></p>";
        }
        $content = ob_get_clean();

        if ($this->layout !== false) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)) {
                $content = $this->getScript($content);
                $scripts = [];
                if (!empty($this->scripts[0])) {
                    $scripts = $this->scripts[0];
                }
                require $file_layout;
            }
            else {
                echo "<p>Layout not found <b>{$file_layout}</b></p>";
            }
        }
    }

    protected function getScript($content) {
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content, $this->scripts);
        if (!empty($this->scripts)) {
            $content = preg_replace($pattern, '', $content);
        }
        return $content;
    }

    public static function getMeta() {
        echo '<title>' . self::$meta['title'] . '</title>
        <meta name="description" content="' . self::$meta['desc'] . '">
        <meta name="keywords" content="' . self::$meta['keywords'] . '">';
    }

    public static function setMeta($title = '', $desc = '', $keywords = '') {
        self::$meta['title'] = $title;
        self::$meta['desc'] = $desc;
        self::$meta['keywords'] = $keywords;
    }

}