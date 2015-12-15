<div class="pageheader"
	style="background-image: url(/headerimg/1.jpg);"></div>
<div class="box"
	style="width: 800px;  bottom: 60px; top: 300px; left: 0; right: 0; margin: auto;">
	<div class="news">
<?php foreach ($news as $new):?>
<a href="/site/article?id=<?php echo $new->id;?>">
	<div class="news_item" style="padding:20px 10px 0;height:70px;border-bottom:1px solid #ddd;">
		<div style="color:#a94442;font-size:20px;line-height:30px;width:100%;position:relative;font-weight:600;"><?php echo $new->title;?></div>
		<div style="height:20px;width:100%;position:relative;">
			<div style="color: #999;font-size:12px;line-height:20px;position:relative;float:left;">类别：<?php echo $new->type==1?"公司动态":$new->type==2?"行业资讯":"基金公告";?></div>
			<div style="color: #999;font-size:12px;line-height:20px;position:relative;float:left;margin-left:40px;">时间：<?php echo date("Y/m/d",$new->date);?></div>
		</div>
	</div>
</a>
<?php endforeach;?>
</div>
</div>
