<?php
  require_once 'base.php';
?>
<?php
require_once 'conn.php';
date_default_timezone_set("PRC");

$file_type = $_FILES["upfile"]["type"];
$file_name = $_FILES["upfile"]["name"];

if (empty($file_name = $_FILES["upfile"]["name"])) {
	die('<script>alert("请上传图片！");window.location="img_check.php";</script>'); 
}

if ((($file_type == "image/gif")
	|| ($file_type == "image/jpeg")
	|| ($file_type == "image/pjpeg")
	|| ($file_type == "image/jpg")
	|| ($file_type == "image/png"))
	&& ($_FILES["upfile"]["size"] < 1000000))
{
	if(!is_dir("upload/". date("md") . "/"))
	{
		mkdir("upload/". date("md") . "/");
	}
	if (file_exists("upload/" . date("md") . "/" . $file_name))
	{

		die('<script>alert("图片已存在，请重新选择别的图片！");window.location="img_check.php";</script>');
	}
	else
	{
		$url = "upload/" . date("md") . "/" .$file_name;
		move_uploaded_file($_FILES["upfile"]["tmp_name"],
			"upload/" . date("md") . "/" . $file_name);
	}
}
else
{
	   die('<script>alert("图片格式不对! ");window.location="img_check.php";</script>');
}

if($url){

	$sql = "INSERT INTO `waxiaoxia_imgs`(`pic`,`name`) VALUES ('$url','$file_name')";

	$query = mysql_query($sql);

	if($query){
		die('<script>alert("图片上传成功");window.location="img_check.php";</script>');
	}
	else{
		die('<script>alert("图片上传失败");window.location="img_check.php";</script>');
	}
}
?>