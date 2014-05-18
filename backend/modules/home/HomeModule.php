<?php

namespace root\backend\modules\home;

class HomeModule extends \yii\base\Module
{
    public $controllerNamespace = 'root\backend\modules\home\controllers';
    public $defaultRoute = 'admin/dash';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
