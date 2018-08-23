    <?php 
    require_once 'conn.php';
    $sql = "select * from waxiaoxia_config_system";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    ?>
<!-- 底部开始 -->
<div class="footer">
	<div class="copyright" style="text-align: center;">© 2017-2018 <?php echo $row['cfg_company'];?> All rights reserved. <?php echo $row['cfg_icp'];?> Version.2.0</div>  
</div>
<!-- 底部结束 -->