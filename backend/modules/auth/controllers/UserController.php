<?php

namespace root\backend\modules\auth\controllers;

use common\models\Login;


class UserController extends \yii\web\Controller
{
    public function actionLogin()
    {
    	$login = new Login();
        return $this->render('login',array('model'=>$login));
    }

}
