<?php
  require_once 'base.php';
?>
<?php
  require_once 'conn.php';
  // 提取id
  $id = $_POST['id'];

  // 删除对应id的列
  $sql = "DELETE FROM `waxiaoxia_column` WHERE id = $id"; 

  // 执行sql语句
  $res = mysql_query($sql);

  // if进行判断
  if ($res) {
  	  echo "删除成功！！！";
  }
  else{
  	  echo "删除失败！！！"; 
  }

?>
