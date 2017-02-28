<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth')->textInput(['maxlength' => true]) ?>

	<div id="dispaly" style="display:<?= ($model->type===4) ? true : 'none'; ?>">
	<?= $form->field($uploadForm, 'image', 
    		['labelOptions' => ['label' => '公司logo']])->fileInput() ?>
    
	<?php
    	if ($model->pic){
    		echo Html::img('/' . $model->pic, ['style' => 'width:300px']);
    	};
    ?>
	</div>
	
    <?= $form->field($model, 'from')->textInput(['maxlength' => true, 'placeholder' => '东方佳合']) ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(),[
    		'clientOptions' => [
    				'lang' => 'zh_cn',
    				'plugins' => ['bufferbuttons', 'fontcolor','imagemanager'],
    		]
    ]) ?>


	<?= $form->field($model, 'type')->dropDownList([1=> '公司新闻', 2 => '行业资讯', 3 => '基金公告', 4 => '投资案例']) ?>

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
<script type="text/javascript">
window.onload = function(){
	$("#news-type").change(function(){
		if (this.value == 4){
			$('#dispaly').show();
		} else {
			$('#dispaly').hide();
		}
	});
}
	
</script>