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
    	$this->getView()->title = '正晖资本';
    	$frontpages = Frontpage::find()->where(['used' => 1])->all();
        return $this->render('index', [
        	'frontpages' => $frontpages
        ]);
    }
    
    public function actionPartner() {
    	$this->getView()->title = '合作伙伴';
    	$partener = Partner::find()->all();
    	return $this->render('partner',array(
    		'parteners'=>$partener
    	));
    }

    public function actionLogin()
    {
    	$this->getView()->title = '';
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
    	$this->getView()->title = '联系我们';
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
    	$this->getView()->title = '新闻动态';
    	
    	$type = Yii::$app->request->get('type', 1);
    	if(!in_array($type, [1, 2, 3]))
    		$type = 1;
    	
    	$query = News::find()->where("type = $type");
    	
    	$pagination = new Pagination([
    			'defaultPageSize' => 10,
    			'totalCount' => $query->count(),
    	]);
    	
    	$news = $query->orderBy('date DESC')
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
    	$article = $query->where(['=','id',$id])->one();
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
    	$this->getView()->title = '案例分析';
    	$query = News::find()->where('type=4');
    	
    	$pagination = new Pagination([
    			'defaultPageSize' => 10,
    			'totalCount' => $query->count(),
    			]);
    	 
    	$news = $query->orderBy('date DESC')
    	->offset($pagination->offset)
    	->limit($pagination->limit)
    	->all();
    	return $this->render('case', [
    			'news' => $news,
    			'pagination' => $pagination,
    	]);
    	
    }
    
    public function actionPeople() {
    	$this->getView()->title = '公司团队';
    	$people = Member::find()->all();
    	return $this->render('people', [
    		'people' => $people
    	]);
    }
    
    public function actionAbout()
    {
    	$this->getView()->title = '关于我们';
    	return $this->render('about');
    }
    
    public function actionSearch()
    {
    	$s = Yii::$app->request->get('s');
    	$this->getView()->title = "搜索-$s";
    	$query = News::find()
    		->andFilterWhere(['like', 'title', $s]);
    	
    	$pagination = new Pagination([
    			'defaultPageSize' => 10,
    			'totalCount' => $query->count(),
    	]);
    	
    	$news = $query->orderBy('date DESC')
    	->offset($pagination->offset)
    	->limit($pagination->limit)
    	->all();
    	
    	return $this->render('news', [
    		'news' => $news,
    		'pagination' => $pagination
    	]);
    }
}
