<div class="pageheader"
	style="background-image: url(/image/watchmaker-pic-2.jpg);"></div>
<div class="box"
	style="width: 800px;  bottom: 60px; top: 300px; left: 0; right: 0; margin: auto;">
	<div class="news">
<?php foreach ($news as $new):?>
<a href="/site/article?id=<?php echo $new->id;?>">
	<div class="news_item" style="padding:20px 10px 0;height:50px;border-bottom:1px solid #666;">
		<div style="color:#a94442;font-size:20px;line-height:30px;width:100%;position:relative;font-weight:600;"><?php echo $new->title;?></div>
	</div>
</a>
<?php endforeach;?>
</div>
</div>
<style>
body {
    height: 100%;
	background-color:#000;
}
</style>