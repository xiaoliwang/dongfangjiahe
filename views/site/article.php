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
	<?php if($article->type == 4):?>
	<ul id="tab" style="height: 30px;padding: 0px;">
		<li id="intro-tab" class="active">详情</li>
		<li id="diagram-tab">图表</li>
	</ul>
	<div id="intro-content" class="active">
	<?php endif;?>
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
	<?php ?>
	</div>
	<div id="diagram-content">
	<div id="diagram" style="width:800px;height:400px;"></div>
	<script src="http://echarts.baidu.com/build/dist/echarts.js"></script>
    <script type="text/javascript">
    	$('#tab li#intro-tab').click(function(){
    		$('#tab li').removeClass('active');
    		$('#diagram-content').removeClass('active');
    		$('#intro-content').addClass('active');
    		$(this).addClass('active');
        });
    	$('#tab li#diagram-tab').click(function(){
    		$('#tab li').removeClass('active');
    		$('#diagram-content').addClass('active');
    		$('#intro-content').removeClass('active');
    		$(this).addClass('active');
        });
        // 路径配置
        require.config({
            paths: {
                echarts: 'http://echarts.baidu.com/build/dist'
            }
        });
        
        // 使用
        require(
            [
                'echarts',
                'echarts/chart/line'
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('diagram')); 
                
                var option = {
                	    title : {
                	        text: '未来一周气温变化',
                	        subtext: '纯属虚构'
                	    },
                	    tooltip : {
                	        trigger: 'axis'
                	    },
                	    legend: {
                	        data:['最高气温']
                	    },
                	    toolbox: {
                	        show : true,
                	        feature : {
                	            
                	        }
                	    },
                	    calculable : true,
                	    xAxis : [
                	        {
                	            type : 'category',
                	            boundaryGap : false,
                	            data : ['周一','周二','周三','周四','周五','周六','周日']
                	        }
                	    ],
                	    yAxis : [
                	        {
                	            type : 'value',
                	            axisLabel : {
                	                formatter: '{value} °C'
                	            }
                	        }
                	    ],
                	    series : [
                	        {
                	            name:'最高气温',
                	            type:'line',
                	            data:[11, 11, 15, 13, 12, 13, 10],
                	            markPoint : {
                	                data : [
                	                    {type : 'max', name: '最大值'},
                	                    {type : 'min', name: '最小值'}
                	                ]
                	            },
                	            markLine : {
                	                data : [
                	                    {type : 'average', name: '平均值'}
                	                ]
                	            }
                	        },
                	        
                	    ]
                	};
                	                    
        
                // 为echarts对象加载数据 
                myChart.setOption(option); 
            }
        );
    </script>
	</div>
	<?php ?>
</div>
