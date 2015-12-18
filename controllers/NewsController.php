<?php

namespace app\controllers;

use Yii;
use app\models\{News, NewsSearch, UploadForm};
use yii\web\{Controller, UploadedFile, NotFoundHttpException};
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
        				'actions' => ['index', 'view', 'create', 'update', 'delete'],
        				'roles' => ['@'],
        			],
				]
        	]
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();
        $form = new UploadForm();

        if ($model->load(Yii::$app->request->post())) {
        	$model->date = $_SERVER['REQUEST_TIME'];
        	if ($form->image = UploadedFile::getInstance($form, 'image')) {
        		$model->pic = 'image/' . md5($_SERVER['REQUEST_TIME']. $form->image->baseName) . $_SERVER['REQUEST_TIME'] . '.' . $form->image->extension;
        		$form->image->saveAs($model->pic);
        	}
        	if (!$model->from)
        		$model->from = '正晖资本';
        	if ($model->save()) {
        		return $this->redirect(['view', 'id' => $model->id]);
        	}
        }
        return $this->render('create', [
            'model' => $model,
        	'uploadForm' => $form
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $form = new UploadForm();

        if ($model->load(Yii::$app->request->post())) {
        	if ($form->image = UploadedFile::getInstance($form, 'image')) {
        		$model->pic = 'image/' . md5($_SERVER['REQUEST_TIME']. $form->image->baseName) . $_SERVER['REQUEST_TIME'] . '.' . $form->image->extension;
        		$form->image->saveAs($model->pic);
        	}
        	if ($model->type != 4){
        		$model->pic = '';
        	}
        	$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            	'uploadForm' => $form
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
