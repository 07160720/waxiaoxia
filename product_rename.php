<?php
  require_once 'base.php';
?>
<?php 
 require_once 'conn.php';
 // ajax 获取的值

 $id = $_POST['id'];
 
 $name = $_POST['name'];

 $sql = "UPDATE `waxiaoxia_product` SET `name`='$name' WHERE id = $id";

 $result = mysql_query($sql);

 if ($result) {
 	die('<script>window.location="product_check.php";</script>');
 }
 else{
   	die('<script>alert("修改成功！");window.location="product_check.php";</script>');
 }

?>