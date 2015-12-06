<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
         <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你真的要删除这个首页模板吗?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回列表页', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
        		'label' => '图标',
        		'format' => 'raw',
        		'value' => Html::img('/' . $model->pic, ['style' => 'width:300px'])
    		],
            [
        		'format' => 'raw',
        		'label' => '链接',
        		'value' => Html::a($model->link, $model->link)
        	],
        ],
    ]) ?>

</div>
