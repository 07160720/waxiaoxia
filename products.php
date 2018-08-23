<?php
require_once 'conn.php';

$sql_head = "select * from waxiaoxia_config_system";

$result_head = mysql_query($sql_head);

$row_head = mysql_fetch_array($result_head);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="author" content="Li kunlin" />
  <title>蛙小侠美食_<?php echo $row_head['cfg_webname'] ?></title>
  <meta name="keywords" content="<?php echo $row_head['cfg_keywords'];?>"/>
  <meta name="description" content="<?php echo $row_head['cfg_description']; ?>" />
  <link rel="icon" href="asset/images\index.jpg" type="image/x-ico">
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/css/main.css">
  <link rel="stylesheet" href="asset/css/animate.css">
  <link rel="stylesheet" href="asset/css/css/index.css">
  <link rel="stylesheet" href="asset/css/prettyPhoto.css">
</head>
<body>
    <!-- 头部引入 -->
  <?php 
    require_once 'header.php';
    require_once 'conn.php';
    $sql_p = "select * from waxiaoxia_product";
    $result_p = mysql_query($sql_p);

    $sql_banner = "SELECT * FROM  `waxiaoxia_banner` where banner_name = 3";

    $result_banner = mysql_query($sql_banner);

    $row_banner = mysql_fetch_array($result_banner);
  ?>
  <!-- /头部引入 -->

  <!-- 面包屑导航 开始-->
  <div class="below-bread">
    <img src="http://www.naicasys.com.cn/waxiaoxia/<?php echo $row_banner['pic'];?>" alt="图片">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb">
            当前位置 : <a href="index.php">首页 > </a>蛙小侠美食
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 面包屑导航 end-->

  <!-- 主体部分开始 -->
  <div class="container">
    <div class="flex wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
      <?php while($rows_p = mysql_fetch_array($result_p)){?>
      <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6">
        <a href="http://www.naicasys.com.cn/waxiaoxia/<?php echo $rows_p['pic'];?>" rel="prettyPhoto" title="<?php echo $rows_p['name'];?>">
          <img src="http://www.naicasys.com.cn/waxiaoxia/<?php echo $rows_p['pic'];?>" class="img-responsive" alt="<?php echo $rows_p['name'];?>" />
        </a>
      </div>
      <?php }?>
    </div>
  </div>
  <!-- 主体部分开始 end-->
    <!-- 脚部引入 -->
  <?php 
    require_once 'footer.php';
  ?>
  <!-- /脚部引入 -->
  <script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="asset/js/jquery.prettyPhoto.js"></script>
  <script src="asset/js/wow.min.js"></script>
  <script>
    new WOW().init();      //滑动初始化
    $(document).ready(function(){        //图片框开启初始化
    $("a[rel^='prettyPhoto']").prettyPhoto();
  });
  </script>
</body>
</html>