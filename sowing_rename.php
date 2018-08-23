<?php
  require_once 'base.php';
?>
<?php 
 require_once 'conn.php';
 // ajax 获取的值

 $id = $_POST['id'];
 
 $title1 = $_POST['title1'];

 $title2 = $_POST['title2'];

 $sql = "UPDATE `waxiaoxia_sowing_map` SET `title1`='$title1',`title2`='$title2' WHERE id = $id";

 $result = mysql_query($sql);

 if ($result) {
 	die('<script>window.location="sowing_map.php";</script>');
 }
 else{
   	die('<script>alert("修改成功！");window.location="sowing_map.php";</script>');
 }

?>