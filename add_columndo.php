<?php
  require_once 'base.php';
?>
<?php
   require_once 'conn.php';
   // 获取ajax 的值
   $name = $_POST['name'];

   $cid = $_POST['cid'];

   $catalog = $_POST['catalog'];

   $link = $_POST['link'];

   $porder = $_POST['porder'];

   $template = $_POST['template'];

   $model = $_POST['model'];

   $target = $_POST['target'];

   $display = $_POST['display'];

   $sql = "INSERT INTO `waxiaoxia_column`(`name`, `porder`, `model`, `cid`, `catalog`, `link`, `template`,`target`,`display`) VALUES ('$name','$porder','$model','$cid','$catalog','$link','$template','$target','$display')";

   $result = mysql_query($sql);
   
   if ($result) {
   	  echo "添加成功！！！";
   }
   else{
   	  echo "添加失败！！！";
   }
?>