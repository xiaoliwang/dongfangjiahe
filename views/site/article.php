<div class="pageheader"
	style="background-image: url(/headerimg/<?php
		switch($article[0]->type){
			case 2:
				echo '18';break;
			case 3:
				echo '14';break;
			case 4:
				echo '17';break;
			default:
				echo '16';
		}
	?>.jpg);"></div>
<div class="box article"
	style="width: 800px;  bottom: 60px; top: 300px; left: 0; right: 0; margin: auto;">
	<div class="title">
		<?php echo $article[0]->title;?>
	</div>
	<?php if($article[0]->type != 4):?>
	<div class="time">
	时间：<?php echo date("Y/m/d",$article[0]->date);?>
	</div>
	<?php endif;?>
	<div class="content">
	<?php echo $article[0]->content;?>
	</div>
</div>
