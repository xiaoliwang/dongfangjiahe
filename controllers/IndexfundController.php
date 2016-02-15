<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\IndexFund;
use app\models\News;
/**
 * IndexfundController implements the CRUD actions for IndexFund model.
 */
class IndexfundController extends Controller
{
	public $layout = 'main2';
	
	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        	'access' => [
        		'class' => AccessControl::className(),
        		'denyCallback' => function ($rule, $action) {
        			return Yii::$app->getResponse()->redirect('/backend/login');
        		},
        		'rules' => [
        			[
        				'allow' => true,
        				'actions' => ['index', 'view', 'create', 'update', 'delete', 'calendar'],
        				'roles' => ['@'],
        			],
        		]
        	]
        ];
    }

    /**
     * Lists all IndexFund models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$dataProvider = new ActiveDataProvider([
            'query' => IndexFund::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IndexFund model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new IndexFund model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IndexFund();
        $news = News::find()->where('type = 4')
        	->select(['id', 'title'])->all();
        $funds = [];
        foreach ($news as $new) {
        	$funds[$new->id] = $new->title;
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            	'funds' => $funds,
            ]);
        }
    }

    /**
     * Updates an existing IndexFund model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
    	$news = News::find()->where('type = 4')
        	->select(['id', 'title'])->all();
        $funds = [];
        foreach ($news as $new) {
        	$funds[$new->id] = $new->title;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            	'funds' => $funds,
            ]);
        }
    }

    /**
     * Deletes an existing IndexFund model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCalendar()
    {
    	return $this->render('calendar');	
    }
    
    public function actionTest(string $start = NULL, string $end = NULL, int $_ = NULL)
    {
    	$query = IndexFund::find();
    	$unix_start = strtotime($start);
    	$unix_end = strtotime($end);
    	$query->filterWhere(['between', 'create_time', $unix_start, $unix_end]);
    	$indexs_fund = $query->all();
    	
    	$fund_ids = array_unique(array_column($indexs_fund, 'fund_id'));
    	$funds = News::find()->select(['id', 'title'])->where(['in', 'id', $fund_ids])
    		->all();
    	$map = [];
    	foreach ($funds as $fund) {
    		$map[$fund->id] = $fund->title;
    	}
    	
    	$events = array_map(function($index_fund) use ($map){
    		$Event = new \yii2fullcalendar\models\Event();
    		$Event->id = $index_fund->id;
    		$Event->title = mb_substr($map[$index_fund->fund_id], 0, 5) 
    			. ':' . $index_fund->index_fund;
    		$Event->start = date('Y-m-d', $index_fund->create_time);
    		return $Event;
    	}, $indexs_fund);
    		
    	return json_encode($events);
    }
    
    /**
     * Finds the IndexFund model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IndexFund the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IndexFund::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
