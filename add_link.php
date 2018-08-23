<?php
  require_once 'base.php';
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


<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#EEFFBB;padding: 12px;border-bottom: 2px solid #FFEE99; ">
  <span style="font-size: 13px;color: #555555;">当前操作 ></span>
  <span style="font-size: 13px;color: gray;" ><a href="link_check.php">友情链接 ></a></span>
  <span style="font-size: 13px;color: gray;" >添加链接</span>
</div>
<!--当前操作  -->

    <!-- tab body -->
    <div id="tabbody-div" style="padding-top: 70px;">
      <form enctype="multipart/form-data" action="link.php" method="post" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table"  cellspacing="10px" >  
          
          <tr >
            <td class="label" >网站名称:</td>
            <td ><input type="text" name="name" id="web_name" value="" size="25" /> </td>
          </tr>
          <tr>
            <td class="label">网站地址:</td>
            <td><input type="text" name="link" id="web_address" value="http://"  size="80" /></td>
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
	

<script  language="JavaScript" >
/**
 * 检查表单输入的内容是否为空
 */
function validate()
{		
	 	var validator = new judge();
	    
	    validator.required('name', '网站名称不能为空！');
	    
	    //validator.required('context', '内容不能为空！');
	    validator.required('link', '网站地址不能为空！');
	    return validator.passed();
}
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>  
<script type="text/javascript">
    $('#submit').click(function(event){
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
               url:"add_linkdo.php",
               data:{
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