<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IndexFund */

$this->title = '更新基金指数: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '基金指数', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="index-fund-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'funds' => $funds
    ]) ?>

</div>
