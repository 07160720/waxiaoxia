<?php
  require_once 'base.php';
?>
<?php
  require_once 'conn.php';
  // 提取id
  $id = $_GET['id'];

  // 删除对应id的列
  $sql = "DELETE FROM `waxiaoxia_link` WHERE id = $id"; 

  // 执行sql语句
  $res = mysql_query($sql);

  // if进行判断
  if ($res) {
  	   header('location:link_check.php'); 
  }
  else{
  	   header('location:link_check.php'); 
  }

?>
