<?php

class Main
{
    public $url;
    public $controllerPath = 'app/controllers/';
    public $controller;

    public function __construct()
    {
        $this->getUrl();
        $this->loadController();
        $this->callMethod();
    }

    /**
     * @return void
     */
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $this->url = $_GET['url'];
            $deleteLastCharacter = rtrim($this->url, '/');
            $this->url = explode('/', filter_var($deleteLastCharacter, FILTER_SANITIZE_URL));
        } else {
            unset($this->url);
        }
    }

    /**
     * @return void
     */
    public function loadController()
    {
        if (isset($this->url[0])) {
            $controllerName = $this->url[0];
            $fileName = $this->controllerPath.$controllerName.'.php';
            if (file_exists($fileName)) {
                include $fileName;
                if (class_exists($controllerName)) {
                    $this->controller = new $controllerName();
                } else {
                    header('Location:'.BASE_URL.'/index/notFound');
                }
            } else {
                header('Location:'.BASE_URL.'/index/notFound');
            }
        } else {
            include $this->controllerPath.'index.php';
            $this->controller = new Index();
        }
    }

    /**
     * @return void
     */
    public
    function callMethod()
    {
        if (isset($this->url[1])) {
            $methodName = $this->url[1];
            if (method_exists($this->controller, $methodName)) {
                if (isset($this->url[2])) {
                    $this->controller->$methodName($this->url[2]);
                } else {
                    $this->controller->$methodName();
                }
            } else {
                header('Location:'.BASE_URL.'/index/notFound');
            }
        } else {
            if (method_exists($this->controller, 'index')) {
                $this->controller->index();
            } else {
                header('Location:'.BASE_URL.'/index');
            }
        }
    }
}
