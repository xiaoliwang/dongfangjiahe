<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

   	<?= $form->field($uploadForm, 'image', 
    		['labelOptions' => ['label' => '首页banner图']])->fileInput() ?>
    <?php
    	if ($model->pic){
    		echo Html::img('/' . $model->pic, ['style' => 'width:300px']);
    	};
    ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= $model->isNewRecord?'':Html::resetButton('重置', ['class' => 'btn btn-primary'])?>
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    	<?= Html::a('返回列表页', ['index'], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => '返回将会丢失所有未保存的内容?',
            ]
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
