<div
	style="position: absolute; left: 0px; right: 0px; top: 50px; bottom: 50px;">
	<div class="swiper-container swiper-container-horizontal">
		<div class="swiper-wrapper"
			style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
			<div class="swiper-slide"
				style="background-image: url(/image/watchmaker-pic-2.jpg);">
				<div class="ani"
					style="position: absolute; bottom: 100px; background-color: rgba(0, 0, 0, 0.44); color: #dfdfdf; width: 300px; height: 200px; padding: 0px;"
					swiper-animate-effect="fadeIn" swiper-animate-duration="2s"
					swiper-animate-delay="0s">
					<p class="ani"
						style="color: #fff; font-size: 40px; line-height: 40px; font-weight: 600; text-align: right; padding: 10px 20px 5px; width: 100%; border-bottom: 1px solid #fff"
						swiper-animate-effect="fadeInLeft" swiper-animate-duration="2s"
						swiper-animate-delay="0.5s">小而美</p>
					<p class="ani"
						style="color: #fff; font-size: 14px; line-height: 20px; font-weight: 400; padding: 10px 20px; width: 100%"
						swiper-animate-effect="fadeInLeft" swiper-animate-duration="2s"
						swiper-animate-delay="1s">北京正晖基金管理有限公司秉承 “小而美”
						的企业理念，追求精益求精的价值发现、价值实现和价值释放</p>
				</div>
			</div>
			<div class="swiper-slide"
				style="background-image: url(/image/index-2.jpg);">
				<div class="ani"
					style="position: absolute; bottom: 100px; background-color: rgba(0, 0, 0, 0.44); color: #dfdfdf; width: 300px; height: 200px; padding: 0px;"
					swiper-animate-effect="fadeIn" swiper-animate-duration="2s"
					swiper-animate-delay="0s">
					<p class="ani"
						style="color: #fff; font-size: 40px; line-height: 40px; font-weight: 600; text-align: right; padding: 10px 20px 5px; width: 100%; border-bottom: 1px solid #fff"
						swiper-animate-effect="fadeInLeft" swiper-animate-duration="2s"
						swiper-animate-delay="0.5s">发现价值</p>
					<p class="ani"
						style="color: #fff; font-size: 14px; line-height: 20px; font-weight: 400; padding: 10px 20px; width: 100%"
						swiper-animate-effect="fadeInLeft" swiper-animate-duration="2s"
						swiper-animate-delay="1s">滴水不漏的发现价值，追求细节的深度探究，成为您的财富之眼，为您挖掘更多财富</p>
				</div>
			</div>
			<div class="swiper-slide"
				style="background-image: url(/image/index-3.jpg);">
				<div class="ani"
					style="position: absolute; bottom: 100px; background-color: rgba(0, 0, 0, 0.44); color: #dfdfdf; width: 300px; height: 200px; padding: 0px;"
					swiper-animate-effect="fadeIn" swiper-animate-duration="2s"
					swiper-animate-delay="0s">
					<p class="ani"
						style="color: #fff; font-size: 40px; line-height: 40px; font-weight: 600; text-align: right; padding: 10px 20px 5px; width: 100%; border-bottom: 1px solid #fff"
						swiper-animate-effect="fadeInLeft" swiper-animate-duration="2s"
						swiper-animate-delay="0.5s">价值实现</p>
					<p class="ani"
						style="color: #fff; font-size: 14px; line-height: 20px; font-weight: 400; padding: 10px 20px; width: 100%"
						swiper-animate-effect="fadeInLeft" swiper-animate-duration="2s"
						swiper-animate-delay="1s">积跬步以至于远方，汇万千小流以成名川大河。为您实现价值，筑您成功阶梯</p>
				</div>
			</div>
			<div class="swiper-slide"
				style="background-image: url(/image/index-4.jpg);">
				<div class="ani"
					style="position: absolute; bottom: 100px; background-color: rgba(0, 0, 0, 0.44); color: #dfdfdf; width: 300px; height: 200px; padding: 0px;"
					swiper-animate-effect="fadeIn" swiper-animate-duration="2s"
					swiper-animate-delay="0s">
					<p class="ani"
						style="color: #fff; font-size: 40px; line-height: 40px; font-weight: 600; text-align: right; padding: 10px 20px 5px; width: 100%; border-bottom: 1px solid #fff"
						swiper-animate-effect="fadeInLeft" swiper-animate-duration="2s"
						swiper-animate-delay="0.5s">价值释放</p>
					<p class="ani"
						style="color: #fff; font-size: 14px; line-height: 20px; font-weight: 400; padding: 10px 20px; width: 100%"
						swiper-animate-effect="fadeInLeft" swiper-animate-duration="2s"
						swiper-animate-delay="1s">水击三千里，抟扶摇而上者九万里，尽一览河山。稳健风险管理，大千世界，皆在掌控！放心于资本，自在张驰。</p>
				</div>
			</div>
		</div>
	
		<!-- Add Pagination -->
		<div class="swiper-pagination swiper-pagination-clickable">
			<span class="swiper-pagination-bullet"></span><span
				class="swiper-pagination-bullet"></span><span
				class="swiper-pagination-bullet"></span><span
				class="swiper-pagination-bullet"></span>
		</div>
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