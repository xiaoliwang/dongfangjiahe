<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */
$type = \Yii::$app->request->get('type');
$this->title = '更新合作伙伴: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index', 'PartnerSearch' => ['type' => $type]]];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="partner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'uploadForm' => $uploadForm
    ]) ?>

</div>
