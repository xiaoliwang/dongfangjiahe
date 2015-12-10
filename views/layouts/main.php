<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
    <script src="/js/jquery.min.js"></script>
	<script src="/js/swiper.min.js"></script>
	<script src="/js/swiper.animate.min.js"></script>
	<script src="/js/zepto.min.js"></script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-Left'],
        'items' => [
            ['label' => '主页', 'url' => ['/site/index']],
            ['label' => '关于我们', 'url' => ['/site/about']],
			['label' => '公司团队', 'url' => ['/site/people']],
			['label' => '合作伙伴', 'url' => ['/site/partner']],
			['label' => '案例分析', 'url' => ['/site/case']],
			['label' => '新闻动态', 'url' => ['/site/news']],
            ['label' => '联系我们', 'url' => ['/site/contact']],
        ],
    ]);
    NavBar::end();
    ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
</div>

	<footer class="footer">
		<div class="container">备案信息</div>
	</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
