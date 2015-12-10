<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\data\Pagination;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;

use app\models\Frontpage;
use app\models\Member;
use app\models\Partner;

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
    	$partener = Partner::find()->all();
    	return $this->render('partner',array(
    		'parteners'=>$partener
    	));
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
    	
    	$query = News::find();
    	
    	$pagination = new Pagination([
    			'defaultPageSize' => 10,
    			'totalCount' => $query->count(),
    	]);
    	
    	$news = $query->where(['in', 'type', [1, 2, 3]])->orderBy('date DESC')
    		->offset($pagination->offset)
    		->limit($pagination->limit)
    		->all();
    	return $this->render('news', [
    			'news' => $news,
    			'pagination' => $pagination,
    			]);
    }
    
    public function actionArticle($id) {
    	$query = News::find();
    	$article = $query->where(['=','id',$id])->all();
    	return $this->render('article',[
    			'article' => $article
    	]);
    }
    
    public function actionCase() {
    	Yii::$app->view->registerCssFile('/css/animate.min.css');
    	Yii::$app->view->registerCssFile('/css/swiper.min.css');
    	Yii::$app->view->registerJsFile('/js/jquery.min.js');
    	Yii::$app->view->registerJsFile('/js/swiper.min.js');
    	Yii::$app->view->registerJsFile('/js/swiper.animate.min.js');
    	Yii::$app->view->registerJsFile('/js/zepto.min.js');
    	$query = News::find();
    	 
    	$pagination = new Pagination([
    			'defaultPageSize' => 10,
    			'totalCount' => $query->count(),
    			]);
    	 
    	$news = $query->where('type=4')->orderBy('date DESC')
    	->offset($pagination->offset)
    	->limit($pagination->limit)
    	->all();
    	return $this->render('case', [
    			'news' => $news,
    			'pagination' => $pagination,
    	]);
    	
    }
    
    public function actionPeople() {
    	$people = Member::find()->all();
    	return $this->render('people', [
    		'people' => $people
    	]);
    }
    
    public function actionAbout()
    {
        return $this->render('about');
    }
}
