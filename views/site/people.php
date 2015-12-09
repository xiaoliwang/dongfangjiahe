<div class="pageheader"
	style="background-image: url(/image/watchmaker-pic-2.jpg);">
</div>
<div class="page-contanier" style=" margin-top: 80px;width:800px">
	<?php foreach ($people as $key => $member):?>
	<?php if ($key & 1) :?>
	<div style="width: 100%; height: 400px; margin-top: 20px;">
		<img alt="" src="/<?=$member->pic?>"
			style="width: 214px; float: right; margin: 10px;">
		<div style="margin: 10px 10px 40px; float: right; width: 546px;">
			<p style="text-align: right; font-size: 30px; line-height: 40px;"><?=$member->name?></p>
			<p
				style="text-align: right; font-size: 20px; line-height: 30px; border-bottom: 1px solid #ccc;"><?=$member->position?></p>
			<p style="text-align: right; font-size: 16px; line-height: 25px;"><?=$member->email?></p>
			<p><?=$member->summary?></p>
		</div>
	</div>
	<?php else :?>
	<div style="width: 100%; height: 400px;margin-top: 20px;">
		<img alt="" src="/<?=$member->pic?>"
			style="width: 214px; float: left; margin: 10px;">
		<div style="margin: 10px 10px 40px; float: left; width: 546px;">
			<p style="text-align: left; font-size: 30px; line-height: 40px;"><?=$member->name?></p>
			<p
				style="text-align: left; font-size: 20px; line-height: 30px; border-bottom: 1px solid #ccc;"><?=$member->position?></p>
			<p style="text-align: left; font-size: 16px; line-height: 25px;"><?=$member->email?></p>
			<p><?=$member->summary?></p>
		</div>
	</div>
	<?php endif;?>
	<?php endforeach;?>
</div>
