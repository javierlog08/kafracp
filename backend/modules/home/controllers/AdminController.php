<?php

namespace root\backend\modules\home\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['dash'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['dash'],
                        'roles' => ['adminDashboard'],
                    ],
                ],
            ],
        ];
    }

	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionDash()
    {
        return $this->render('index');
    }
}
