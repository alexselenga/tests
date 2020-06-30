<?php

namespace box;

class Controller
{
    public $layout = 'main';

    public function beforeAction() {
        return true;
    }

    public function afterAction(&$result) {
        if (is_array($result)) $result = json_encode($result);
    }
}
