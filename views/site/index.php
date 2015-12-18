<div style="position: absolute;left:0px;right:0px;top:50px;bottom:50px;">
	<div class="swiper-container swiper-container-horizontal">
		<div class="swiper-wrapper"
			style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
			<?php foreach ($frontpages as $frontpage):?>
			<div class="swiper-slide" style="background-image: url(/<?=$frontpage->pic?>);">
			<div class="ani" style="position: absolute;bottom:100px;background-color: rgba(0, 0, 0, 0.44);color: #dfdfdf;width: 300px;height: 200px;padding:0px;" swiper-animate-effect="fadeIn" swiper-animate-duration="2s" swiper-animate-delay="0s">
				<p class="ani" style="color:#fff;font-size:40px;line-height:40px;font-weight:600;text-align:right;padding:10px 20px 5px;width:100%;border-bottom:1px solid #fff" swiper-animate-effect="fadeInLeft" swiper-animate-duration="2s" swiper-animate-delay="0.5s"><?=$frontpage->title?></p>
				<p class="ani" style="color:#fff;font-size:14px;line-height:20px;font-weight:400;padding:10px 20px;width:100%" swiper-animate-effect="fadeInLeft" swiper-animate-duration="2s" swiper-animate-delay="1s"><?=$frontpage->summary?></p>
			</div>
			</div>
			<?php endforeach;?>
		</div>
	</div>
	<div class="swiper-pagination" style="position: absolute;bottom:0px;left:0px;right:0px;margin:auto">
	</div>
</div>
<script>
    var swiper = new Swiper('.swiper-container', {
    	effect : 'fade',
    	loop : true,
    	speed:1000,
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
    	autoplay : 8000,
        pagination: '.swiper-pagination',
        paginationClickable: true
    });
</script>