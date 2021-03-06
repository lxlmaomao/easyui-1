<?php if (!defined('THINK_PATH')) exit();?><script src="__PUBLIC__/js/Highcharts-2.3.3/js/highcharts.js"></script>
<script src="__PUBLIC__/js/Highcharts-2.3.3/js/modules/exporting.js"></script>
<script src="__PUBLIC__/js/Highcharts-2.3.3/js/themes/dark-green.js"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
<script type="text/javascript">
$(function () {
    $(document).ready(function() {
        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });
    
        var chart;
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'spline',
                marginRight: 10,
                events: {
                    load: function() {
    
                        // set up the updating of the chart each second
                        var series = this.series[0];
                        setInterval(function() {
                            var x = (new Date()).getTime(), // current time
                                y = Math.random();
                            series.addPoint([x, y], true, true);
                        }, 5000);
                    }
                }
            },
            title: {
                text: '居民用水量实时监测系统'
            },
            xAxis: {
                type: 'datetime',
                tickPixelInterval: 150
            },
            yAxis: {
                title: {
                    text: '数值'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) +'<br/>'+
                        Highcharts.numberFormat(this.y, 2);
                }
            },
            legend: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            series: [{
                name: '实时数据',
                data: (function() {
                    // generate an array of random data
                    var data = [],
                        time = (new Date()).getTime(),
                        i;
    
                    for (i = -19; i <= 0; i++) {
                        data.push({
                            x: time + i * 5000,
                            y: Math.random()
                        });
                    }
                    return data;
                })()
            }]
        });
    });
    
});
</script>
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript">
$(function () {
    var chart2;
    $(document).ready(function() {
        chart2 = new Highcharts.Chart({
            chart: {
                renderTo: 'container2'
            },
            title: {
                text: '产油量分布图'
            },
            xAxis: {
                categories: ['十月', '十一月', '十二月', '一月', '二月']
            },
            tooltip: {
                formatter: function() {
                    var s;
                    if (this.point.name) { // the pie chart
                        s = ''+
                            this.point.name +': '+ this.y +'(10吨)';
                    } else {
                        s = ''+
                            this.x  +': '+ this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                    html: '各占百分比',
                    style: {
                        left: '40px',
                        top: '8px',
                        color: 'black'
                    }
                }]
            },
            series: [{
                type: 'column',
                name: '第一采油厂',
                data: [3, 2, 1, 3, 4]
            }, {
                type: 'column',
                name: '第二采油厂',
                data: [2, 3, 5, 7, 6]
            }, {
                type: 'column',
                name: '第三采油厂',
                data: [4, 3, 3, 9, 1]
            }, {
                type: 'spline',
                name: '平均采油量',
                data: [3, 2.67, 3, 6.33, 3.33],
                marker: {
                	lineWidth: 2,
                	lineColor: Highcharts.getOptions().colors[3],
                	fillColor: 'white'
                }
            }, {
                type: 'pie',
                name: 'Total consumptionrrrr的方法',
                data: [{
                    name: '第一采油厂',
                    y: 13,
                    color: '#4572A7' // Jane's color
                }, {
                    name: '第二采油厂',
                    y: 23,
                    color: '#AA4643' // John's color
                }, {
                    name: '第三采油厂',
                    y: 19,
                    color: '#89A54E' // Joe's color
                }],
                center: [100, 80],
                size: 100,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }]
        });
    });
    
});
		</script>
<div id="container2" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript" src="__PUBLIC__/js/ichart-1.0.js"></script>
<script type="text/javascript">
	 $(function(){	
	//动画3D饼图
	var data0 = [{name : '广东',value : 104303132,color:'#4572a7'},
			        	{name : '山东',value : 95793065,color:'#4572a7'},
			        	{name : '河南',value : 94023567,color:'#4572a7'},
			        	{name : '四川',value : 80418200,color:'#4572a7'},
			        	{name : '江苏',value : 78659903,color:'#4572a7'},
			        	{name : '河北',value : 71854202,color:'#4572a7'},
			        	{name : '湖南',value : 65683722,color:'#4572a7'},
			        	{name : '安徽',value : 59500510,color:'#4572a7'},
			        	{name : '湖北',value : 57237740,color:'#4572a7'},
			        	{name : '浙江',value : 54426891,color:'#4572a7'},
			        	{name : '广西',value : 46026629,color:'#4572a7'},
			        	{name : '云南',value : 45966239,color:'#4572a7'},
			        	{name : '江西',value : 44567475,color:'#4572a7'},
			        	{name : '辽宁',value : 43746323,color:'#4572a7'},
			        	{name : '黑龙江',value : 38312224,color:'#4572a7'},
			        	{name : '陕西',value : 37327378,color:'#4572a7'},
			        	{name : '福建',value : 36327378,color:'#4572a7'},
			        	{name : '山西',value : 35712111,color:'#4572a7'},
			        	{name : '贵州',value : 34746468,color:'#4572a7'},
			        	{name : '重庆',value : 28846170,color:'#4572a7'},
			        	{name : '吉林',value : 27462297,color:'#4572a7'},
			        	{name : '甘肃',value : 25575254,color:'#4572a7'},
			        	{name : '内蒙古',value : 24706321,color:'#4572a7'},
			        	{name : '上海',value : 23019148,color:'#4572a7'},
			        	{name : '新疆',value : 21813334,color:'#4572a7'},
			        	{name : '北京',value : 19612368,color:'#4572a7'},
			        	{name : '天津',value : 12938224,color:'#4572a7'},
			        	{name : '海南',value : 8671518,color:'#4572a7'},
			        	{name : '宁夏',value : 6301350,color:'#4572a7'},
			        	{name : '青海',value : 5626722,color:'#4572a7'},
			        	{name : '西藏',value : 3002166,color:'#4572a7'}
		        	];
			
			var chart0 = new iChart.Column2D({
				render : 'canvasDiv0',
				data : data0,
				title : {
					text : '全国2010年第六次全国人口普查数据',
					color : '#3e576f'
				},
				subtitle : {
					text : '图表展示了31个省、自治区、直辖市2010年的常住人口数据，并进行排名',
					color : '#6d869f'
				},
				footnote : {
					text : 'ichartjs.com',
					color : '#909090',
					fontsize : 11,
					padding : '0 38'
				},
				width : 800,
				height : 400,
				label : {
					fontsize:11,
					textAlign:'right',
					textBaseline:'middle',
					rotate:-45,
					color : '#666666'
				},
				tip:{
					enable:true,
					listeners:{
						 //tip:提示框对象、name:数据名称、value:数据值、text:当前文本、i:数据点的索引
						parseText:function(tip,name,value,text,i){
							//将数字进行千位格式化
							var f = new String(value);
							f = f.split("").reverse().join("").replace(/(\d{3})/g,"$1,").split("").reverse();
							if(f[0]==','){
								f.shift();
							}	
							f = f.join("");
							
							return name+"人口:<br/>"+f+"人<br/>占全国比重:<br/>"+(value/this.get('total') * 100).toFixed(2)+ '%';
						}
					}
				},
				shadow : true,
				shadow_blur : 2,
				shadow_color : '#aaaaaa',
				shadow_offsetx : 1,
				shadow_offsety : 0,
				colwidth : 62,
				sub_option : {
					label : false,
					border : {
						width : 2,
						color : '#ffffff'
					}
				},
				coordinate : {
					background_color : null,
					grid_color : '#c0c0c0',
					width : 660,
					height:240,
					axis : {
						color : '#c0d0e0',
						width : [0, 0, 1, 0]
					},
					scale : [{
						position : 'left',
						start_scale : 0,
						end_scale : 110000000,
						scale_space : 10000000,
						scale_enable : false,
						label : {
							fontsize:11,
							color : '#666666'
						},
						listeners:{
							parseText:function(t,x,y){
								return {text:t/10000}
							}
						 }
					}]
				}
			});
			
			//利用自定义组件构造左侧说明文本
			chart0.plugin(new iChart.Custom({
					drawFn:function(){
						//计算位置
						var coo = chart0.getCoordinate(),
							x = coo.get('originx'),
							y = coo.get('originy');
						//在左上侧的位置，渲染一个单位的文字
						chart0.target.textAlign('start')
						.textBaseline('bottom')
						.textFont('600 11px Verdana')
						.fillText('人口数(万人)',x-40,y-10,false,'#6d869f');
						
					}
			}));
			
			chart0.draw();

		//基础柱状图形
		var data1 = [
		{name : 'H',value : 7,color:'#a5c2d5'},
	   	{name : 'E',value : 5,color:'#cbab4f'},
	   	{name : 'L',value : 12,color:'#76a871'},
	   	{name : 'L',value : 12,color:'#76a871'},
	   	{name : 'O',value : 15,color:'#a56f8f'},
	   	{name : 'W',value : 13,color:'#c12c44'},
	   	{name : 'O',value : 15,color:'#a56f8f'},
	   	{name : 'R',value : 18,color:'#9f7961'},
	   	{name : 'L',value : 12,color:'#76a871'},
	   	{name : 'D',value : 4,color:'#6f83a5'}
	 ];
		var chart1 = new iChart.Column2D({
			render : 'canvasDiv1',//渲染的Dom目标,canvasDiv为Dom的ID
			data: data1,//绑定数据
			title : '基于HTML5的图表制作',//设置标题
			width : 800,//设置宽度，默认单位为px
			height : 400,//设置高度，默认单位为px
			shadow:true,//激活阴影
			shadow_color:'#c7c7c7',//设置阴影颜色
			coordinate:{scale:[{//配置自定义值轴
					 position:'left',//配置左值轴	
					 start_scale:0,//设置开始刻度为0
					 end_scale:26,//设置结束刻度为26
					 scale_space:2,//设置刻度间距
					 listeners:{//配置事件
						parseText:function(t,x,y){//设置解析值轴文本
							return {text:t+" cm"};
						}
					}
				}]
			}
		});
		chart1.draw();
		
		//创建数据条形图
				var data2 = [
				        	{
				        		name : 'A产品',
				        		value:[2680,2200,1014,2590,2800,3200,2184,3456,2693,2064,2414,2044],
				        		color:'#01acb6',
				        		line_width:2
				        	}
				       ];
				//创建x轴标签文本   
			    var labels = ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"];
			       
				var chart2 = new iChart.Area2D({
						render : 'canvasDiv2',
						data: data2,
						title:{
							text:'A产品2011年度订单数据分析',
							color:'#eff4f8',
							background_color:'#1c4156',
							height:40,
							border:{
								enable:true,
								width:[0,0,4,0],//只显示下边框
								color:'#173a4e'
							}
						},
						subtitle:{
							text:'单位:万件',//利用副标题设置单位信息
							fontsize:14,
							color:'#eff4f8',
							textAlign:'left',
							padding:'0 40',
							height:20
						},
						footnote:{
							text:'数据来源:企业ERP数据中心',
							color:'#708794',
							padding:'0 20',
							background_color:'#102c3c',
							height:30,
							border:{
								enable:true,
								width:[3,0,0,0],//只显示上边框
								color:'#0f2b3a'
							}
						},
						padding:'5 1',//设置padding,以便title能占满x轴
						sub_option:{
							label:false,
							hollow_inside:false,//设置一个点的亮色在外环的效果
							point_size:10
						},
						tip:{
							enable:true,
							listeners:{
								 //tip:提示框对象、name:数据名称、value:数据值、text:当前文本、i:数据点的索引
								parseText:function(tip,name,value,text,i){
									return labels[i]+"订单数:<span style='color:red'>"+value+"</span>万件";
								}
							}
						},
						width : 800,
						height : 400,
						background_color:'#0c222f',
						gradient:true,
						shadow:true,
						shadow_blur:2,
						shadow_color:'#4e8bae',
						shadow_offsetx:0,
						shadow_offsety:0,
						gradient_mode:'LinearGradientDownUp',//设置一个从下到上的渐变背景
						border:{
							radius:5
						},
						coordinate:{
							width : 600,
							height : 240,
							grid_color:'#506e7d',
							background_color:null,//设置坐标系为透明背景
							scale:[{
								 position:'left',	
								 label:{
									 color:'#eff4f8',
									 fontsize:14,
									 fontweight:600
								 },
								 start_scale:0,
								 end_scale:4000,
								 scale_space:500
							},{
								 position:'bottom',	
								 label:{
									 color:'#506673',
									 fontweight:600
								 },
								 labels:labels
							}]
						}
					});
				
				chart2.draw();
	//2D环形图
		var data3 = [
			        	{name : 'A',value : 25,color:'#ebeff0'},
			        	{name : 'B',value : 40,color:'#d7e2e4'},
			        	{name : 'C',value : 20,color:'#dfe9eb'},
			        	{name : 'D',value : 15,color:'#f1f7f8'}
		        	];
	    	
			var chart3 = new iChart.Donut2D({
				render : 'canvasDiv3',
				center:{
					text:'25%',
					shadow:true,
					fontsize:50,
					shadow_offsetx:0,
					shadow_offsety:2,
					shadow_blur:2,
					shadow_color:'#b7b7b7',
					color:'#6f6f6f'
				},
				data: data3,
				shadow:true,
				shadow_offsetx:0,
				shadow_offsety:2,
				shadow_blur:10,
				shadow_color:'#676767',
				gradient:true,//开启渐变背景
				color_factor:0.25,//渐变因子
				gradient_mode:'LinearGradientDownUp',//渐变模式
				background_color:'#c5d3d4',
				separate_angle:4,//分离角度
				increment:10,//弹出距离
				sub_option:{
					gradient:true,
					color_factor:0.08,
					gradient_mode:'RadialGradientInOut',
					label:false
				},
				showpercent:true,
				decimalsnum:2,
				width : 800,
				height : 400,
				radius:140
			});
					
			chart3.bound(0);
	//3D饼图
	var data4 = [
				        	{name : 'WinXP',value : 48.34,color:'#666'},
				        	{name : 'Win7',value : 26.83,color:'#3F5C71'},
				        	{name : 'Other',value : 20.83,color:'#a6bfd2'}
			        	];
				
				var chart4 = new iChart.Pie3D({
					render : 'canvasDiv4',
					title:{
						text:'中国地区2012年08月份操作系统分布情况',
						color:'#e0e5e8',
						height:40,
						border:{
							enable:true,
							width:[0,0,2,0],
							color:'#343b3e'
						}
					},
					padding:'2 10',
					footnote:{
						text:'StatCounter Global Stats,design by ichartjs',
						color:'#e0e5e8',
						height:30,
						border:{
							enable:true,
							width:[2,0,0,0],
							color:'#343b3e'
						}
					},
					width : 800,
					height : 400,
					data:data4,
					shadow:true,
					shadow_color:'#15353a',
					shadow_blur:8,
					background_color : '#3b4346',
					gradient:true,
					color_factor:0.28,
					gradient_mode:'RadialGradientOutIn',
					showpercent:true,
					decimalsnum:2,
					legend:{
						enable:true,
						padding:30,
						color:'#e0e5e8',
						border:{
							width:[0,0,0,2],
							color:'#343b3e'
						},
						background_color : null,
					},
					sub_option:{
						border:{
							enable:false
						},
						label : {
							background_color:'#fefefe',
							sign:false,//设置禁用label的小图标
							line_height:10,
							padding:4,
							border:{
								enable:true,
								radius : 4,//圆角设置
								color:'#e0e5e8'
							},
							fontsize:11,
							fontweight:600,
							color : '#444444'
						},
						listeners:{
							parseText:function(d, t){
								return d.get('value')+"%";
							}
						}
					},
					border:{
						width:[0,20,0,20],
						color:'#1e2223'
					}
				});
				chart4.bound(0);
	});
	</script>
	<div id='canvasDiv4'></div><div id='canvasDiv0'></div><div id='canvasDiv1'></div>
	<div id='canvasDiv2'></div><div id='canvasDiv3'></div>