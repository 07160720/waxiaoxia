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
  <title>加盟我们_<?php echo $row_head['cfg_webname'] ?></title>
  <meta name="keywords" content="<?php echo $row_head['cfg_keywords'];?>"/>
  <meta name="description" content="<?php echo $row_head['cfg_description']; ?>" />
  <link rel="icon" href="asset/images/index.jpg" type="image/x-ico" />
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/css/main.css">
  <link rel="stylesheet" href="asset/css/animate.css">
  <link rel="stylesheet" href="asset/css/css/index.css">
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

  <!-- 面包屑导航 开始-->
  <div class="below-bread">
    <img src="http://localhost/waxiaoxia/<?php echo $row_banner['pic'];?>" alt="图片">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb">
            当前位置 : <a href="index.php">首页 > </a>加盟我们
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 面包屑导航 end-->

  <!-- 主体部分开始 -->
  <div class="container contact-us">
    <div class="row">
      <div class="col-md-12 col-xs-12 wow fadeInUp"  data-wow-duration="1s" data-wow-delay="0s">
        <h4 class="desc">填写留言，将您的任何需要或对项目的疑问填到留言板内。留言成功后，我们会在24小时之内答复您，使您对项目及招商企业获得更多了解，留言将成为您成功投资的一个好开始！</h4>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <div class="just-text-div">
          <h3>蛙小侠加盟官网</h3>
          <p>公司：<?php echo $row_head['cfg_company'];?></p>
          <p>地址：<?php echo $row_head['cfg_address'];?></p>
        </div>
      </div>
      <div class="col-md-6 col-xs-12">
        <form action="#" method="post" name="theForm" enctype="multipart/form-data" class="wow bounceInLeft"  data-wow-duration="2s" data-wow-delay="0s" onsubmit="return validate()">
          <div class="form-group">
            <label>姓名/NAME</label>
            <input class="form-control" type="text" id="name" name="name" >
          </div>
          <div class="form-group">
            <label>电话/PHONE</label>
            <input class="form-control" type="tel" id="phone" name="phone"  >
          </div>
          <div class="form-group">
            <label>留言/MESSAGE</label>
            <textarea class="form-control" name="message" id="message" rows="5" ></textarea>
          </div>
          <button  name="inputForm" class="btn btn-success btn-lg" type="button" id="submit">立即留言</button>
        </form>
      </div>
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
  <script src="asset/js/wow.min.js"></script>
  <script src="asset/js/judge.js"></script>
  <script>
    new WOW().init();
    function validate(){
      var judges = new judge();
      judges.require("name","请输入您的姓名!");
      judges.require("phone","请输入您的手机号码!");
      judges.require("message","请输入留言内容!");

      return judges.warn() && judges.phone() && judges.submitOnce();
    }
  </script>

  <script>
	$("#submit").click(function(event){
           var message = $('#message').val();
           var phone = $('#phone').val();
           var name = $('#name').val();
           $.ajax({
           	type:'POST',
           	url:'messagedo.php',
           	data:{
           	  message:message,
           	  phone:phone,
           	  name:name,
           	},
           	success:function(data){
           		alert(data);
           		window.location.reload(); // 刷新窗口
           	 }
           });

     });

</script>
</body>
</html>
