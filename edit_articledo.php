<?php
  require_once 'base.php';
?>
<?php 
 require_once 'conn.php';
 // ajax 获取的值

 $id = $_POST['id'];

 $title = $_POST['title'];

 $date = $_POST['date'];

 $keywords = $_POST['keywords'];

 $description = $_POST['description'];

 date_default_timezone_set("Asia/Shanghai");
 $newstime=date("Y-m-d H:i:s",time());

 $content = $_POST['content'];

 $column1 = $_POST['column1'];

 $sql = "UPDATE `waxiaoxia_article` SET `title`='$title',`date`='$date',`newstime`='$newstime',`keywords`='$keywords',`description`='$description',`content`='$content',`column1`='$column1' WHERE id = $id";

 $result = mysql_query($sql);

 if ($result) {
 	echo '修改成功！';
 }
 else{
    echo '修改失败！';
 }

?>