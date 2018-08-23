<?php
require_once 'conn.php';

$id = $_GET['id'];

$sql_head = "select * from waxiaoxia_article where id = $id";

$result_head = mysql_query($sql_head);

$row_head = mysql_fetch_array($result_head);
?>

<?php
 require_once('page.class.php'); //分页类
 $id = $_GET['id'];
 $showrow = 1; //一页显示的行数
 $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
 $url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
 //省略了链接mysql的代码，测试时自行添加
 $sql = "SELECT * FROM waxiaoxia_article";
 $total = @mysql_num_rows(mysql_query($sql)); //记录总条数
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
  <meta name="Keywords" content="<?php echo $row_head['keywords'];?>" />
  <meta name="Description" content="<?php echo $row_head['description'];?>" />
  <title><?php echo $row_head['title'];?></title>
  <link rel="icon" href="asset/images/index.jpg" type="image/x-ico">
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/css/main.css">
  <link rel="stylesheet" href="asset/css/animate.css">
  <link rel="stylesheet" href="asset/css/css/index.css">
</head>
<body>
  <!-- 头部 开始-->
  <?php 
    require_once 'header.php';
    // 获取信息 
    $id = $_GET['id'];

    $sqli = "SELECT * FROM `waxiaoxia_article` WHERE id = $id and column1 = 3"; // 查询语句

    $resulti = mysql_query($sqli);

    $rowi = mysql_fetch_array($resulti);
  ?>
  <!-- 头部 end-->

  <!-- 面包屑导航 开始-->
  <div class="below-bread">
    <img src="asset/images\banner_common.jpg" alt="图片">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb">
            当前位置 : <a href="index.php">首页 </a> > <a href="news.php">新闻动态 > </a><?php echo $rowi['title'];?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 面包屑导航 end-->

  <?php
          require_once 'conn.php';
                    //上一篇文章 

                    $id = $_GET['id'];

                    $sqlQ = "select * from waxiaoxia_article where id < $id and column1 = 3 order by id desc limit 0,1";
                    // 查询数据获取id的最小值
                    $Sqlmin="select id from waxiaoxia_article where id=(select min(id) from waxiaoxia_article) and column1 = 3";

                    $resultmin = mysql_query($Sqlmin);

                    $rowQ  = mysql_fetch_assoc($resultmin);
                    
                    $resultQ = mysql_query($sqlQ) or die('错误：'.mysql_error());

                    $rsQ = mysql_fetch_object($resultQ);  

                    //下一篇文章 
                    $sqlH = "select * from waxiaoxia_article where id > $id and column1 = 3 order by id asc limit 0,1"; 
                    
                    // 查询数据获取id的最大值
                    $Sqlmax="select id from waxiaoxia_article where id=(select max(id) from waxiaoxia_article) and column1 = 3";

                    $resultmax = mysql_query($Sqlmax);

                    $rowH  = mysql_fetch_assoc($resultmax);

                    $resultH = mysql_query($sqlH) or die('错误：'.mysql_error());

                    $rsH = mysql_fetch_object($resultH);
    ?>
  <!-- 主体部分开始 -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="just-div">
          <h3><?php echo $rowi['title'];?></h3>
          <div class="data-set">日期：<span><?php echo $rowi['newstime'];?>&nbsp;&nbsp;&nbsp;</span>点击：<span><?php echo $rowi['click'];?></span></div>
          <div><?php echo $rowi['content'];?></div>
          <div class="page-turning">
          <?php 
          if (@$rsQ->id != '') { 
             echo "<li>上一篇：<a href='news-all.php?id=$rsQ->id'>$rsQ->title</a></li>";
          }else{
             echo "上一篇：没有了";
          }
          if (@$rsH->id != '') {
             echo "<li>下一篇：<a href='news-all.php?id=$rsH->id'>$rsH->title</a></li>";
          }else{
             echo "下一篇：没有了";
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php

  $id = $_GET['id'];

  $sql = "UPDATE waxiaoxia_article SET click = click+1 WHERE id = $id";//记录访问量

  mysql_query($sql);             
  ?>
  <!-- 主体部分开始 end-->

  <?php 
  require_once 'footer.php';
  ?>
  <script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="asset/js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>

  <?php mysql_close($link);?>
</body>
</html>
