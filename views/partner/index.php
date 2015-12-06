<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '合作伙伴';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建合作伙伴', ['create'], ['class' => 'btn btn-success']) ?>
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
