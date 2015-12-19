<?php 
use yii\widgets\LinkPager;
?>
<div class="pageheader"
	style="background-image: url(/headerimg/24.jpg);"></div>
<div class="box"
	style="width: 800px; bottom: 60px; top: 300px; left: 0; right: 0; margin: auto;">
	<div class="case">
<div class="news-col">
<?php foreach ($news as $index=>$new):?>
<?php if($index!=0 && $index%2==0):?>
</div><div class="news-col">
<?php endif?>
<a href="/site/article?id=<?php echo $new->id;?>">
			<div class="news_item">
				<div class="img">
					<img alt="" src="/<?php echo $new->pic;?>">
				</div>
				<div class="title"><?php echo $new->title;?></div>
			</div>
		</a>
<?php endforeach;?>
</div>
<?= LinkPager::widget([
        'pagination' => $pagination,
]);?>
</div>
</div>
