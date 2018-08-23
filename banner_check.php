<?php
  require_once 'base.php';
?>
<?php
require_once 'conn.php';

$sql = "select * from waxiaoxia_banner";
$result = mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/add.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    body {color:#555;}
    #tabbody-div form ul{ list-style: none; background-color: #F5FFE8; border: 1px solid  #DEFFAC; padding:5px;}
    #tabbody-div form ul li{margin: 10px 0;}
    .tips{color:#FF6666;}
    
    .img-div{ font-family: "微软雅黑";overflow:hidden; }    
    .img-div ul{ list-style: none;z-index: 0;}    
    .img-div ul li{ width: 500px;height:160px; margin: 28px;padding:5px;
                    position: relative;cursor: pointer;}    
   /* .img-div ul li:HOVER{background: url("images/hover.png");background-size: 100% 100%;}    */
    .img-div ul li .display img{ max-width:400px; max-height:120px; position: absolute; bottom: 50px;}    
    .img-div ul li .display p{width:110px;word-break:break-all; position: absolute; top: 115px;left: 10px;text-align: center;}    
    .img-div ul li .operate{width:40px; position: absolute; top:5px; right:0px; text-align: center;display: none;}    
    .img-div ul li .operate a{margin: 0 5px;}     
    .img-div ul li:HOVER .operate{display: block;}     
</style>
</head>

<body >
	<div id="tabbody-div">
		<form enctype="multipart/form-data" action="add_bannerdo.php" method="post">
			<ul>
				<li><span class="tips">*修改banner图,请上传新图片，首页图片大小：1920*600 图片格式 *jpg  内页：1920*300</span></li>
				<li>
					<label>分类:</label>
        			<select name="banner_name">
        				<option value="1">首页banner_01</option>
        				<option value="2">首页banner_02</option>
        				<option value="3">通用页面</option>
        			</select>
        			&nbsp;&nbsp;&nbsp;&nbsp;
					<label>图片:</label>
					<input type="file" name="pic" value="" accept="images/jpg">
					<input type="submit" name="btn" value="   上传    " />
				</li>
			</ul>
			
		</form>
		
<p class="title">banner图片列表：</P>
  <?php 
       while ($row = mysql_fetch_array($result)) {
         ?>
   <div class="img-div">
    <ul>
     <li title="尺寸：1920 x 688 &#13;大小：287.3 KB">
       <div class="display">
        <a href="<?php echo $row['pic'];?>" target="_blank" ><img src="<?php echo $row['pic'];?>" alt="banner_01.jpg"/>
            <p>
              <?php
              if($row['banner_name'] == 1){
                  echo  'banner_01.jpg';
              }else if ($row['banner_name'] == 2) {
                  echo  'banner_02.jpg';
              }elseif ($row['banner_name'] == 3) {
                  echo  'banner_news.jpg';
              }else{
                  echo  'banner_common.jpg';
              }
              ?>  
          </p>
          <a/>
      </div>
      <div class="operate">
          <a class="delete" href="javascript:deleteImg('<?php echo $row['id'];?>');" ><img src="images/icon_trash.gif" title="删除"/></a>
      </div>
     </li>
    </ul> 
   </div>
   <?php }?>  
<script type="text/javascript" src="js/jquery.min.js"></script>  
<script type="text/javascript">
	
    //删除图片
    function deleteImg(fname){

    	if(confirm("确定要删除吗？")){
    		
    		window.location.href = "del_banner.php?id=" + fname;
    		
    		return true;
    		
    	}else{
    		
    		return false;
    	}

    }
</script>
</body>
</html>