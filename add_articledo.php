<?php
  require_once 'base.php';
?>
<?php 
 require_once 'conn.php';
 // ajax 获取的值
 $title = $_POST['title'];

 $date = $_POST['newstime'];

 $keywords = $_POST['keywords'];

 $description = $_POST['description'];

 date_default_timezone_set("Asia/Shanghai");
 $newstime=date("Y-m-d H:i:s",time());

 $content = $_POST['content'];

 $column1 = $_POST['column1'];

 $sql = "INSERT INTO `waxiaoxia_article`(`title`, `date`,`newstime`, `keywords`, `description`, `content`, `column1`) VALUES ('$title','$date','$newstime','$keywords','$description','$content','$column1')";

 $result = mysql_query($sql);

 if ($result) {
 	echo '添加成功！';
 }
 else{
    echo '添加失败！';
 }

?>