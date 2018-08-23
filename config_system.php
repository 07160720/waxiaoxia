<?php
  require_once 'base.php';
?>
<?php 
  require_once 'conn.php';

  $sql = "SELECT * FROM `waxiaoxia_config_system` WHERE id = 1";

  $result = mysql_query($sql);

  $row = mysql_fetch_array($result); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/add.css" rel="stylesheet" type="text/css" />

</head>
<body > 
    <!-- tab body -->
    <div id="tabbody-div">
        <form enctype="multipart/form-data" action="?.php" method="post" name="theForm" onsubmit="return validate()" >
            <table width="90%" id="general-table" cellspacing="10px">
                
                <tr>
                    <td class="label">后台名称:</td>
                    <td><input type="text" name="web_name" id="web_name" value="<?php echo $row['web_name'] ?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">网站名称:</td>
                    <td><input type="text" name="cfg_webname" id="cfg_webname" value="<?php echo $row['cfg_webname'] ?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">首页标题:</td>
                    <td><input type="text" name="cfg_index_title" id="cfg_index_title"  value="<?php echo $row['cfg_index_title'] ?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">站点关键字:</td>
                    <td><input type="text" name="cfg_keywords" id="cfg_keywords" value="<?php echo $row['cfg_keywords'] ?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">站点描述:</td>
                    <td><textarea name="cfg_description" id="cfg_description" style="width:630px;height:50px;"><?php echo $row['cfg_description'] ?></textarea></td>
                </tr>
                <tr>
                    <td class="label">公司名称:</td>
                    <td><input type="text" name="cfg_company" id="cfg_company" value="<?php echo $row['cfg_company'] ?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">公司地址:</td>
                    <td><input type="text" name="cfg_address" id="cfg_address" value="<?php echo $row['cfg_address'] ?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">加盟热线:</td>
                    <td><input type="text" name="cfg_phone" id="cfg_phone" value="<?php echo $row['cfg_phone'] ?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">网站备案号:</td>
                    <td><input type="text" name="cfg_icp" id="cfg_icp" value="<?php echo $row['cfg_icp'] ?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">53kf:</td>
                    <td>
                        <input type="text"  name="cfg_53kf" id="cfg_53kf"  value="<?php echo $row['cfg_53kf'] ?>"  size="100" />
                        <input type="button" value="插入" onclick="kfmsg.click()" > 
                        <input type="hidden"  name="kfmsg"  value="<?php echo $row['kfmsg'] ?>" onclick="cfg_53kf.value=this.value">
                    </td>
                </tr>
                <tr>
                    <td >&nbsp;</td>
                </tr>
                <tr>
                    <td >&nbsp;</td>
                    <td>
                        <input type="button" id="save" value="  保存   "  />&nbsp;&nbsp;    
                        <input type="reset" value="  重置  " />
                    </td>
                </tr>
            </table>

        <input type="hidden" name="act" value="modify" />
      </form>
    </div>
    

<script type="text/javascript">

    //给提交按钮添加键盘监听事件“ctrl + s”
    document.onkeydown = function(e) {
        
        var keyCode = e.keyCode || e.which || e.charCode;
        var ctrlKey = e.ctrlKey || e.metaKey;
        
        if(ctrlKey && keyCode == 83) {
            
            document.getElementById("save").click();//调用按钮点击
            
            return false;   
        }
       
    }
    function validate(){
        alert("成功配置参数！");
        return true;
    }
</script>
<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#save').click(function(event){
          var web_name = $('#web_name').val();
          var cfg_webname = $('#cfg_webname').val();
          var cfg_index_title = $('#cfg_index_title').val();
          var cfg_keywords = $('#cfg_keywords').val();
          var cfg_description = $('#cfg_description').val();
          var cfg_company = $('#cfg_company').val();
          var cfg_address = $('#cfg_address').val();
          var cfg_phone = $('#cfg_phone').val();
          var cfg_icp = $('#cfg_icp').val();
          var cfg_53kf = $('#cfg_53kf').val();
        $.ajax({
             type:'POST',
             url:"config_system_do.php",
             data:{
                 web_name:web_name,
                 cfg_webname:cfg_webname,
                 cfg_index_title:cfg_index_title,
                 cfg_keywords:cfg_keywords,
                 cfg_description:cfg_description,
                 cfg_company:cfg_company,
                 cfg_address:cfg_address,
                 cfg_phone:cfg_phone,
                 cfg_icp:cfg_icp,
                 cfg_53kf:cfg_53kf,
             },
             success:function(data){
                  alert(data);
                  window.location.href="config_system.php";
             }
        });
    });
</script>
</body>
</html>
