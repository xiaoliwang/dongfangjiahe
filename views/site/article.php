<div class="pageheader"
	style="background-image: url(/headerimg/<?php
		switch($article->type){
			case 2:
				echo '18.jpg)';break;
			case 3:
				echo '14.jpg)';break;
			case 4:
				echo '17.jpg);background-position-y: 360px';break;
			default:
				echo '27.jpg);background-position-y:-4px';
		}
	?>"></div>
<div class="box article"
	style="width: 800px;  bottom: 60px; top: 300px; left: 0; right: 0; margin: 100px auto;">
	<div class="title">
		<?php echo $article->title;?>
	</div>
	<?php if($article->type != 4):?>
	<div class="info">
	<div class="time">
	时间：<?php echo date("Y/m/d",$article->date);?>
	</div>
	<div class="from">
	文章来源：<?php echo $article->from;?>
	</div>
	<div class="auth">
	作者：<?php echo $article->auth;?>
	</div>
	</div>
	<?php endif;?>
	<div class="content">
	<?php echo $article->content;?>
	</div>
</div>
