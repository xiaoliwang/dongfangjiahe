<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$type = \Yii::$app->request->get('PartnerSearch')['type'];

$this->title = $type ? '合作伙伴' : '案例分析';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="partner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a($type ? '创建合作伙伴' : '创建案例分析', ['create', 'type' => $type], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
        		'attribute' => 'pic',
        		'format' => 'raw',
        		'label' => '图标',
        		'value' => function($model){
        			return Html::img('/' . $model->pic, ['style' => 'width:100px']);
        		}
    		],
            [
        		'attribute' => 'link',
        		'format' => 'raw',
        		'label' => '链接',
        		'value' => function($model){
        			return Html::a($model->link, $model->link);
        		}
        	],

            [
            	'class' => 'yii\grid\ActionColumn',
            	'buttons' => [
            		'view' => function($url, $model, $key) {
            			$options = [
            				'title' => Yii::t('yii', 'View'),
            				'aria-label' => Yii::t('yii', 'View'),
            				'data-pjax' => '0',
            			];
            			$url = $url . '&type=' . \Yii::$app->request->get('PartnerSearch')['type'];
             			$text = '<span class="glyphicon glyphicon-eye-open"></span>';
        				return Html::a($text, $url, $options);
        			},
        			'delete' => function($url, $model, $key) {
	        			$options = [
	        					'title' => Yii::t('yii', 'Delete'),
	        					'aria-label' => Yii::t('yii', 'Delete'),
	        					'data-pjax' => '0',
	        					'data-method' => 'post',
	        					'data-confirm' => "您确定要删除此项吗？"
	        			];
	        			$url = $url . '&type=' . \Yii::$app->request->get('PartnerSearch')['type'];
	        			$text = '<span class="glyphicon glyphicon-trash"></span>';
	        			return Html::a($text, $url, $options);
        			}
	        	]
        	],
        ],
    ]); ?>

</div>
