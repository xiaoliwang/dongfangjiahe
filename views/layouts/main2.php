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
    <meta name="author" content="Tom Jiepeng Cao">
	<meta name="copyright" content="MIT">
	<meta name="robots" content="noindex,nofllow">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
     <link type="image/x-icon" href="/image/29.png" rel="shortcut icon">
     <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '网站首页',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => '首页后台', 'url' => ['/frontpage']],
            ['label' => '成员管理', 'url' => ['/member']],
        	['label' => '案例分析', 'url' => ['/partner', 'PartnerSearch' => ['type' => 0]]],
        	['label' => '新闻管理', 'url' => ['/news']],
        	//['label' => '基金指數', 'url' => ['/indexfund']],
        	['label' => '合作伙伴', 'url' => ['/partner', 'PartnerSearch' => ['type' => 1]]],
            Yii::$app->user->isGuest ?
                ['label' => '登录', 'url' => ['/backend/login']] :
                [
                    'label' => '登出 (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/backend/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>
    <div class="container" style="padding-top: 80px">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; 东方佳合 <?= date('Y') ?></p>

        <p class="pull-right"><?= 'Tom Cao' ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>