<?php

namespace app\controllers;

use Yii;
use app\models\LoginForm;

class BackendController extends \yii\web\Controller
{
    public $layout = false;
    public $defaultAction = 'login';
	
	public function actionLogin()
    {
    	if (!\Yii::$app->user->isGuest) {
            return Yii::$app->getResponse()->redirect('/frontpage');
        }
    	
    	$model = new LoginForm();
    	if ($model->load(Yii::$app->request->post()) && $model->login()) {
    		return Yii::$app->getResponse()->redirect('/frontpage');
    	}
    	return $this->render('login', [
    		'model' => $model,
    	]);
    }
    
    public function actionLogout()
    {
    	Yii::$app->user->logout();
    
    	return Yii::$app->getResponse()->redirect('/backend/login');
    }

}
