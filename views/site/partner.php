<div class="pageheader" style="background-image: url(/headerimg/26.jpg);background-position-y: 385px;">
</div>
<div class="page-contanier" style="margin-top: 100px;">
	<div class="col">
	<?php $i=0;?>
	<?php foreach ($parteners as $par):?>
		<?php if($i%6==0 && $i!=0):?>
		</div><div class="col">
		<?php endif;$i++;?>
		<div class="partener">
		<a href="<?=$par->link;?>">
		<div class="pic"><img alt="<?=$par->title;?>" src="/<?=$par->pic;?>" /></div>
			<div class="title">
			<?=$par->title;?>
			</div>
		</div>
		</a>
	<?php endforeach;?>
	</div>
</div>
