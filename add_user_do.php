<?php
  require_once 'base.php';
?>
<?php 
  header("Content-type:text/html;charset:utf-8");
  require_once 'conn.php';
  // 提取ajax提交过来的数据
  $identity = $_POST['identity'];

  $add_name = $_POST['add_name'];

  $add_password = md5($_POST['add_password']);

  $sql = "INSERT INTO `waxiaoxia_admin`(`username`, `password`, `identity`) VALUES ('$add_name','$add_password','$identity')";
  
  $result = mysql_query($sql);

  if ($result) {
  	echo "添加成功！！！";
  }
  else{
  	echo "添加失败！！！";
  }

?>