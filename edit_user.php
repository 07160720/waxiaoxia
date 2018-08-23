<?php
  require_once 'base.php';
?>
<?php
  require_once 'conn.php';

  $id = $_GET['id'];

  $sql = "select * from waxiaoxia_admin where id = '$id'";

  $res = mysql_query($sql);
  
  $row = mysql_fetch_array($res);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/add.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/judge.js"></script>
<style type="text/css">
p.tips{color: #1E90FF;padding-left: 80px;margin-bottom: 20px;}
span.info{background:#FFF;border:0px solid #F99;color:#666;}  
span.ok{background:#FFF;border:0px solid #F99;color:green;}  
span.bad{background:#FCC;border:1px solid #F99;padding:2px;color:black;}
</style>
</head>
<body >
  <!--当前操作  -->
  <div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#EEFFBB;padding: 12px;border-bottom: 2px solid #FFEE99; ">
    <span style="font-size: 13px;color: #555555;">当前操作 ></span>
    <span style="font-size: 13px;color: gray;" >编辑用户</span>
  </div>
  <!--当前操作  -->
    <!-- tab body -->
    <div id="tabbody-div" style="padding-top: 80px;">
      <form enctype="multipart/form-data" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table" align="center">
          <input type="hidden" name="userid" id="id" value="<?php echo $row['id']; ?>">
          <tr>
            <td class="label">用户名:</td>
            <td><input type="text" id="add_name" name="name" value="<?php echo $row['username']?>"  size="25" onblur="checkname();" />
            </td>
          </tr>
          <tr >
            <td class="label" >密码:</td>
            <td >
             <input id="add_password" name="password" type="text" size="25" value="<?php echo $row['password']?>" onblur="verify_password()" />
             <span  id="add_password_tip" class="info" >以字母开头，长度在6~18之间，只能包含字符、数字和下划线</span>  
            </td>
          </tr>
          <tr>
            <td class="label">身份:</td>
            <td>
              <select name="status" id="identity">
                 <option value="1" 
                 <?php if($row['identity'] == 1){
                 echo "selected";}?>
                 >用户
                 </option>
                 <option value="2" 
                 <?php if($row['identity'] == 2) 
                  echo "selected";?>
                 >超级用户
                 </option>
                 <option value="3" 
                 <?php if($row['identity'] == 3)
                  echo "selected";?>
                 >管理员
                </option>
               </select> 
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
        <input type="hidden" name="act" value="add" />
      </form>
     </div>
<script  language="JavaScript" >
    /**
     * 检查表单输入的内容是否正确
     */
    
    var ajax = null;    
    var tip = null;    
    
    function createajax() { //创建ajax对象  
      
        if (window.ActiveXObject) {  
             
            ajax = new ActiveXObject('Microsoft.XMLHTTP');  
            
        } else if (window.XMLHttpRequest) {  
            
            ajax = new XMLHttpRequest();   
        }   
    }   
      
    function checkname() { //失去焦点时调用，检测用户名是否存在  
      
        var username = document.getElementById("add_name").value;
          
        tip = document.getElementById("add_name_tip");
          
        if (username == "") {  
            
            tip.className = 'bad'; 
             
            tip.innerHTML = '用户名不能为空';
              
            return;  
        }  
        
        if (ajax == null)
            createajax(); 
          
        ajax.open("GET", "validate.php?name=" + username, true); 
         
        ajax.onreadystatechange = change_tip;
          
        ajax.send(null);
          
    }   
      
    function change_tip() { //状态改变时调用  
      
        if (ajax.readyState == 4) {  
            
            if (ajax.status == 200) {   
                //eval("var obj="+ajax.responseText);
                var data = ajax.responseText; 
                
              var obj = eval("(" + data + ")");//转换为json对象  
              
                if (obj.status === 1) { 
                    
                    tip.className = 'ok'; 
                     
                    tip.innerHTML = obj.text;
                    
                    return true;  
                    
                } else { 
                    
                    tip.className = 'bad'; 
                     
                    tip.innerHTML = obj.text; 
                    
                    return false; 
                }  
            }   
        }   
    }  
    //验证密码
    function verify_password() {
      
      var add_password = document.getElementById("add_password").value;
      
      var tips = document.getElementById("add_password_tip");
      
      var reg = /^[a-zA-Z]\w{5,17}$/;//正则表达式"以字母开头，长度在6~18之间，只能包含字符、数字和下划线"
      
      if( ! reg.test(add_password) ){
        
        tips.className = 'bad';
        
        tips.innerHTML = '以字母开头，长度在6~18之间，只能包含字符、数字和下划线';
        
        return false;
        
      } else {
        
        tips.className = 'ok';
        
        tips.innerHTML = '√ ';
        
        return true;
      }
    }
    function validate() { 
      
        var validator = new judge();
          
          validator.required('name', '用户名不能为空！');
          validator.required('password', '密码不能为空！');
    
          var isTrue = validator.passed() && verify_password() && checkname();
          
          return isTrue;
    }

</script>
<script type="text/javascript" src="js/jquery.min.js"></script>  
<script type="text/javascript">
     $('#submit').click(function(event){
            var identity = $('#identity').val();
            var id = $('#id').val();
            var add_name = $('#add_name').val();
            var add_password = $('#add_password').val();
            $.ajax({
                  type:'POST',
                  url:'edit_user_do.php',
                  data:{
                    identity:identity,
                    id:id,
                    add_name:add_name,
                    add_password:add_password,
                  },
                  success:function(data){
                     alert(data);
                     window.location.href="user_check.php";//跳转的页面
                  }
            });
     });
</script>
</body>
</html>
