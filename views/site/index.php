<div style="position: absolute;top: 0;left:0px;right:0px;height:300px;">
	<div class="swiper-container swiper-container-horizontal">
		<div class="swiper-wrapper"
			style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
			<?php foreach ($frontpages as $frontpage):?>
			<div class="swiper-slide" style="background-image: url(/<?=$frontpage->pic?>);">
		<!-- 	<div class="ani" style="position: absolute;bottom:100px;background-color: rgba(0, 0, 0, 0.44);color: #dfdfdf;width: 38%;height: 150px;padding:0px;" swiper-animate-effect="fadeIn" swiper-animate-duration="2s" swiper-animate-delay="0s">
				<p class="ani" style="color:#fff;font-size:40px;line-height:40px;font-weight:600;text-align:right;padding:10px 80px 5px;width:100%;border-bottom:1px solid #fff" swiper-animate-effect="fadeInLeft" swiper-animate-duration="2s" swiper-animate-delay="0.5s"><?=$frontpage->title?></p>
				<p class="ani" style="color:#fff;font-size:14px;line-height:20px;font-weight:400;padding:10px 20px;width:100%" swiper-animate-effect="fadeInLeft" swiper-animate-duration="2s" swiper-animate-delay="1s"><?=$frontpage->summary?></p>
			</div> -->
			</div>
			<?php endforeach;?>
		</div>
	</div>
	<div class="swiper-pagination" style="position: absolute;bottom:0px;left:0px;right:0px;margin:auto">
	</div>
</div>
<div class="page-contanier" style="margin-top:380px;width:1000px">
	<div style=" margin: 0;width:600px">
	<?php foreach ($people as $key => $member):?>
	<?php if ($key & 1) :?>
	<div style="width: 100%; height: 400px; margin-top: 10px;">
		<img alt="<?=$member->name?>" src="/<?=$member->pic?>"
			style="width: 165px; float: right; margin: 10px;">
		<div style="margin: 10px 10px 40px; float: right; width: 395px;">
			<p style="text-align: right; font-size: 25px; line-height: 40px;"><?=$member->name?></p>
			<p
				style="text-align: right; font-size: 20px; line-height: 30px; border-bottom: 1px solid #ccc;"><?=$member->position?></p>
			<p style="text-align: right; font-size: 16px; line-height: 25px;"><?=$member->email?></p>
			<p><?=$member->summary?></p>
		</div>
	</div>
	<?php else :?>
	<div style="width: 100%; height: 400px;margin-top: 10px;">
		<img alt="<?=$member->name?>" src="/<?=$member->pic?>"
			style="width: 165px; float: left; margin: 10px;">
		<div style="margin: 10px 10px 40px; float: left; width: 395px;">
			<p style="text-align: left; font-size: 25px; line-height: 40px;"><?=$member->name?></p>
			<p
				style="text-align: left; font-size: 20px; line-height: 30px; border-bottom: 1px solid #ccc;"><?=$member->position?></p>
			<p style="text-align: left; font-size: 16px; line-height: 25px;"><?=$member->email?></p>
			<p><?=$member->summary?></p>
		</div>
	</div>
	<?php endif;?>
	<?php endforeach;?>
	</div>
	<div style=" margin: 0;width:400px;position:absolute;right:0;top:0;width:360px;" class="case">
<?php foreach ($news as $index=>$new):?>
<a href="/site/article?id=<?php echo $new->id;?>">
			<div class="news_item" style="width: 320px;">
				<div class="img">
					<img alt="<?=$new->title;?>" style="width: 240px;" src="/<?=$new->pic;?>">
				</div>
				<div class="title"><?=$new->title;?></div>
			</div>
		</a>
<?php endforeach;?>
	</div>
</div>
<script>
    var swiper = new Swiper('.swiper-container', {
    	effect : 'fade',
    	loop : true,
    	speed:5000,
    	fade: {
  		  crossFade: true,
  		},
  		onInit: function(swiper){ //Swiper2.x的初始化是onFirstInit
  		    swiperAnimateCache(swiper); //隐藏动画元素 
  		    swiperAnimate(swiper); //初始化完成开始动画
  		  }, 
  		  onSlideChangeEnd: function(swiper){ 
  		    swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
  		  },

    	autoplay : 6000,
        pagination: '.swiper-pagination',
        paginationClickable: true
    });
</script>