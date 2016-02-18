<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\News;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '基金指數';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-fund-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建基金指数', ['create'], ['class' => 'btn btn-success']) ?>
        <?php //Html::a('日历模式', ['calendar'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
        		'attribute' => 'fund_id',
            	'label' => '基金',
        		'value' => function($model){
        			return News::findOne($model->fund_id)->title;
            	}
    		],
            'index_fund',
        	[
        		'attribute' => 'create_time',
        		'label' => '创建时间',
        		'value' => function($model){
        			return date('Y-m', $model->create_time);
        		}
        	],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>