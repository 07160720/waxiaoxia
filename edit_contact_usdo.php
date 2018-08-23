<?php
  require_once 'base.php';
?>
<?php
header("Content-type:text/html;charset=utf-8");
require_once 'conn.php';

$content = $_POST['content'];

$sql = "UPDATE `waxiaoxia_contact` SET `content`='$content'";

$result = mysql_query($sql);

if ($result) {
	echo "保存成功！！！";
}
else{
	echo "保存失败！！！";
}
?>