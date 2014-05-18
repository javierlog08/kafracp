<?php

namespace common\modules\setup;

class SetupModule extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\setup\controllers';
    const INSTALL_RBAC = 'installRBAC';


    public function init()
    {
        parent::init();

        /*
        * Installation  events
        */
        $this->on(self::INSTALL_RBAC,[new SetupRBAC,'install']);

    }


    
}
