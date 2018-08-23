<?php
  require_once 'base.php';
?>
<?php 
require_once 'conn.php';
$sql = "select * from waxiaoxia_sowing_map";
$result = mysql_query($sql);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>carousel模块快速使用</title>
  <link rel="stylesheet" href="lib/layui/css/layui.css" media="all">
  <link href="styles/add.css" rel="stylesheet" type="text/css" />
  <style type="text/css">  
  #tabbody-div #theForm{display: none;}
  .demo *{ margin:0px; padding:0px; font-family:Microsoft Yahei; box-sizing:border-box; -webkit-box-sizing:border-box;}  
  .demo{max-width:640px;  min-width:320px;}  
  .ul_pics{ float:left;}  
  .ul_pics li{width:80px; height:80px; float:left; margin:0px; padding:0px; margin-left:5px; margin-top:0px; position:relative; list-style-type:none; border:1px solid #eee; }  
  .ul_pics li img{width:78px;height:78px;}  
  .ul_pics li i{width:14px; height:14px; line-height:12px;  position:absolute; top:0px; right:0px; background:#FF6666; font-size:12px; font-style:normal; text-align:center; color:#fff; cursor:pointer;}  
  .progress{position:relative; margin-top:40px; background:#eee;}   
  .bar {background-color: #009966; display:block; width:0%; height:5px; border-radius:3px;}   
  .percent{position:absolute; height:15px; top:-18px; text-align:center; display:inline-block; left:0px; width:80px; color:#666; line-height:15px; font-size:12px; }   
  .demo #btn{ width:80px; height:80px; margin:0; border:1px dotted #c2c2c2; background:url(images/upload_button.jpg) no-repeat center; background-size:40px auto; text-align:center; line-height:120px; font-size:30px; color:#666; float:left;}  

  .show {margin: 10px 0; border: 1px solid #eee;width: 90%;}
  .show ul {list-style: none; overflow: hidden; padding: 0px;}
  .show li {width:120px; float: left;margin: 5px;border: 1px solid #eee; position: relative;}
  .show li img{width:100%; display: block;}
  .show .pro-name {padding: 5px;text-align: center;}
  .show .delete-img {padding:0 3px; position: absolute;top:0;right: 0;background:#FF6666; font-size: 13px; color:#fff;display: none; cursor: pointer;}
  .show li:HOVER .delete-img{
    display: block;
  } 
  #xuxian{
    position: relative;
    top: 15px;
    width:50%;
    height:0;
    border-bottom:#000000 1px dashed;
  }/*#000000表示白色，边框宽度为一个像素，边框线型为虚线*/
</style>
</head>
<body>


  <div class="layui-carousel" id="test1">
    <div carousel-item>
      <?php while($row = mysql_fetch_array($result)){ ?>
          <div><img src="<?php echo $row['pic'];?>" style="width: 100%; height: 100%"></div>
      <?php }?>
    </div>
  </div>

  <div id="xuxian"></div>

       <!-- tab body -->
 <div id="tabbody-div" style=" padding: 30px; width: 52%;">
  <form enctype="multipart/form-data" action="sowing_mapdo.php" method="post" name="theForm" id="theForm">
    <table width="90%" id="general-table"  cellspacing="10px" > 

          <tr>
            <td class="label" >轮播图名称:</td>
            <td><input type="text" name="title1" value=""  size="40" /></td><br>
          </tr>
          <tr>
            <td class="label" ></td>
            <td><input type="text" name="title2" value=""  size="40" /></td>
          </tr>

          <tr>
            <td class="label">上传图片:</td>
            <td>
              <div class="demo">  
                <input type="file" name="pic" id="file" value=""/>
              </div> 
              <span class="link-span" >（上传的图片大小要相同，最好为：250 x 300）</span>
            </td>
          </tr>

            <tr>
             <td >&nbsp;</td>
           </tr>
           <tr>
            <td >&nbsp;</td>
            <td>
              <input type="submit" value="  保存   " name="save" />    
              <input type="reset" value="  重置   " style="" />
            </td>
          </tr>
        </table>
        <br>
        <input type="hidden" name="act" value="add" />
      </form>

      ﻿<input type="button" value="添加产品" onclick="document.getElementById('theForm').style.display='block';this.style.display='none'"/>
      <span class="link-span">*点击图片进行删除</span>

      <div class="show" >
        <ul>
          <?php 
          $sqli = "select * from waxiaoxia_sowing_map";
          $resulti = mysql_query($sqli);
          while($rowi = mysql_fetch_array($resulti)){ 
            ?>
            <li>
              <span class="delete-img" onclick="deletePro(<?php echo $rowi['id'];?>)">x</span>
              <img src="<?php echo $rowi['pic'];?>" style="width: 120px; height: 80px;" alt="" />
              <form enctype="multipart/form-data" action="sowing_rename.php" method="post" >
                <input type="text" name="title1" value="<?php echo $rowi['title1'];?>" onblur="this.form.submit()" style="width:90%;border:0;"/>
                <input type="text" name="title2" value="<?php echo $rowi['title2'];?>" onblur="this.form.submit()" style="width:90%;border:0;"/>
                <input type="hidden" name="id" value="<?php echo $rowi['id'];?>"/>
                <input type="hidden" name="act" value="modify" />
              </form>
            </li>
            <?php }?>
          </ul>
        </div>
      </div>
<!-- 条目中可以是任意内容，如：<img src=""> -->
<script src="lib/layui/layui.js"></script>
<script type="text/javascript">
  // layui.use(['form','layer'], function(){
  //   $ = layui.jquery;
  //   var form = layui.form
  //   ,layer = layui.layer;
     function deletePro(id){//删除

        if(confirm("确定要删除吗？")){

          window.location.href = "del_sowing_mapdo.php?act=delete&&id=" + id;

          return true;

        }else{

          return false;
        }   
      } 
    // }); 
  </script>

<script>
  layui.use('carousel', function(){
    var carousel = layui.carousel;
  //建造实例
  carousel.render({
    elem: '#test1'
    ,width: '50%' //设置容器宽度
    ,arrow: 'always' //始终显示箭头
    //,anim: 'updown' //切换动画方式
  });
});
</script>


</body>
</html>