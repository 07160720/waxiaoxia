<?php
  require_once 'base.php';
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

body{margin:0;padding:0;font-size: 13px;}
ul,li,dl,dd,dt,p{margin:0;padding:0;}
ul,li{list-style:none;}
/* 当月统计 */
.month-sum{margin-top: 40px;padding:0 20px;}
.month-sum span{font-size: 15px;font-weight: bold;text-decoration: underline;}
/*柱状图样式*/
.histogram-container{position:relative;margin:80px auto 50px; width:800px;padding: 0 10px;}
.histogram-bg-line{border:#666 solid;border-width:0 0 1px 1px;overflow:hidden;width:670px;padding-top: 20px}
.histogram-bg-line ul{overflow:hidden;border:#eee solid;border-width:1px 0 0 0;width: 650px;}
.histogram-bg-line li{float:left;width:130px;/*根据.histogram-bg-line下的ul里面li标签的个数来控制比例*/overflow:hidden;}
.histogram-bg-line li div{border-right:1px #eee solid;}

.histogram-content{position:absolute;left:10px;top:0px;width:650px;height:270px;}
.histogram-content ul{height:100%;}
.histogram-content li{float:left;height:100%;width:20%;/*根据直方图的个数来控制这个width比例*/text-align:center;position:relative;}

.histogram-content .histogram-box{position:relative;display:inline-block;height:100%;width:30px;}
.histogram-content li a{position:absolute;bottom:0;right:0;display:block;width:30px;}
.histogram-content li a .sum{position:absolute;display:inline-block;top:-30px;left:5px;color: #FF4500; font-weight: bold;}/* 统计数量 */
.histogram-content li .name{position:absolute;bottom:-25px;left:0px;white-space:nowrap;display:inline-block;width:100%;font-size:13px;}

.histogram-y{position:absolute;left:-60px;top:-37px;font:12px/1.8 verdana,arial;}
.histogram-y li{text-align:right;width:55px;padding-right:5px;color:#333;}
.histogram-bg-line li div,.histogram-y li{height:49px;/*控制单元格的高度及百分比的高度，使百分数与线条对齐*/}

.des{width: 300px;margin: auto;margin-bottom: 50px;color: #666666;}/* 图标描述 */

#select{display: none;}/*上下页的控制*/
.paging input[type="text"]{display: none;}
</style>

</head>

<body>
<div class="month-sum">本月留言数据总数：<span>0</span> 条</div>
<div class="histogram-container" id="histogram-container">
    <!--背景方格-->
    <div class="histogram-bg-line">
        <ul>
            <li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li>
        </ul>
       <ul>
            <li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li>
        </ul>
        <ul>
            <li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li>
        </ul>
        <ul>
            <li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li>
        </ul>
        <ul>
            <li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li>
        </ul>
    </div>
    <!--柱状条-->
    <div class="histogram-content">
        <ul>
        </br><font color='#FF0000'>&nbsp;&nbsp;&nbsp;&nbsp;暂无相关数据</font>        </ul>
    </div>
    
    <!--百分比 y轴-->
    <div class="histogram-y">
        <ul>
           	<li>(数量/条)</li>
            <li>25</li>
            <li>20</li>
            <li>15</li>
            <li>10</li>
            <li>5</li>
            <li>0</li>
             
        </ul>
    </div>
</div>
<div class="des">每日留言数据统计条形图</div>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <style type="text/css">
        #select{}
        #select input{vertical-align: middle;margin: 0;}
        #select span{vertical-align: middle;margin: 0;padding: 0;}
        .paging{text-align: center;margin-top: 20px;margin-bottom:40px;color: #555555;font-size: 13px;}
        .paging a{display: inline-block;text-align: center;text-decoration: none;color: #555555;border:1px solid #CCCCCC;padding:2px 8px 2px 8px;}
        .paging a.current{border:1px solid #008080;background: #80BDCB;}
        .paging a:hover{background:#80BDCB;border:1px solid #008080;}
        .paging input[type="text"]{text-align: center;height: 12px;}
        
    </style>
</head>
<body >

    <p id="select">
        &nbsp;<span>全选</span>
        <input type="checkbox"  onclick="selectAll(this, 'checkboxes')" />&nbsp;
        <input type="submit" id="btnSubmit" disabled="true" value="删除选中项" />
        <input type="hidden" name="act" value="deleteAll" />
    </p>
    
	<div class="paging" >
            
            <span>共0条</span>
            <a href="/templates/message_chart.php?page=1&&search_cat=&&keyword=" target="main-frame"> 首页</a>
            <a href="/templates/message_chart.php?page=0&&search_cat=&&keyword=" target="main-frame"> 上一页</a>&nbsp;<a href="/templates/message_chart.php?page=2&&search_cat=&&keyword=" target="main-frame">下一页</a>   
            <a href="/templates/message_chart.php?page=0&&search_cat=&&keyword=" target="main-frame">尾页 </a>
      	
           	<span id="pageSum" sum="0">共0页, 到第</span>
            <input type="text" id="toPage" value="1" size="1" />
           	页
            <input type="button" value="确定" onclick="goPage()"/>
        
    </div></body>
</html><script type="text/javascript">
  function goPage(value){
	window.location.href="?page="+value;
  }
  
</script>
</body>