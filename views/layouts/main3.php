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
<meta name=”viewport” content=”width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no”/> 
<meta name="baidu-site-verification" content="qAGa9lvDQs" />
<meta name="robots" content="index,fllow">
<meta name="author" content="Tom Jiepeng Cao">
<meta name="copyright" content="MIT">
<meta name="description" content="北京东方佳合基金管理有限公司秉承 “小而美” 的企业理念，追求精益求精的价值发现、价值实现和价值释放。">
<meta name="keywords" content="东方佳合,东方佳合基金,东方佳合,北京东方佳合,北京东方佳合基金管理有限公司,基金,金融,投资管理,PE,民营">
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
    <link type="image/x-icon" href="/image/logo.png" rel="shortcut icon">
     <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
	<script src="/js/swiper.min.js"></script>
	 <!--[if lte IE 8]>
 
   <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
<?php
NavBar::begin([
    'brandLabel' => Html::img('/headerimg/a.png', ['style' => 'width:117px;height:40px;margin-top:-10px']),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top nav-transparent',
    ],
]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-Left'],
	'activateItems' => false,
	//'activateParents' => true,
    'items' => [
        ['label' => '主页', 'url' => ['/site/index']],
        ['label' => '关于我们', 'dropDownOptions' => ['class' => 'ul-transparent'],
        	'activateParents' => true, 'items' => [
            ['label' => '公司介绍', 'url' => ['/site/about', 'type' => 0]],
        	['label' => '股东介绍', 'url' => ['/site/about', 'type' => 1]],
        	['label' => '业务领域', 'url' => ['/site/about', 'type' => 2]],
        	['label' => '投资策略', 'url' => ['/site/about', 'type' => 3]],
        ]],
    	['label' => '投资团队', 'dropDownOptions' => ['class' => 'ul-transparent'],
    		'activateParents' => true, 'items' => [
    		['label' => '团队介绍', 'url' => ['/site/people']],
    		['label' => '案例分析', 'url' => ['/site/partner', 'type' => 0]],
    		//['label' => '案例分析', 'url' => ['/site/news', 'type' => 1]]
        ]],
		['label' => '已投项目', 'dropDownOptions' => ['class' => 'ul-transparent'],
			'activateParents' => true, 'items' => [
			['label' => '2015', 'url' => ['/site/case', 'year' => 2015]],
			['label' => '2016', 'url' => ['/site/case', 'year' => 2016]],
    	]],
		['label' => '公司动态', 'dropDownOptions' => ['class' => 'ul-transparent'],
		'activateParents' => true,
		'items' => [
			['label' => '公司新闻', 'url' => ['/site/news', 'type' => 1]],
			['label' => '行业资讯', 'url' => ['/site/news', 'type' => 2]],
			['label' => '基金公告', 'url' => ['/site/news', 'type' => 3]],
        ]],
    	['label' => '合作伙伴', 'url' => ['/site/partner', 'type' => 1]],
        ['label' => '联系我们', 'url' => ['/site/contact']],
    ],
]);
echo Html::beginForm(['site/search'], 'get', ['class' => 'navbar-form navbar-right']);
echo Html::textInput('s', '',['class' => 'form-control', 'placeholder' => '搜索']);
echo <<<'EOF'
<span class="submit" style="margin-left:-30px;">
	<img src="/headerimg/search.png" style="width:20px;height:20px;">
        <button id="submit-btn" type="submit" style="display:none;"></button>
    </img>
</span>
EOF;
echo Html::endForm();
    
NavBar::end();
?>

<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<?= $content ?>
</div>

<footer class="footer" style="position: fixed;bottom:0px;">
	<div class="container">
		<p style="float:left;position:relative;line-height:25px;font-size:12px;" >
        	<?=Html::a('隐私政策', '/site/policy?type=0', ['style' => 'color:#9d9d9d'])?>&nbsp;
            <?=Html::a('使用条款', '/site/policy?type=1', ['style' => 'color:#9d9d9d'])?>
        </p>
		<p style="margin:auto;position:absolute;line-height:25px;font-size:12px;left:0;right:0;width:200px" >京ICP备15064520号-1</p>
	</div>
</footer>
<script type="text/javascript">
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?4e8993b8928fc5a1ac020cc004881a07";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();

    $('span.submit').click(function(){
    	$('#submit-btn').click(); 
    });
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
