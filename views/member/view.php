<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你真的要删除这个成员吗?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回列表页', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        	[
        		'label' => '图片',
        		'format' => 'raw',
        		'value' => Html::img('/' . $model->pic, ['style' => 'width:300px'])
        	],
            'position',
            'mobile',
            'email:email',
            'summary',
           
        ],
    ]) ?>

</div>
