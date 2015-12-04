<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建新闻', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'auth',
            'from',
            [
            	'attribute' => 'date',
        		'label' => '发布日期',
        		'value' => function($model){
        			return date('Y-m-d', $model->date);
       			}
        	],
            [
            	'attribute' => 'type',
            	'label' => '分类',
        		'value' => function($model){
        			return $model->getType();
   				},
   				'filter' => [1 => '公司动态', 2 => '行业资讯', 3 => '基金公告'],
        	],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
