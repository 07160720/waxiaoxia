<?php
  require_once 'base.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/add.css" rel="stylesheet" type="text/css" />
<style type="text/css">

span.info{background:#FFF;border:0px solid #F99;font-size:14px;color:gray;}  
span.ok{background:#FFF;border:0px solid #F99;font-size:14px;color:green;}  
span.bad{background:#FCC;border:1px solid #F99;padding:2px;font-size:14px;color:black;}

</style>
</head>

<body >
<!--当前操作  -->
<!-- start client form -->

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" name="theForm"  onsubmit="return validate()">
        <table width="90%" id="general-table" align="center" >
          <tr>
            <td class="label">原密码:</td>
            <td><input type="password" name="ad_password" id="ad_password"  style="float:left;color:;" size="25" /></td>
          </tr>
         <tr>
            <td class="label" >新密码:</td>
            <td >
             <input type="password" id="new_password1" name="new_password1"  size="25"  onblur="verify_password();"/>
             <span  id="modify_password_tip1" class="info" >以字母开头，长度在6~18之间，只能包含字符、数字和下划线</span>  
            </td>
          </tr>
          <tr>
            <td class="label">密码确认:</td>
            <td>
            <input type="password" id="new_password2" name="new_password2"  size="25" onblur="comfirm();"/>
            <span id="modify_password_tip2" ></span>
            </td>
          </tr>
          <tr>
             <td >&nbsp;</td><td >&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td>
            <input type="button" id="submit" value="  确定   "  />    
          	<input type="reset" value="  重置  "  />
          	</td>
          </tr>
        </table>
		
        <input type="hidden" name="act" value="password_modify" />
      </form>
   	 </div>

	
<!-- <script language="JavaScript" src="js/judge.js"></script> -->
<script type="text/javascript" src="js/jquery.min.js"></script>  
<script  language="JavaScript" >
  document.forms['theForm'].elements['ad_password'].focus();
  /**
   * 检查表单输入的内容
   */
  function verify_password(){
	var add_password=document.getElementById("new_password1").value;
	var tips = document.getElementById("modify_password_tip1");
	var reg=/^[a-zA-Z]\w{5,17}$/;//正则表达式"以字母开头，长度在6~18之间，只能包含字符、数字和下划线"
	
	if(!reg.test(add_password)){
		tips.className='bad';
		tips.innerHTML = '以字母开头，长度在6~18之间，只能包含字符、数字和下划线';
		return false;
	}else{
		tips.className='ok';
		tips.innerHTML = '√ ';
		return true;
	}
  
}
  /**
   * 检查两次输入的密码是否正确
   */
  function comfirm(){
		var pw1=document.getElementById("new_password1").value;
		var pw2=document.getElementById("new_password2").value;
		var tips = document.getElementById("modify_password_tip2");
		if(pw1 != pw2){
			tips.className='bad';
			tips.innerHTML = '密码不一致';
			return false;
		}else{
			tips.className='ok';
			tips.innerHTML = '√ ';
			return true;
		}
	  }
  // function validate()
  // {		
	 // 	 var validator = new judge();
	 //    validator.required('ad_password', '原密码不能为空！');
	 //    validator.required('new_password1', '新密码不能为空！');
	 //    validator.required('new_password2', '确认密码不能为空！');
	    
 	// 	var isTrue=validator.passed() && verify_password() && comfirm();
	    
	 //    return isTrue;
  // }

  $('#submit').click(function(event){
           if ($('#ad_password').val() == '') {
             alert('-原密码不能为空！');
             return false;
           }
           else if($('#new_password1').val() == ''){
             alert('-新密码不能为空！');
             return false;
           }
           else if($('#new_password2').val() == ''){
             alert('-确认密码不能为空！');
             return false;
           }
           $.ajax({
                 type:'POST',
                 url:'password_modify_do.php',
                 data:{
                    ad_password:$('#ad_password').val(),// 旧密码
                    password:$('#new_password1').val(), // 新密码
                    repassword:$('#new_password2').val(),
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