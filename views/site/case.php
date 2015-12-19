<?php 
use yii\widgets\LinkPager;
?>
<div class="pageheader"
	style="background-image: url(/headerimg/14.jpg);"></div>
<div class="box"
	style="width: 800px; bottom: 60px; top: 300px; left: 0; right: 0; margin: auto;">
	<div class="news">
<?php foreach ($news as $new):?>
<a href="/site/article?id=<?php echo $new->id;?>">
			<div class="news_item"
				style="padding: 20px 10px 0; height: 50px; border-bottom: 1px solid #ddd;">
				<div
					style="color: #a94442; font-size: 20px; line-height: 30px; width: 100%; position: relative; font-weight: 600;"><?php echo $new->title;?></div>
			</div>
		</a>
<?php endforeach;?>
<?= LinkPager::widget([
        'pagination' => $pagination,
]);?>
</div>
</div>
