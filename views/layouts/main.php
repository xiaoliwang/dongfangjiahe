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
<meta name="baidu-site-verification" content="qAGa9lvDQs" />
<meta name="robots" content="index,fllow">
<meta name="author" content="Tom Jiepeng Cao">
<meta name="copyright" content="MIT">
<meta name="description" content="北京正晖基金管理有限公司秉承 “小而美” 的企业理念，追求精益求精的价值发现、价值实现和价值释放。">
<meta name="keywords" content="正晖,正晖基金,正晖资本,北京正晖资本,北京正晖基金管理有限公司,基金,金融,投资管理,PE,民营">   
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
    <link type="image/x-icon" href="/image/logo.png" rel="shortcut icon">
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
    'brandLabel' => Html::img('/image/logo.png', ['style' => 'width:40px;height:40px;margin-top:-10px']),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-Left'],
    'items' => [
        ['label' => '主页', 'url' => ['/site/index']],
        ['label' => '关于我们', 'url' => ['/site/about'],'items' => [
            ['label' => '公司介绍', 'url' => '/site/about?type=0'],
            ['label' => '股东介绍', 'url' => '/site/about?type=1'],
            ['label' => '业务领域', 'url' => '/site/about?type=2'],
            ['label' => '投资策略', 'url' => '/site/about?type=3'],
        ]],
		['label' => '公司团队', 'url' => ['/site/people']],
		['label' => '投资案例', 'url' => ['/site/case']],
		['label' => '新闻动态', 'url'=> ['/site/news'], 'items' => [
			['label' => '公司动态', 'url' => '/site/news?type=1'],
			['label' => '行业资讯', 'url' => '/site/news?type=2'],
			['label' => '基金公告', 'url' => '/site/news?type=3'],
        ]],
    	['label' => '合作伙伴', 'url' => ['/site/partner']],
        ['label' => '联系我们', 'url' => ['/site/contact']],
    ],
]);
echo Html::beginForm(['site/search'], 'get', ['class' => 'navbar-form navbar-right']);
echo Html::textInput('s', '',['class' => 'form-control', 'placeholder' => '搜索']);
echo '<span class="submit" style="margin-left:-30px;"><img src="/headerimg/search.png" style="width:20px;height:20px;"><button id="submit-btn" type="submit" style="display:none;"></span>';
echo Html::endForm();
    
NavBar::end();
?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<?= $content ?>
</div>

<footer class="footer">
	<div class="container">
		<p style="float:left;position:relative;line-height:25px;font-size:12px;" >
        	<?=Html::a('隐私政策', '/site/policy?type=0', ['style' => 'color:#9d9d9d'])?>&nbsp;
            <?=Html::a('使用条款', '/site/policy?type=1', ['style' => 'color:#9d9d9d'])?>
        </p>
		<p style="margin:auto;position:absolute;line-height:25px;font-size:12px;left:0;right:0;width:200px" >京ICP备15064520号-1</p>
	</div>
</footer>
<script type="text/javascript">
    $('span.submit').click(function(){
    	$('#submit-btn').click(); 
    });
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
