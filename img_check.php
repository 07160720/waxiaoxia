<?php
  require_once 'base.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理网站图片</title>
<link href="styles/add.css" rel="stylesheet" type="text/css" />

<style type="text/css">
    form{background-color: #F5FFE8; border: 1px solid  #DEFFAC; padding:5px;}
    img{border:0;}
    input{vertical-align: middle;}
    .upload-div{margin: 20px 10px 10px;}
    .upload-div .add-button{ width:40px; height: 40px; background: url('images/upload_button.jpg') no-repeat center; background-size:40px auto; border: 5px solid #fff;}
    .upload-div input[type=submit]{background-image: url('images/modify.jpg');padding:5px;border:0;border-radius:2px;color:#fff;}
    
    .img-div{ font-family: "微软雅黑";overflow:hidden; }    
    .img-div ul{float:left; list-style: none;z-index: 0;}    
    .img-div ul li{float: left; width: 120px;height:160px; margin: 8px;padding:5px;
                    position: relative;cursor: pointer;}    
  /*  .img-div ul li:HOVER{background: url("../images/hover.png");background-size: 100% 100%;}    */
    .img-div ul li .display img{max-height:115px; max-width:120px; position: absolute; bottom: 50px;}    
    .img-div ul li .display p{width:110px;word-break:break-all; position: absolute; top: 115px;left: 10px;text-align: center;}    
    .img-div ul li .operate{width:120px; position: absolute; left:0; bottom: -18px;text-align: center;display: none;}    
    .img-div ul li .operate a{margin: 0 5px;}     
    .img-div ul li:HOVER .operate{display: block;}     

</style>

</head>

<body >
<div id="tabbody-div" >
<form enctype="multipart/form-data" action="add_imgsdo.php" method="post" name="frm" >
    <p style="color: #FF6666;margin: 0;">* 只允许上传jpg, png, gif格式的图片<br/>* 点击图片进行查看,图片不能大于500k</p>
    <div class="upload-div">
    	<input type='button' name='upload_img' value="" onclick="upfile.click()" class="add-button" title="添加文件"/>
    	<input type="text" name='upload_name'  value="" style="background: none;border: 0;"/>
     	<input type='file' name='upfile' accept="image/jpeg,image/png,image/gif"  style="display: none;" onchange="upload_name.value=this.value"/>
     	<input type="submit" name="btn" value="   上传    " /><br />
    </div>
</form>

<?php 

require_once 'conn.php';

$sql = "SELECT * FROM `waxiaoxia_imgs`";

$result = mysql_query($sql);

?>
<p class="title">网站图片列表：</P>
          <div class="img-div">
            <?php while($row = mysql_fetch_array($result)){ ?>
            <ul>
                <li title="尺寸：561 x 438 &#13;大小：29.1 KB">
                        <div class="display">
                            <a href="<?php echo $row['pic'];?>" target="_blank" >
                               <img src="<?php echo $row['pic'];?>" alt="about_us.jpg"/>
                               <p><?php echo $row['name']?></p>
                            <a/>
                        </div>
                        <div class="operate">
                            <a class="modify" href="javascript:rename('<?php echo $row['name']?>');" ><img src="images/icon_edit.gif" title="重命名"/></a>
                            <a class="delete" href="javascript:deleteImg('<?php echo $row['name']?>');" ><img src="images/icon_trash.gif" title="删除"/></a>
                        </div> 
                </li>  
           </ul>
           <?php } ?>  
	</div>
</div>
<script type="text/javascript">
    
    //修改图片名称
    function rename(oldname){


        var newname = prompt("重命名为：",oldname);
        
        if(newname){
        	window.location.href = "img_rename.php?oldname=" + oldname + "&&newname=" + newname;
        }
    }

    //删除图片
    function deleteImg(fname){

    	if(confirm("确定要删除 ‘" + fname + "’ 吗？")){
    		
    		window.location.href = "del_imgsdo.php?fname=" + fname;
    		
    		return true;
    		
    	}else{
    		
    		return false;
    	}
    
    	
    }
   
</script>
</body>
</html>