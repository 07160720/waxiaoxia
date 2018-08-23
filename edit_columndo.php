<?php
  require_once 'base.php';
?>
<?php
   require_once 'conn.php';
   // 获取ajax 的值
   $id = $_POST['id'];

   $name = $_POST['name'];

   $cid = $_POST['cid'];

   $catalog = $_POST['catalog'];

   $link = $_POST['link'];

   $porder = $_POST['porder'];

   $template = $_POST['template'];

   $model = $_POST['model'];

   $display = $_POST['display'];

   $target = $_POST['target'];

   $sql = "UPDATE `waxiaoxia_column` SET `name`='$name',`porder`='$porder',`model`='$model',`cid`='$cid',`catalog`='$catalog',`link`='$link',`template`='$template',`display`='$display',`target`='$target' WHERE id = '$id' ";

   $result = mysql_query($sql);

   if ($result) {
   	  echo "修改成功！！！";
   }
   else{
   	  echo "修改失败！！！";
   }

?>