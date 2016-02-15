<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IndexFund */

$this->title = '创建基金指数';
$this->params['breadcrumbs'][] = ['label' => '基金指数', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-fund-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'funds' => $funds
    ]) ?>

</div>
