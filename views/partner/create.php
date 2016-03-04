<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Partner */
$type = \Yii::$app->request->get('type');
$this->title = $type ? '合作伙伴' : '案例分析';

$this->params['breadcrumbs'][] = ['label' => $this->title,
	'url' => ['index', 'PartnerSearch' => ['type' => $type]]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'uploadForm' => $uploadForm
    ]) ?>

</div>
