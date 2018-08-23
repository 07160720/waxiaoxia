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
  <meta name="keywords" content="<?php echo $row_head['cfg_keywords'];?>"/>
  <meta name="description" content="<?php echo $row_head['cfg_description']; ?>" />
  <title><?php echo $row_head['cfg_index_title'] ?></title>
  <link rel="icon" href="asset/images\index.jpg" type="image/x-ico">
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/css/animate.css">
  <link rel="stylesheet" href="asset/css/main.css">
  <link rel="stylesheet" href="asset/css/animate.css">
</head>
<body>
  <!-- 头部引入 -->
  <?php 
    require_once 'header.php';
    require_once('page.class.php'); //分页类
  ?>
  <!-- /头部引入 -->

  <div id="myCarousel" class="carousel slide">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- 轮播（Carousel）项目 -->


    <?php 
    require_once 'conn.php';
    // 获取sql中最小的id
    $sqlmin="select id from waxiaoxia_sowing_map where id=(select min(id) from waxiaoxia_sowing_map)";
    $resultmin = mysql_query($sqlmin);
    $rowQ  = mysql_fetch_assoc($resultmin); 
    $id_min = $rowQ['id']; // 获取sql 中最小值
    $sql_sowing_map = "select * from waxiaoxia_sowing_map where id = $id_min";
    $require_sowing_map = mysql_query($sql_sowing_map);
    $row_sowing_map = mysql_fetch_array($require_sowing_map);
    ?>
    <div class="carousel-inner">
        <div class="item active">
            <img class="img-responsive center-block" src="http://localhost/waxiaoxia/<?php echo $row_sowing_map['pic'];?>" alt="First slide">
        <div class="carousel-caption">
          <h1 class="wow bounceInLeft"  data-wow-duration="2s"><?php echo  $row_sowing_map['title1'];?></h1>
          <h2 class="wow bounceInRight"  data-wow-duration="2s"><?php echo  $row_sowing_map['title2'];?></h2>
        </div>
        </div>
        <?php
        $sql_sowing = "select * from waxiaoxia_sowing_map limit 1,2";
        $require_sowing = mysql_query($sql_sowing);
        while($row_sowing = mysql_fetch_array($require_sowing)){
        ?> 
        <div class="item">
          <img class="img-responsive center-block" src="http://localhost/waxiaoxia/<?php echo $row_sowing['pic'];?>" alt="Second slide">
          <div class="carousel-caption">
            <h1 class="wow bounceInLeft"  data-wow-duration="2s"><?php echo  $row_sowing['title1'];?></h1>
            <h2 class="wow bounceInRight"  data-wow-duration="2s"><?php echo  $row_sowing['title2'];?></h2>
          </div>
        </div>
        <?php }?>  
    </div>
    <!-- 轮播（Carousel）导航 -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" ></span>
            <span class="sr-only">Next</span>
      </a>
  </div>

  <?php 
     require_once 'header.php';
     require_once 'conn.php';
     $sql_p = "SELECT * FROM `waxiaoxia_product` limit 0,4";
     $result_p = mysql_query($sql_p);
  ?>

  <div id="product" class="container">
    <div class="row">
      <div class=" col-md-12 col-xs-12">
        <h1 class="title-top">蛙小侠美食</h1>
      </div>
    </div>
    <div class="row">
      <?php while($rows_p = mysql_fetch_array($result_p)){?>
      <div class="col-md-3 col-xs-6">
        <div class="product-show">
          <img class="wow bounceInLeft" data-wow-duration="1s" data-wow-delay="0.5s" src="http://localhost/waxiaoxia/<?php echo $rows_p['pic'];?>" alt="<?php echo $rows_p['name'];?>">
          <h3 class="product-name"><?php echo $rows_p['name'];?></h3>
        </div>
      </div>
     <?php }?> 
    </div>
  </div>

  <div id="advantage">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-xs-12">
          <div class="pad-50">
            <h4>产品多-四季无忧</h4>
            <p>N系列，数十种单品，主打时尚牛蛙，辅以各种金牌美食、小吃自由搭配、口味多样、新品不断，引领时尚，火爆四季！</p>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="pad-50">
            <h4>快速开店</h4>
            <p>全自动微电脑操作，无论有无经验，5天学会，7天开店！让经营更灵活，还具有丰厚的管理和运营经验的专业顾问团队加以辅导！</p>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="pad-50">
            <h4>货源保证</h4>
            <p>拥有大型的原料生产基地，原材料质量和供应有保障，经营成本低，品质更稳定保障，在原料价格上占有绝对的优势，长期更优惠！ </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <h1 class="title-big">一份投资 多店模式<br/>
            不只比别人多几条财路而已
        </h1>
      </div>
    </div>
  </div>

  <div id="about" class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
          <h1 class="title-top">蛙小侠总部</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <div class="pad-20">
         <p>
           <?php 
           $sql_a = "select * from waxiaoxia_about";
           $result_a = mysql_query($sql_a);
           $row_a = mysql_fetch_array($result_a);
           echo $row_a['content'];
           $sql_imgs = "select * from waxiaoxia_imgs where name = 'about_us.jpg'";
           $result_imgs = mysql_query($sql_imgs);
           $row_imgs = mysql_fetch_array($result_imgs);
           ?>
         </p> 
        </div>
      </div>
      <div class="col-md-6 col-xs-12">
          <div class="pad-20">
            <img src="http://localhost/waxiaoxia/<?php echo $row_imgs['pic']?>" alt="蛙小侠">
          </div>
      </div>
    </div>
  </div>

  <div id="parallax">
    <div class="parallax-bg"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-xs-12">
          <div class="pad-20">
            <strong>800+</strong>
            <p>加盟门店 </p>
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <div class="pad-20">
            <strong>400+</strong>
            <p>日均售出  </p>
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <div class="pad-20">
            <strong>100+</strong>
            <p>产品系列 </p>
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <div class="pad-20">
            <strong>68888+</strong>
            <p>投资成本  </p>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- 新闻动态 -->
<?php 
 $showrow = 3; //一页显示的行数
 $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
 $url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
 //省略了链接mysql的代码，测试时自行添加
 $sql = "SELECT * FROM waxiaoxia_article where column1 = 3 ORDER BY date DESC";
 $total = mysql_num_rows(mysql_query($sql)); //记录总条数
 if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
 //获取数据
 $sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
 $result_news = mysql_query($sql);
?>

  <div id="news" class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
          <h1 class="title-top">新闻动态</h1>
      </div>
    </div>
    <div class="row">
      <?php while ($rows_news = mysql_fetch_array($result_news)) {?>
      <div class="col-md-4 col-xs-12">
        <div class="pad-20">
          <h4><a href="news-all.php?id=<?php echo $rows_news['id'];?>" target="_blank"><?php echo $rows_news['title'];?></a></h4>
          <div class="data-time"><?php echo $rows_news['date'];?></div>
          <p><?php echo $rows_news['description'];?></p>
        </div>
      </div>
      <?php }?> 
    </div>
  </div>
<!-- /新闻动态 -->

<!--  成功案例 -->
 <?php 
 $showrow = 3; //一页显示的行数
 $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
 $url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
 //省略了链接mysql的代码，测试时自行添加
 $sql = "SELECT * FROM waxiaoxia_article where column1 = 4 ORDER BY date DESC";
 $total = mysql_num_rows(mysql_query($sql)); //记录总条数
 if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
 //获取数据
 $sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
 $result_cases = mysql_query($sql);
?>
  <div id="case" class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
          <h1 class="title-top">成功案例</h1>
      </div>
    </div>
    <div class="row">
      <?php while ($rows_cases = mysql_fetch_array($result_cases)) {?>
      <div class="col-md-4 col-xs-12">
        <div class="pad-20">
          <h4><a href="cases-all.php?id=<?php echo $rows_cases['id'];?>" target="_blank"><?php echo $rows_cases['title'];?></a></h4>
          <p><?php echo $rows_cases['description'];?></p>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
<!--  /成功案例 -->
  <div id="message-Board" class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12 bor-blue">
          <div class="pad-20">
            <h3 class="message-top">浮华世界再慢一点！ 抢占商机再快一步！ </h1>
            <div class="col-md-6 col-sm-10 col-md-offset-3 col-sm-offset-1 col-xs-12">
              <p class="padtop-15">填写留言，将您的任何需要或对项目的疑问填到留言板内。留言成功后，我们会在24小时之内答复您，使您对项目及招商企业获得更多了解，留言将成为您成功投资的一个好开始！ </p>
            </div>
            <div class="col-md-6 col-sm-10 col-md-offset-3 col-sm-offset-1 col-xs-12 padbot-30">
              <form action="#" method="post" name="theForm" enctype="multipart/form-data" class="wow bounceInLeft"  data-wow-duration="2s" data-wow-delay="0s" onsubmit="return validate()">
                <div class="form-group">
                  <label>姓名/NAME</label>
                  <input class="form-control" type="text" id="name" name="name">
                </div>
                <div class="form-group">
                  <label>电话/PHONE</label>
                  <input class="form-control" type="tel" id="phone" name="phone">
                </div>
                <div class="form-group">
                  <label>留言/MESSAGE</label>
                  <textarea class="form-control" name="message" rows="5" id="message" ></textarea>
                </div>
                <button name="inputForm" class="btn btn-success btn-lg" type="button" id="submit">立即留言</button>
              </form>
            </div>
         </div>
        </div>
    </div>
  </div>

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
