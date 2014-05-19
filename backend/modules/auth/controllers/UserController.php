<?php

namespace root\backend\modules\auth\controllers;

use Yii;
use common\models\User;
use common\models\LoginForm;


class UserController extends \yii\web\Controller
{
    public function actionLogin()
    {
    	if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

}
