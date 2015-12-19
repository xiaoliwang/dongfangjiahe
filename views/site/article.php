<div class="pageheader"
	style="background-image: url(/headerimg/222.jpg);"></div>
<div class="box article"
	style="width: 800px;  bottom: 60px; top: 300px; left: 0; right: 0; margin: 100px auto;">
	<div class="title">
		<?php echo $article[0]->title;?>
	</div>
	<?php if($article[0]->type != 4):?>
	<div class="info">
	<div class="time">
	时间：<?php echo date("Y/m/d",$article[0]->date);?>
	</div>
	<div class="from">
	文章来源：<?php echo $article[0]->from;?>
	</div>
	<div class="auth">
	作者：<?php echo $article[0]->auth;?>
	</div>
	</div>
	<?php endif;?>
	<div class="content">
	<?php echo $article[0]->content;?>
	</div>
</div>
