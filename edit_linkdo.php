<?php
  require_once 'base.php';
?>
<?php 
   require_once 'conn.php';
   // 提取ajax提交过来的数据
   $id = $_POST['id'];
   $web_name = $_POST['web_name'];
   $web_address = $_POST['web_address'];
  
   $sql = "UPDATE `waxiaoxia_link` SET `web_name`='$web_name',`web_address`='$web_address' WHERE id = '$id' ";

   $result = mysql_query($sql);

   if ($result) {
      echo "修改成功！！！";
   }
   else{
   	  echo "修改失败！！！";
   }

?>
