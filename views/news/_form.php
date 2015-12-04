<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true, 'placeholder' => '正晖资本']) ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(),[
    		'clientOptions' => [
    				'lang' => 'zh_cn',
    				'plugins' => ['bufferbuttons', 'fontcolor','imagemanager'],
    		]
    ]) ?>


	<?= $form->field($model, 'type')->dropDownList([1 => '公司动态', 2 => '行业资讯', 3 => '基金公告']) ?>

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
