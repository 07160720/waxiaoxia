<?php
  require_once 'base.php';
?>
<?php
  require_once 'conn.php';
  // 提取id
  $id = $_GET['id'];

  // 删除对应id的列
  $sql = "DELETE FROM `waxiaoxia_admin` WHERE id = $id"; 

  // 执行sql语句
  $res = mysql_query($sql);

  // if进行判断
  if ($res) {
  	   header('location:user_check.php'); 
  }
  else{
  	   header('location:user_check.php'); 
  }

?>
