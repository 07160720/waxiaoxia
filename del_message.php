<?php
  require_once 'base.php';
?>
<?php 
 require_once 'conn.php';

 $id = $_POST['id'];

 $sql = "DELETE FROM `waxiaoxia_message` WHERE id = $id";

 $result = mysql_query($sql);

 if ($result) {
 	echo "删除成功！";
 }
 else{
 	echo "删除失败！";
 }


?>