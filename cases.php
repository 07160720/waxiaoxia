<?php
require_once 'conn.php';

$sql_head = "select * from waxiaoxia_config_system";

$result_head = mysql_query($sql_head);

$row_head = mysql_fetch_array($result_head);
?>
<?php 
 require_once 'conn.php';
 require_once('page.class.php'); //分页类
 $showrow = 5; //一页显示的行数
 $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
 $url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
 //省略了链接mysql的代码，测试时自行添加
 $sql = "SELECT * FROM waxiaoxia_article where column1 = 4 ORDER BY date DESC";
 $total = mysql_num_rows(mysql_query($sql)); //记录总条数
 if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
 //获取数据
 $sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";

 $resulti = mysql_query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="author" content="Li kunlin" />
  <title>成功案例_<?php echo $row_head['cfg_webname'] ?></title>
  <meta name="keywords" content="<?php echo $row_head['cfg_keywords'];?>"/>
  <meta name="description" content="<?php echo $row_head['cfg_description']; ?>" />
  <link rel="icon" href="asset/images/index.jpg" type="image/x-ico">
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/css/main.css">
  <link rel="stylesheet" href="asset/css/animate.css">
  <link rel="stylesheet" href="asset/css/css/index.css">
  <style type="text/css">
            p{margin:0}
            #page{
                height:40px;
                line-height: 40px;
                padding:20px 0px;
                width: 400px;
                margin: 0 auto;
            }

            #page a{
                display:block;
                float:left;
                margin-right:10px;
                padding:2px 12px;
                height:30px;
                border:1px #cccccc solid;
                border-radius:50%;
                background-color:#fcfcfc;
                text-decoration:none;
                color:#808080;
                font-size:12px;
                line-height:24px;
            }
            #page a:hover{
                border:none;
                background:#0066FF;
                color:#fff;
            }
            #page a.cur{
                border:none;
                background:#0066FF;
                color:#fff;
            }
            #page p{
                float:left;
                padding:2px 12px;
                font-size:12px;
                height:24px;
                line-height:20px;
                color:#bbb;
                border:1px #ccc solid;
                border-radius:50%;
                background:#fcfcfc;/* 白色*/
                margin-right:8px;
            }
            #page p.pageRemark{
                border-style:none;
                background:none;
                margin-right:0px;
                padding:4px 0px;
                color:#666;
            }
            #page p.pageRemark b{
                color:red;
            }
            #page p.pageEllipsis{
                border-style:none;
                background:none;
                padding:4px 0px;
                color:#808080;
            }
            .dates li {font-size: 14px;margin:20px 0}
            .dates li span{float:right}
        </style>
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
            当前位置 : <a href="index.php">首页 > </a>成功案例
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 面包屑导航 end-->

  <!-- 主体部分开始 -->
  <div class="container">
    <div class="row">
      <?php while($rowi = mysql_fetch_array($resulti)){ ?>
      <div class="col-md-12 col-xs-12 wow fadeInUp"  data-wow-duration="1s" data-wow-delay="0s">
        <div class="news just-test-div">
          <h4><a href="cases-all.php?id=<?php echo $rowi['id'];?>" target="_blank"><?php echo $rowi['title'];?></a></h4>
          <div class="data-set"><?php echo $rowi['date'];?></div>
          <p><?php echo $rowi['description'];?></p>
        </div>
      </div>
      <?php } ?>
    </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <!-- 分页 -->
          <?php
           if ($total > $showrow) {//总记录数大于每页显示数，显示分页
           $page = new page($total, $showrow, $curpage, $url, 2);
           echo $page->myde_write();
           }
          ?>
        <!-- 分页 -->
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
  <script>
    new WOW().init();
  </script>
</body>
</html>
