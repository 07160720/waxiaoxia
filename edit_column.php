<?php
  require_once 'base.php';
?>
<?php
  require_once 'conn.php';

  $id = $_GET['id'];

  $sql = "SELECT * FROM `waxiaoxia_column` WHERE id = '$id'";

  $result = mysql_query($sql);

  $row = mysql_fetch_array($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="./js/xadmin.js"></script>
<link href="styles/add.css" rel="stylesheet" type="text/css" />
</head>

<body >
<!-- start client form -->
<div class="tab-div">
    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="column.php" method="post" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table" cellspacing="10px" > 
        	<input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
          <tr>
            <td class="label" >内容模型:</td>
            <td>
            	<select name="model" id="model">
                <option value="common" <?php if ($row['model'] == 'common') {
                	echo "selected";
                } ?>>常规页面|common</option>
                <option value="article"  <?php if ($row['model'] == 'article') {
                	echo "selected";
                } ?>>普通文章|article</option>
                <option value="other"  <?php if ($row['model'] == 'other') {
                	echo "selected";
                } ?>>其他|other</option>            	
              </select>	
            </td>
          </tr> 
          <tr>
            <td class="label" >栏目名称:</td>
            <td>
            	<input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" size="20" />
            </td>
          </tr> 
          <tr>
            <td class="label" >所属栏目ID:</td>
            <td>
            	<input type="text" name="pid" id="cid" value="<?php echo $row['cid'];?>" size="1" /> 
            	<span class="link-span">（顶级目录默认为0）</span>
            </td>
          </tr> 
          <tr >
            <td class="label">栏目存放的目录:</td>
            <td >
            	<input type="text" name="catalog" id="catalog" value="<?php echo $row['catalog'];?>" size="30"/>
            	<span class="link-span">请不要使用中文名称的目录名</span>
            </td>
          </tr>
          <tr>
            <td class="label">默认链接:</td>
            <td><input type="text" name="link" id="link" value="<?php echo $row['link'];?>"  size="80" /></td>
          </tr>
          <tr>
            <td class="label">打开方式:</td>
            <td>
            	  <input type="radio" name="target" value="blank" <?php if ($row['target'] == 'blank') {
                 echo "checked";
                } ?> />空白页&nbsp;
                <input type="radio" name="target" value="current"  <?php if ($row['target'] == 'current') {
                 echo "checked";
                } ?> />当前页 
            </td>
          </tr>
          <tr>
            <td class="label">排列顺序:</td>
            <td>
            	<input type="text" name="porder" id="porder" value="<?php echo $row['porder'];?>" size="1"  onblur="isInteger(this)"/> 
            	<span class="link-span">（由低->高）</span>
            </td>
          </tr>
          <tr>
            <td class="label">模板名称:</td>
            <td>
            	<input type="text" name="template" id="template" value="<?php echo $row['template'];?>" size="20" onblur="getFileSize(this)"/> 
            </td>
          </tr>
          <tr>
            <td class="label">是否显示栏目:</td>
            <td>
            	  <input type="radio" name="display" value="show"  <?php if ($row['display'] == 'show') {
                 echo "checked";
                } ?>/>显示&nbsp;
                <input type="radio" name="display" value="hide"  <?php if ($row['display'] == 'hide') {
                 echo "checked";
                } ?>/>隐藏 
            </td>
          </tr>
          <tr>
             <td >&nbsp;</td>
          </tr>
            <tr>
            <td >&nbsp;</td>
            <td>
            <input type="button" lay-filter="edit" lay-submit="" value="  保存   "  />    
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
  function validate()
  {		
	 	var validator = new judge();
	    
	    validator.required('name', '栏目名称不能为空！');
	    validator.required('pid', '所属栏目id不能为空！');
	    validator.required('porder', '排列顺序不能为空！');
	    
	    return validator.passed();
  }
</script>

 <script type="text/javascript" src="js/jquery.min.js"></script>  

 <script type="text/javascript">
 	  layui.use(['form','layer'], function(){
      $ = layui.jquery;
      var form = layui.form
      ,layer = layui.layer;
      // 监听提交
      form.on('submit(edit)', function(data){
 	 	     var id = $('#id').val();
             var model = $('#model').val();
             var name = $('#name').val();
             var cid = $('#cid').val();
             var catalog = $('#catalog').val();
             var link = $('#link').val();
             var porder = $('#porder').val();
             var template = $('#template').val();
             var target  = $("input[name='target']:checked").val();
             var display = $("input[name='display']:checked").val();
          $.ajax({
              type:'POST',
              url:"edit_columndo.php",
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