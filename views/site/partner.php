<div class="pageheader" style="background-image: url(/headerimg/7.jpg);">
</div>
<div class="page-contanier" style="margin-top: 100px;">
	<div class="col">
	<?php $i=0;?>
	<?php foreach ($parteners as $par):?>
		<?php if($i%5==0 && $i!=0):?>
		</div><div class="col">
		<?php endif;$i++;?>
		<div class="partener">
		<a href="<?php echo $par->link;?>">
		<div class="pic"><img src="/<?php echo $par->pic;?>" /></div>
			<div class="title">
			<?php echo $par->title;?>
			</div>
		</div>
		</a>
	<?php endforeach;?>
	</div>
</div>
