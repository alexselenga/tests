<?php

namespace box;

class Box
{
    /** @type Box */
    static public $app;

    public $params = [];

    public $controllersNS = 'app\controllers\\';

    public $modelsNS = 'app\models\\';

    protected $_basePath;

    public function getBasePath() {
        return $this->_basePath;
    }

    public function getBoxPath() {
        return $this->getBasePath() . 'framework\\';
    }

    public function getViewsPath() {
        return $this->getBasePath() . 'views\\';
    }

    public function getLayoutsPath() {
        return $this->getViewsPath() . 'layouts\\';
    }

    public $shortControllerName;

    /** @type Controller */
    public $controller;

    public $shortActionName;

    public function __construct($params) {
        if (is_array($params)) $this->params = $params;
    }

    public function run() {
        static::$app = $this;
        $this->_basePath = dirname(__DIR__) . '\\';

        $uri = $_SERVER['REQUEST_URI'];
        $uriParts = explode('/', $uri);
        $uriParts = array_diff($uriParts, ['']);
        $uriParts = array_values($uriParts);

        if (count($uriParts) == 0) $uriParts[0] = 'site';
        if (count($uriParts) == 1) $uriParts[1] = 'index';

        $this->shortControllerName = strtolower($uriParts[0]);
        $this->shortActionName = strtolower($uriParts[1]);
        $controllerName = ucfirst($this->shortControllerName) . 'Controller';
        $actionName = 'action' . ucfirst($this->shortActionName);
        $fullControllerName = $this->controllersNS . $controllerName;
        $this->controller = new $fullControllerName;

        if ($this->controller->beforeAction()) {
            $result = $this->controller->$actionName();
            $this->controller->afterAction($result);

            echo $result;
        }
    }
}
