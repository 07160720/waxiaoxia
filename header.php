<?php 
error_reporting(0); 
require_once 'conn.php';
$sql1 = "select name from waxiaoxia_column where id = 1";
$sql2 = "select name from waxiaoxia_column where id = 2";
$sql3 = "select name from waxiaoxia_column where id = 3";
$sql4 = "select name from waxiaoxia_column where id = 4";
$sql5 = "select name from waxiaoxia_column where id = 5";
$sql6 = "select name from waxiaoxia_column where id = 6";
$result1 = mysql_query($sql1);
$result2 = mysql_query($sql2);
$result3 = mysql_query($sql3);
$result4 = mysql_query($sql4);
$result5 = mysql_query($sql5);
$result6 = mysql_query($sql6);
$row1 = mysql_fetch_array($result1);
$row2 = mysql_fetch_array($result2);
$row3 = mysql_fetch_array($result3);
$row4 = mysql_fetch_array($result4);
$row5 = mysql_fetch_array($result5);
$row6 = mysql_fetch_array($result6);

$sql = "select * from waxiaoxia_logo";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
?>
  <div id="menu-bg">
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-default" role="navigation">
         <div class="container-fluid">
           <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target="#example-navbar-collapse">
            <span class="sr-only">切换导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="http://localhost/waxiaoxia/<?php echo $row['pic'];?>" class="logo" alt="蛙小侠">
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
           <li class="active"><a href="index.php"><?php echo $row1['name'];?></a></li>
           <li><a href="about.php"><?php echo $row2['name'];?></a></li>
           <li><a href="news.php"><?php echo $row3['name'];?></a></li>
           <li><a href="cases.php"><?php echo $row4['name'];?></a></li>
           <li><a href="products.php"><?php echo $row5['name'];?></a></li>
           <li><a href="contact.php"><?php echo $row6['name'];?></a></li>
         </ul>
       </div>
     </div>
   </nav>
 </div>
</div>
</div>