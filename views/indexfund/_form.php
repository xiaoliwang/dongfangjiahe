<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IndexFund */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="index-fund-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fund_id',
    	['labelOptions' => ['label' => '基金']])->dropDownList($funds) ?>

    <?= $form->field($model, 'index_fund')->textInput(['type' => 'number',
    	'step' => 0.001]) ?>

    <?= $form->field($model, 'create_time')->textInput(['type' => 'date',
    	'value' => date('Y-m-d', $model->create_time ?? time())]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
