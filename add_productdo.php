<?php
  require_once 'base.php';
?>
<?php
require_once 'conn.php';
date_default_timezone_set("PRC");
$name = $_POST['name'];

$file_type = $_FILES["pic"]["type"];
$file_name = $_FILES["pic"]["name"];

if (empty($file_name = $_FILES["pic"]["name"])) {
	die('<script>alert("请上传图片！");window.location="product_check.php";</script>'); 
}
if ((($file_type == "image/gif")
	|| ($file_type == "image/jpeg")
	|| ($file_type == "image/pjpeg")
	|| ($file_type == "image/jpg")
	|| ($file_type == "image/bmp")
	|| ($file_type == "image/png"))
	&& ($_FILES["pic"]["size"] < 1000000))
{
	if(!is_dir("upload/". date("md") . "/"))
	{
		mkdir("upload/". date("md") . "/");
	}
	if (file_exists("upload/" . date("md") . "/" . $file_name))
	{

		die('<script>alert("图片已存在，请重新选择别的图片！");window.location="product_check.php";</script>');
	}
	else
	{
		$url = "upload/" . date("md") . "/" .$file_name;
		move_uploaded_file($_FILES["pic"]["tmp_name"],
			"upload/" . date("md") . "/" . $file_name);
	}
}
else
{
	   die('<script>alert("图片格式不对！*pjpeg *jpg *png *gif！");window.location="product_check.php";</script>');
}
if($url){

	$sql = "insert into waxiaoxia_product(pic,name) values('$url','$name')";
	$query = mysql_query($sql);
	if($query){
		die('<script>alert("保存成功");window.location="product_check.php";</script>');
	}
}
?>