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
  <title>蛙小侠总部_<?php echo $row_head['cfg_webname'] ?></title>
  <meta name="keywords" content="<?php echo $row_head['cfg_keywords'];?>"/>
  <meta name="description" content="<?php echo $row_head['cfg_description']; ?>" />
  <link rel="icon" href="asset/images/index.jpg" type="image/x-ico">
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/css/main.css">
  <link rel="stylesheet" href="asset/css/animate.css">
  <link rel="stylesheet" href="asset/css/css/index.css">
  <script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- 头部引入 -->
  <?php 
    require_once 'header.php';

    $sql_banner = "SELECT * FROM  `waxiaoxia_banner` where banner_name = 3";

    $result_banner = mysql_query($sql_banner);

    $row_banner = mysql_fetch_array($result_banner);

  ?>
  <!-- /头部引入 -->
  <div class="below-bread">
    <img src="http://localhost/waxiaoxia/<?php echo $row_banner['pic'];?>" alt="图片">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb">
            当前位置 : <a href="index.php">首页 > </a>蛙小侠总部
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php 
   require_once 'conn.php';
   $sql_a = "select * from waxiaoxia_about";
   $result_a = mysql_query($sql_a);
   $row_a = mysql_fetch_array($result_a);
  ?>

  <div class="container" id="headquarters">
    <div class="row">
      <div class="col-md-12">
        <div class="headquarters">
            <?php echo $row_a['content'];?>
        </div>
      </div>
    </div>
  </div>
  <!-- 脚部引入 -->
  <?php 
    require_once 'footer.php';
  ?>
  <!-- /脚部引入 -->
  <script src="asset/js/wow.min.js"></script>
</body>
</html>