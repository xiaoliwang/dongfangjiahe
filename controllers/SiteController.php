<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Frontpage;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
    	Yii::$app->view->registerCssFile('/css/animate.min.css');
    	Yii::$app->view->registerCssFile('/css/swiper.min.css');
    	Yii::$app->view->registerJsFile('/js/jquery.min.js');
    	Yii::$app->view->registerJsFile('/js/swiper.min.js');
    	Yii::$app->view->registerJsFile('/js/swiper.animate.min.js');
    	Yii::$app->view->registerJsFile('/js/zepto.min.js');
    	$frontpages = Frontpage::find()->where(['used' => 1])->all();
        return $this->render('index', [
        	'frontpages' => $frontpages
        ]);
    }
    
    public function actionPartner() {
    	return $this->render('partner');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    public function actionNews()
    {
    	Yii::$app->view->registerCssFile('/css/animate.min.css');
    	Yii::$app->view->registerCssFile('/css/swiper.min.css');
    	Yii::$app->view->registerJsFile('/js/jquery.min.js');
    	Yii::$app->view->registerJsFile('/js/swiper.min.js');
    	Yii::$app->view->registerJsFile('/js/swiper.animate.min.js');
    	Yii::$app->view->registerJsFile('/js/zepto.min.js');
    	return $this->render('news');
    }
    public function actionCase() {
    	Yii::$app->view->registerCssFile('/css/animate.min.css');
    	Yii::$app->view->registerCssFile('/css/swiper.min.css');
    	Yii::$app->view->registerJsFile('/js/jquery.min.js');
    	Yii::$app->view->registerJsFile('/js/swiper.min.js');
    	Yii::$app->view->registerJsFile('/js/swiper.animate.min.js');
    	Yii::$app->view->registerJsFile('/js/zepto.min.js');
    	return $this->render('case');
    }
    public function actionPeople() {
    	return $this->render('people');
    }
    public function actionAbout()
    {
        return $this->render('about');
    }
}
