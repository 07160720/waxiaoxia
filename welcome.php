<?php
  require_once 'base.php';
?>
<?php 
  require_once 'conn.php';

 // 新闻动态统计
 $sql_message = "SELECT count(*) FROM `waxiaoxia_message`";

 $result_message = mysql_query($sql_message);

 if($result_message){
   $num_message = mysql_fetch_row($result_message);
      $sum_message =  $num_message[0];
 }

 // 新闻动态统计
 $sql_news = "SELECT count(*) FROM `waxiaoxia_article` WHERE column1 = 3";

 $result_news = mysql_query($sql_news);

 if($result_news){
   $num_news = mysql_fetch_row($result_news);
      $sum_news =  $num_news[0];
 }

 // 成功案例统计
 $sql_cases = "SELECT count(*) FROM `waxiaoxia_article` WHERE column1 = 4";

 $result_cases = mysql_query($sql_cases);

 if($result_cases){
   $num_cases = mysql_fetch_row($result_cases);
      $sum_cases =  $num_cases[0];
 }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.0</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
    </head>
    <body>
    <div class="x-body layui-anim layui-anim-up">
        <blockquote class="layui-elem-quote">欢迎登录：
            <span class="x-red">管理员</span>！当前时间：<?php date_default_timezone_set("Asia/Shanghai");
            echo date("Y-m-d H:i:s",time());?></blockquote>
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>新闻动态</h3>
                                                <p>
                                                    <cite><?php echo $sum_news;?></cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>留言数</h3>
                                                <p>
                                                    <cite><?php echo $sum_message;?></cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>成功案例</h3>
                                                <p>
                                                    <cite><?php echo $sum_cases;?></cite></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </body>
</html>