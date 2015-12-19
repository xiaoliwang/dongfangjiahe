<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

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
            'auth',
            'from',
        	[
        		'label' => '公司logo',
        		'format' => 'raw',
        		'value' => $model->pic ? 
        			Html::img('/' . $model->pic, ['style' => 'width:300px']) :
        			null
        	],
        	[
        		'format' => 'raw',
        		'label' => '发布日期',
        		'value' => date('Y-m-d H:i:s', $model->date)
        	],
            'content:raw',
        	[
        		'label' => '分类',
        		'value' => $model->getType()
        	],
        ],
    ]) ?>

</div>
