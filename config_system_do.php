<?php
  require_once 'base.php';
?>
<?php 
   require_once 'conn.php';
   // 提取ajax提交过来的数据
   $web_name = $_POST['web_name'];
   $cfg_webname = $_POST['cfg_webname'];
   $cfg_index_title = $_POST['cfg_index_title'];
   $cfg_keywords = $_POST['cfg_keywords'];
   $cfg_description = $_POST['cfg_description'];
   $cfg_company = $_POST['cfg_company'];
   $cfg_address = $_POST['cfg_address'];
   $cfg_phone = $_POST['cfg_phone'];
   $cfg_icp = $_POST['cfg_icp'];
   $cfg_53kf = $_POST['cfg_53kf'];
  
   $sql = "UPDATE `waxiaoxia_config_system` SET `web_name`='$web_name',`cfg_webname`='$cfg_webname',`cfg_index_title`='$cfg_index_title',`cfg_keywords`='$cfg_keywords',`cfg_description`='$cfg_description',`cfg_company`='$cfg_company',`cfg_address`='$cfg_address',`cfg_phone`='$cfg_phone',`cfg_icp`='$cfg_icp',`cfg_53kf`='$cfg_53kf' WHERE id = 1";

   $result = mysql_query($sql);

   if ($result) {
      echo "保存成功！！！";
   }
   else{
   	  echo "保存失败！！！";
   }

   

?>
