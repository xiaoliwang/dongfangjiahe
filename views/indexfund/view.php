<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\News;

/* @var $this yii\web\View */
/* @var $model app\models\IndexFund */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '基金指数', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-fund-view">

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
        	[
        		'label' => '基金',
        		'value' => News::findOne($model->fund_id)->title
    		],
            'index_fund',
        	[
        		'format' => 'raw',
        		'label' => '创建时间',
        		'value' => date('Y-m', $model->create_time)
    		],
        ],
    ]) ?>

</div>
