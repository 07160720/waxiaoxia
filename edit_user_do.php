<?php
  require_once 'base.php';
?>
<?php
header("Content-type:text/html;charset=utf-8");
require_once 'conn.php';

$id = $_POST['id'];

$username = $_POST['add_name'];

$password = md5($_POST['add_password']);

$identity = $_POST['identity'];

$sql = "UPDATE `waxiaoxia_admin` SET `username`='$username',`password`='$password',`identity`='$identity' WHERE id = $id";

$result = mysql_query($sql);

if ($result) {
	  echo "修改成功！！！";
}
else{
      echo "修改失败！！！";
}
?>