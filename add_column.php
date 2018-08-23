<?php
  require_once 'base.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/add.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="./js/xadmin.js"></script>
</head>
<body >
<!-- start client form -->
<div class="tab-div">
    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table" cellspacing="10px" > 
          <tr>
            <td class="label" >内容模型:</td>
            <td>
            	<select name="model" id="model">
                <option value="common">常规页面|common</option>
                <option value="article">普通文章|article</option>
                <option value="other">其他|other</option>            	
              </select>	
            </td>
          </tr> 
          <tr>
            <td class="label" >栏目名称:</td>
            <td>
            	<input type="text" name="name" id="name" value="" size="20" />
            </td>
          </tr> 
          <tr>
            <td class="label" >所属栏目ID:</td>
            <td>
            	<input type="text" name="pid" id="cid" value="0" size="1" /> 
            	<span class="link-span">（顶级目录默认为0）</span>
            </td>
          </tr> 
          <tr >
            <td class="label">栏目存放的目录:</td>
            <td >
            	<input type="text" name="catalog" id="catalog" value="" size="30"/>
            	<span class="link-span">请不要使用中文名称的目录名</span>
            </td>
          </tr>
          <tr>
            <td class="label">默认链接:</td>
            <td><input type="text" name="link" id="link" value=""  size="80" /></td>
          </tr>
          <tr>
            <td class="label">打开方式:</td>
            <td>
            	  <input type="radio" name="target" value="blank" checked="checked" />空白页&nbsp;
                <input type="radio" name="target" value="current" />当前页 
            </td>
          </tr>
          <tr>
            <td class="label">排列顺序:</td>
            <td>
            	<input type="text" name="porder" id="porder" value="" size="1"  onblur="isInteger(this)"/> 
            	<span class="link-span">（由低->高）</span>
            </td>
          </tr>
          <tr>
            <td class="label">模板名称:</td>
            <td>
            	<input type="text" name="template" id="template" value="" size="20" onblur="getFileSize(this)"/> 
            </td>
          </tr>
          <tr>
            <td class="label">是否显示栏目:</td>
            <td>
            	  <input type="radio" name="display" value="show" checked="checked" />显示&nbsp;
                <input type="radio" name="display" value="hide" />隐藏 
            </td>
          </tr>
          <tr>
             <td >&nbsp;</td>
          </tr>
            <tr>
            <td >&nbsp;</td>
            <td>
            <input type="button" lay-filter="add" lay-submit="" value="  保存   "  />    
          	<input type="reset" value="  重置  "  />
          	</td>
          </tr>
        </table>
        <input type="hidden" name="act" value="add" />
      </form>
   	 </div>
	</div>
<script language="JavaScript" src="js/judge.js"></script>
<script  language="JavaScript" >
    //判断文件名类型
    function getFileSize(obj){
        fileExt=obj.value.substr(obj.value.lastIndexOf(".")).toLowerCase();//获得文件后缀名
        if(fileExt!='.htm'){
            alert("文件名必须为*.htm");
            return false;
        }
    }
	/* 判断是否是整数 */
	function isInteger(obj) {
	 	if(isNaN(Number(obj.value))){
	 		alert("请输入整数");
		}
	}
  /**
   * 检查表单输入的内容是否为空
   */
</script>

 <script type="text/javascript" src="js/jquery.min.js"></script>  

 <script type="text/javascript">
    layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
      // 监听提交
      form.on('submit(add)', function(data){
         var id = $('#id').val();
             var model = $('#model').val();
             var name = $('#name').val();
             var cid = $('#cid').val();
             var catalog = $('#catalog').val();
             var link = $('#link').val();
             var porder = $('#porder').val();
             var template = $('#template').val();
             var target = $("input[name='target']:checked").val();
             var display = $("input[name='display']:checked").val();
          $.ajax({
              type:'POST',
              url:"add_columndo.php",
              data:{
                 id:id,
                 model:model,
                 name:name,
                 cid:cid,
                 catalog:catalog,
                 link:link,
                 porder:porder,
                 template:template,
                 target:target,
                 display:display,
              },
              success:function(res){
                  //发异步，把数据提交给php
                  layer.alert(res, {icon: 6},function () {
                   // 获得frame索引
                  //window.parent.location.reload(); //刷新父页面
                  var index = parent.layer.getFrameIndex(window.name); //获取窗口索引

                  parent.layer.close(index);  // 关闭layer

                  location.reload();// 更新当前也 重新加载数据即刷新
                  });
                }
            });
        });
     });
 </script>
</body>
</html>