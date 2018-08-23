<?php
  require_once 'base.php';
?>
<?php 
require_once 'conn.php';
$sql = "select * from waxiaoxia_admin";
$res = mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/list.css" rel="stylesheet" type="text/css" />
</head>
<body >
<form  method="post" action="client.php" name="listForm" id="list-form" onsubmit="">
  <a href="add_user.php"><input type="button" value="增加用户" /></a>
    <div  id="list-div">
    <span style="color:#666;">*用户"1"只能发表文章，超级用户"2"可以查看留言，管理员"3"具有全部权限</span><br /><br />
    <table cellpadding="0" cellspacing="1">
      <tr >
        <th><span>用户名</span></th>
        <th><span>密码</span></th>
        <th><span>身份</span></th>
        <th><span>操作</span></th> 
    </tr>
    <?php 
    while ($row = mysql_fetch_array($res)) {
    ?>
    ﻿<tr>
       <td align="center"><span><?php echo $row['username']?></span></td>
       <td align="center"><span><?php echo $row['password']?></span></td>
       <td align="center"><span><?php echo $row['identity']?></span></td>
       <td align="center" >
         <a href="edit_user.php?id=<?php echo $row['id'] ?>" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0" /></a>
         <a href="javascript:void(0);" id="delete<?php echo $row['id'] ?>" data=" <?php if($row['identity'] == 1){
                 echo "用户";} else if($row['identity'] == 2){ echo "超级用户";} else{ echo "管理员";}?>" onclick="deleteData(<?php echo $row['id'] ?>)" title="删除">
             <img src="images/delete.jpg" width="13" height="14" border="0" /></a>
         </td>
     </tr>
     <?php }?>
 </table>
</div>
    <input type="hidden" name="act" value="deleteAll" />
</form>

<script type="text/javascript">

    function deleteData( id ){
        var title=document.getElementById('delete'+id).attributes["data"].value;
        
            if(confirm("确定要删除‘ " + title + " ’吗？")){
                
                window.location.href = "del_user.php?act=delete&id=" + id;
                
                return true;
                
            }else
                return false;
            
    }
</script>
</body>
</html>
