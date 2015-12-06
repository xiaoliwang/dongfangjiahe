<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Partner */

$this->title = '创建合作伙伴';
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'uploadForm' => $uploadForm
    ]) ?>

</div>
