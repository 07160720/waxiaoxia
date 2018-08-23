  <?php 
  $sql = "select * from waxiaoxia_imgs where name = 'code.jpg'";
  $result = mysql_query($sql);
  $row = mysql_fetch_array($result);

  $sql_footer = "select * from waxiaoxia_config_system";

  $result_footer = mysql_query($sql_footer);

  $row_footer = mysql_fetch_array($result_footer);
  ?>

  <?php 
  $sql_link = "select * from waxiaoxia_link";

  $result_link = mysql_query($sql_link);
  ?>
  <div id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-2 col-lg-offset-1 col-xs-12">
          <div class="weixin">
            <img src="http://localhost/waxiaoxia/<?php echo $row['pic'];?>" alt="微信公众号">
          </div>
        </div>
        <div class="col-lg-8 col-md-10 col-lg-offset-1 col-xs-12">
          <div class="minelink">
            <h3>友情链接</h3>
            <?php while($rows_link = mysql_fetch_array($result_link)){?>
            <h5><a href="<?php echo $rows_link['web_address'];?>" target="_blank"><?php echo $rows_link['web_name'];?></a></h5>
            <?php }?>
          </div>
          <div class="minelink">
            <p><a href="index.php"><?php echo $row1['name'];?> |</a><a href="about.php">   <?php echo $row4['name'];?> |</a><a href="news.php">    <?php echo $row3['name'];?> |</a><a href="cases.php">    <?php echo $row4['name'];?> |</a><a href="products.php">   <?php echo $row5['name'];?> |</a><a href="contact.php">    <?php echo $row6['name'];?> |</a>
            </div>
            <div class="minelink">
              <h3>PHYSICAL LOCATION</h3>
              <h5>加盟热线：<?php echo $row_footer['cfg_phone']; ?></h5>
              <h5>地址：<?php echo $row_footer['cfg_address']; ?></h5>
              <h5>©2017-2018 蛙小侠全国总部版权所有</h5>
            </div>
          </div>
        </div> 
      </div>
    </div>