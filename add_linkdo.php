<?php
  require_once 'base.php';
?>
<?php 
   require_once 'conn.php';
   // 提取ajax提交过来的数据
   $web_name = $_POST['web_name'];
   $web_address = $_POST['web_address'];
  
   $sql = "INSERT INTO `waxiaoxia_link`(`web_name`, `web_address`) VALUES ('$web_name','$web_address')";

   $result = mysql_query($sql);

   if ($result) {
        echo "添加成功！！！";
   }
   else{
   	  echo "添加失败！！！";
   }

   

?>
