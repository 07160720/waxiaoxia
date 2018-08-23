<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>蛙小侠后台管理</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/font.css">
	  <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up"">
        <p><a href="http://localhost/waxiaoxia" style="float: right; bottom: 20px; position: relative;">返回网站主页</a></p>
        <div class="message">蛙小侠后台管理登录</div>
        <div id="darkbannerwrap"></div>
        
        <form method="post" class="layui-form" >
            <input name="username" placeholder="用户名" id="username"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" id="password" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" id="submit" style="width:100%;" type="button">
            <hr class="hr20" >
        </form>
    </div>
    <script>
      $('#submit').on('click',function(){
       var username = $('#username').val();
       var password = $('#password').val();
       $.ajax({
         type:'post',
         url:"logindo.php",
         data:{
          username:username,
          password:password,
        },
        success:function(res){
          if (res==1) {
              layer.msg('登录成功', function(){
              location.href = "websystem.php";
          })
         }
         else{
                layer.msg('用户名或密码错误', function(){
                window.location.reload();
          })
         }
       }
     })
     })
    </script>
    <?php 
    require_once 'conn.php';
    $sql = "select * from waxiaoxia_config_system";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    ?>
    <div class="footer">
      <div class="copyright" style="text-align: center;">© 2017-2018 <?php echo $row['cfg_company'];?> All rights reserved. <?php echo $row['cfg_icp'];?> Version.2.0</div>  
    </div>
</body>
</html>