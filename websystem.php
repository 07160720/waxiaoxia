<?php
  require_once 'base.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>蛙小侠后台管理系统</title>
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/xadmin.css">
    <link href="favicon.ico" rel="shortcut icon">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/xadmin.js"></script>

</head>
<body>
   <?php
     require_once 'top.php'; // 顶部
     require_once 'left.php'; // 左部
     require_once 'right.php'; // 右部
     require_once 'foot.php'; // 脚部
   ?>
</body>
</html>