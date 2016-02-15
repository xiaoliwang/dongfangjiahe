<?php 
use yii\widgets\LinkPager;
?>
<div class="pageheader"
	style="background-image: url(/headerimg/<?php switch(Yii::$app->request->get('type', 1)){
		case 2:
			echo '18.jpg);';
			break;
		case 3:
			echo '14.jpg);';
			break;
		default:
			echo '27.jpg);background-position-y:-4px;';
	}?>"></div>
<div class="box"
	style="width: 800px;  bottom: 60px; top: 300px; left: 0; right: 0; margin: auto;">
	<div class="news">
<?php foreach ($news as $new):?>
<a href="/site/article?id=<?php echo $new->id;?>">
	<div class="news_item" style="padding:20px 10px 0;height:70px;border-bottom:1px solid #ddd;">
		<div style="color:#333;font-size:20px;line-height:30px;width:100%;position:relative;font-weight:600;"><?php echo $new->title;?></div>
		<div style="height:20px;width:100%;position:relative;">
			<div style="color: #999;font-size:12px;line-height:20px;position:relative;float:left;">类别：
			<?php 
			switch($new->type){
				case 1:
					echo '公司动态';
					break;
				case 2:
					echo '行业资讯';
					break;
				case 3:
					echo '基金公告';
					break;
				default:
					echo '投资案例';
			}
			?></div>
			<div style="color: #999;font-size:12px;line-height:20px;position:relative;float:left;margin-left:40px;">时间：<?php echo date("Y/m/d",$new->date);?></div>
		</div>
	</div>
</a>
<?php endforeach;?>
<?= LinkPager::widget([
        'pagination' => $pagination,
]);?>
</div>
</div>
