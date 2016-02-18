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
	<div class="swiper-pagination">
	</div>
</div>
<div class="page-contanier" style="margin-top: 30px; width: 900px">
	<div style="margin: 0; left: 0; top: 0; width: 600px;float: left;height: 40px;font-size: 20px;line-height: 40px;">
	正晖资讯
	</div>
	<div style="margin: 0;width: 240px;float: left;line-height: 40px;height: 40px;font-size: 20px;margin-left: 60px;">合作伙伴</div>
	<div style="margin: 0; left: 0; top: 0; width: 600px;">
		<a href="/site/about?type=0">
			<div class="news first">
				<div class="img" style="width: 140px; height: 120px; float: left;">
					<img alt="正晖资本:小而美" src="http://pic.58pic.com/58pic/14/76/61/15A58PICaQW_1024.jpg" style="width: 112px; height: 112px; margin:4px 14px;">
				</div>
				<div class="title"
					style="width: 400px; margin-left: 10px; font-size: 12px; float: left; line-height: 15px; color: #000; ">正晖资本:小而美</div>
				<div class="intro"
					style="width: 400px; float: left; margin-left: 10px;font-size: 12px; height: 90px; overflow: hidden; color: #999;line-height: 22px;margin-top:10px;">
					一段优美的文字，彰显小而美的价值
				</div>
			</div>
		</a>
		<div style="width: 600px;margin-top: 10px;float: left;">
		<?php foreach ($news as $new) :?>
		<a href="/site/article?id=<?= $new->id ?>" style="display: block;color: #999;width: 280px;margin-right: 20px;font-size: 12px; float: left; line-height: 24px;"><?= $new->title?><span style="float: right"><?= date('Y-m-d', $new->date)?></span></a>
		<?php endforeach;?>
		</div>
	</div>
	<div class="swiper-container2" style="margin: 0;width: 260px; position: absolute; right: 0; top: 0;background-color: white;height: 180px;overflow:hidden;margin-top:40px;">
	   
		<div class="swiper-wrapper" style="">
		<?php for($i=0;$i<4;$i++):?>
		<div class="swiper-slide">
		
			<?php foreach($cases as $case) :?>
				<a href="/site/case?year=2015" class="icon" style="margin-left: 30px;margin-bottom: 10px;float: left;display: block;width: 80px;height: 80px;">
					<img src="/<?=$case->pic?>" alt="" style="width: 80px;height: 80px;" >
				</a>
			<?php endforeach;?>
		</div>
		<?php endfor;?>
		</div>
	</div>
</div>
<script>
/**
	function changeSlide() {
		if()
		$('.swiper-container .swiper-slide.swiper-slide-active').next().addClass('swiper-slide-active');
		$('.swiper-container .swiper-slide.swiper-slide-visible').next().addClass('swiper-slide-visible');
		$('.swiper-container .swiper-slide.swiper-slide-visible').removeClass('swiper-slide-visible');
		$('.swiper-container .swiper-slide.swiper-slide-active').removeClass('swiper-slide-active');
		
	}**/
    var swiper = new Swiper('.swiper-container', {
    	'loop' : true,
    	'speed':1000,
    	'autoplay' : 3000,
        'pagination': '.swiper-pagination',
        'paginationClickable': true
    });
   // setTimeout('changeSlide()', 3000);
    var swiper2 = new Swiper('.swiper-container2', {
    	'loop' : true,
    	'speed':1000,
    	'autoplay' : 2000,
        'mode' : 'vertical'
    });
</script>
