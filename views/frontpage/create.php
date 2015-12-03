<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Frontpage */

$this->title = 'Create Frontpage';
$this->params['breadcrumbs'][] = ['label' => 'Frontpages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontpage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
