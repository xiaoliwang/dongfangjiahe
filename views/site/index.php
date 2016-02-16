<div
	style="position: relative; top: 0; left: 0px; right: 0px; height: 300px;">
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
	<div class="swiper-pagination"
		style="position: absolute; bottom: 0px; left: 0px; right: 0px; margin: auto">
	</div>
</div>
<div class="page-contanier" style="margin-top: 30px; width: 1000px">
	<div style="margin: 0; left: 0; top: 0; width: 600px;">
		<a href="#">
			<div class="news first">
				<div class="img" style="width: 180px; height: 180px; float: left;">
					<img alt="标题啊标题" src="" style="width: 180px; height: 180px;">
				</div>
				<div class="title"
					style="width: 400px; margin-left: 20px; font-size: 20px; float: left; line-height: 40px; color: #000; margin-top: 20px;">标题啊标题</div>
				<div class="intro"
					style="width: 400px; float: left; margin-left: 20px; height: 120px; overflow: hidden; color: #999;">标题啊标题标题啊标题标题啊标题标题啊标题标题啊
					标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标
					题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标题啊标题标
					题啊标题标题啊标题标</div>
			</div>
		</a>
		<div style="width: 600px;margin-top: 20px;float: left;">
		<?php for($i=0;$i<4;$i++):?>
		<a href="#" style="display: block;color: #333;width: 280px;margin-right: 20px;line-height: 30px;float:left;">标题啊标题</a>
		<?php endfor;?>
		</div>
	</div>
	<div style="margin: 0; width: 400px; position: absolute; right: 0; top: 0; width: 360px;">
	<a style="
    display: block;
    width: 360px;
    height: 40px;
    border-bottom: 1px solid #eee;
    font-weight: 600;"><div style="
    color: #777;
    line-height: 40px;
    float: left;
    width: 200px;">神马神马</div><div style="
    line-height: 40px;
    float: right;
    width: 60px;
    color: #3c763d;">⇧38</div></a>
    <a style="
    display: block;
    width: 360px;
    height: 40px;
    border-bottom: 1px solid #eee;
    font-weight: 600;"><div style="
    color: #777;
    line-height: 40px;
    float: left;
    width: 200px;">神马神马神马神马</div><div style="
    line-height: 40px;
    float: right;
    width: 60px;
    color: #a94442;">⇩20</div></a>
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