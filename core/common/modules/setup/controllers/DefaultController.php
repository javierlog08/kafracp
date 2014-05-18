<?php

namespace common\modules\setup\controllers;

use yii\web\Controller;
use common\modules\setup\SetupModule;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRBAC () {
    	$this->module->trigger(SetupModule::INSTALL_RBAC);
    }
}
