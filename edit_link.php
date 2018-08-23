<?php
  require_once 'base.php';
?>
<?php 
  require_once 'conn.php';

  $id = $_GET['id'];

  $sql = "SELECT * FROM `waxiaoxia_link` WHERE id = '$id' ";

  $result = mysql_query($sql);

  $row = mysql_fetch_array($result);

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/add.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/judge.js"></script>
</head>
<body >
<!-- start client form -->
    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data"  name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table"  cellspacing="10px" >  
          <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
          <tr >
            <td class="label" >网站名称:</td>
            <td ><input type="text" name="name" id="web_name" value="<?php echo $row['web_name'];?>" size="25" /> </td>
          </tr>
          <tr>
            <td class="label">网站地址:</td>
            <td><input type="text" name="link" id="web_address" value="<?php echo $row['web_address'];?>"  size="80" /></td>
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
		
        <input type="hidden" name="act" value="add" />
      </form>
   	 </div>
<script type="text/javascript" src="js/jquery.min.js"></script>  
<script type="text/javascript">
    $('#submit').click(function(event){
          var id = $('#id').val();
          var web_name = $('#web_name').val();
          var web_address = $('#web_address').val();
          if (web_name == '') {
            alert('-请填写网站名称！');
            return false;
          }
          else if (web_address == '') {
            alert('-请填写网站地址！');
            return false;
          }
          $.ajax({
               type:'POST',
               url:"edit_linkdo.php",
               data:{
                  id:id,
                  web_name:web_name,
                  web_address:web_address,
               },
               success:function(data){
                 alert(data);
                 window.location.href="link_check.php";
               }
          });
    });
</script>
</body>
</html>