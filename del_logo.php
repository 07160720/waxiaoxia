<?php
  require_once 'base.php';
?>
<?php
  require_once 'conn.php';
  // 提取id
  $id = $_GET['id'];
  if($id){
    // 查询对应id的列
    $sqli = "select * from waxiaoxia_logo where id=$id";
    $ress = mysql_query($sqli);
    $row=mysql_fetch_array($ress);
    
    // 删除对应id的列
    $sql = "DELETE FROM `waxiaoxia_logo` WHERE id = $id"; 

    // 执行sql语句
    $res = mysql_query($sql);
    
    // 删除数据库里的图片路径同时，删除文件夹下对应的图片
    $del=unlink($row['pic']);
  }
  // if进行判断
  if ($res) {
    
  	   header('location:logo_check.php'); 
  }
  else{
  	   header('location:logo_check.php'); 
  }

?>
