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
use yii\web\HttpException;

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
    	$this->layout = 'main3';
    	//Yii::$app->view->registerCssFile('/css/animate.min.css');
    	Yii::$app->view->registerCssFile('/css/swiper.min.css');
    	//Yii::$app->view->registerJsFile('/js/jquery.min.js');
    	Yii::$app->view->registerJsFile('/js/swiper.min.js');
    	//Yii::$app->view->registerJsFile('/js/swiper.animate.min.js');
    	//Yii::$app->view->registerJsFile('/js/zepto.min.js');
    	$this->getView()->title = '东方佳合';

    	$news = News::find()->select('id, title, date')
    		->limit(4)->orderBy('id desc')->where('type in (1, 2, 3)')->all();
    	
    	$cases = News::find()->select('id, pic')
    		->limit(16)->orderBy('id desc')->where('type = 4')->all();
    	
    	$frontpages = Frontpage::find()->where(['used' => 1])->all();
        return $this->render('index', [
        	'frontpages' => $frontpages,
        	'news' => $news,
        	'cases' => $cases
        ]);
    }
    
    public function actionPartner(int $type) {
    	$this->getView()->title = $type ? '合作伙伴' : '案例分析';
    	$partener = Partner::find()
    		->where('type = :type', [':type' => $type])
    		->all();
    	return $this->render('partner',array(
    		'parteners'=>$partener,
    		'type' => $type
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
    	if(!in_array($type, [1, 2, 3, 5, 6, 7, 8]))
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
    	$article = News::findOne($id);
    	if (!$article) throw new HttpException(404, "该文章已经不存在");
    	return $this->render('article',[
    			'article' => $article,
    	]);
    }
    
    public function actionCase() {
    	Yii::$app->view->registerCssFile('/css/animate.min.css');
    	Yii::$app->view->registerCssFile('/css/swiper.min.css');
    	Yii::$app->view->registerJsFile('/js/jquery.min.js');
    	Yii::$app->view->registerJsFile('/js/swiper.min.js');
    	Yii::$app->view->registerJsFile('/js/swiper.animate.min.js');
    	Yii::$app->view->registerJsFile('/js/zepto.min.js');
    	$this->getView()->title = '已投项目';
    	$query = News::find()->where('type = 4');
    	
    	$pagination = new Pagination([
    		'defaultPageSize' => 10,
    		'totalCount' => $query->count(),
    	]);
    	
	/*
    	$year_str = $year . '0101';
    	$next_year_str = $year + 1 . '0101';
    	$start_unix = strtotime($year_str);
    	$end_unix = strtotime($next_year_str);
    	*/

    	$news = $query->orderBy('date DESC')
    	->offset($pagination->offset)
    	->limit($pagination->limit)
    	// ->andWhere(['between', 'date', $start_unix, $end_unix])
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
    
    public function actionAbout($type=0)
    {
    	$this->getView()->title = '关于我们';
    	if(intval($type)==0) {
    		return $this->render('info');
    	}
    	if(intval($type)==1) {
    		return $this->render('invest');
    	}
    	if(intval($type)==2) {
    		return $this->render('area');
    	}
    	if(intval($type)==3) {
    		return $this->render('strategy');
    	}
    	return $this->render('info');
    }
    
    public function actionPolicy($type=0) {
    	if(intval($type)==0) {
    		$this->getView()->title = '隐私政策';
    		
    		return $this->render('policy1');
    	}
    	if(intval($type)==1) {
    		$this->getView()->title = '使用条款';
    		
    		return $this->render('policy2');
    	}
    	return $this->render('policy1');
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
