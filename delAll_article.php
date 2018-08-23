<?php
  require_once 'base.php';
?>
<?php 
 header('content-type:text/html;charset=utf-8');

 require_once 'conn.php';

 $data=$_POST['data'];

 $_clean['data']=implode(',',$data); // 将字符串数组转化为整数

 $ids = $_clean['data'];// 例如：1,2,3,4

 $sql = "DELETE FROM  `waxiaoxia_article` WHERE id IN ($ids)";

 $result = mysql_query($sql);

 if ($result) {
 	echo "删除成功！";
 }
 else{
 	echo "删除失败！";
 }
?>