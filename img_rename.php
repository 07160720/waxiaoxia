<?php
  require_once 'base.php';
?>
<?php 
 require_once 'conn.php';
 // ajax 获取的值
 $oldname = $_GET['oldname'];

 $newname = $_GET['newname'];

 $sql = "UPDATE `waxiaoxia_imgs` SET `name`='$newname' WHERE name = '$oldname'";

 $result = mysql_query($sql);

 if ($result) {
 	die('<script>window.location="img_check.php";</script>');
 }
 else{
   	die('<script>alert("修改失败！");window.location="img_check.php";</script>');
 }

?>