<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '成员管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建成员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
        	[
        		'attribute' => 'pic',
        		'format' => 'raw',
        		'label' => '照片',
        		'value' => function($model){
        			return Html::img('/' . $model->pic, ['style' => 'width:100px']);
        		}
        	],
            'name',
            'position',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
