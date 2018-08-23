<?php
  require_once 'base.php';
?>
<?php
  require_once 'conn.php';
  $sql = "select * from waxiaoxia_contact";
  $result = mysql_query($sql);
  $row = mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/add.css" rel="stylesheet" type="text/css" />

<!-- kindeidtor编辑器设置 -->
<link rel="stylesheet" href="js/kindeditor/themes/default/default.css" />
<script src="ueditor/ueditor.config.js"></script>
<script src="ueditor/ueditor.all.min.js"></script>
<script src="ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>  
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
  var ue = UE.getEditor('content',{initialFrameWidth:800,initialFrameHeight:400,});
</script>
</head>

<body >
<!-- start client form -->

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="?.php" method="post" name="theForm">
        <table width="90%" id="general-table"  cellspacing="10px" > 
        	          <tr>
          	<td class="label">内容详情:</td>
          	<td></td>
          </tr>
          <tr>
          	<td class="label">&nbsp;</td>
            <td>
              <textarea  name="content" id="content" style="width:100%;height:300px; "><?php echo $row['content']?></textarea>
            </td>
          </tr>
          <tr>
             <td >&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td>
            <input type="button" id="submit" value="  保存   " name="save" />    
          	<input type="reset" value="  重置   " style="" />
          	</td>
          </tr>
        </table>
		
        <input type="hidden" name="act" value="modify" />
      </form>
   	 </div>
	
    <script language="JavaScript" src="js/judge.js"></script>
    <script  language="JavaScript" >
     $('#submit').click(function(event){
      var content = ue.getContent();
      if (content == '') {
        alert('-内容详情不能为空！');
        return false;
      }
      $.ajax({
       type:'POST',
       url:'edit_contact_usdo.php',
       data:{
         content:content,
       },
       success:function(data){
         alert(data);
         window.location.reload();
       }
     });
    });
</script>
</body>
</html>