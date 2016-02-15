<?php 

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

$this->title = '基金指數';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-fund-index">

	<h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('表格模式', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

<?php 
$JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {
    window.location = "/indexfund/update?id=" + calEvent.id;
}
EOF;
?>

<?= \yii2fullcalendar\yii2fullcalendar::widget([
	'options' => [
			'lang' => 'zh-cn'
	],
	'ajaxEvents' => Url::to(['/indexfund/test']),
	'header' => [],
	'clientOptions' => [
		'eventClick' => new JsExpression($JSEventClick),
	]
]);
?>

</div>