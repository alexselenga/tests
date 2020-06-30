<?php

namespace box;

class View
{
    protected static $viewPath;

    protected static $params;

    protected static function renderInternal() {
        extract(static::$params);
        require(static::$viewPath);
    }

    public static function renderPartial($viewName = 'index', $params = []) {
        $viewsPath = Box::$app->getViewsPath();
        $shortControllerName = Box::$app->shortControllerName;
        static::$viewPath = "$viewsPath\\$shortControllerName\\$viewName.php";
        static::$params = $params;

        ob_start();
        static::renderInternal();
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }

    public static function render($viewName = 'index', $params = []) {
        $content = static::renderPartial($viewName, $params);
        $layoutsPath = Box::$app->getLayoutsPath();
        $controller = Box::$app->controller;
        $layout = $controller->layout;
        static::$viewPath = "$layoutsPath\\$layout.php";
        static::$params = ['content' => $content];

        ob_start();
        static::renderInternal();
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }
}
