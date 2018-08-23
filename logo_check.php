<?php
  require_once 'base.php';
?>
<?php 
 require_once 'conn.php';
 $sql = "select * from waxiaoxia_logo";
 $result = mysql_query($sql);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>layui</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" href="lib/layui/css/layui.css"  media="all">
	<style type="text/css">
	.show {margin: 10px 0; border: 1px solid #eee;width: 90%;}
	.show ul {list-style: none; overflow: hidden; padding: 0px;}
	.show li {width:100px; float: left;margin: 5px;border: 1px solid #eee; position: relative;}
	.show li img{width:100%; display: block;}
	.show .delete-img {padding:0 3px; position: absolute;top:0;right: 0;background:#FF6666; font-size: 13px; color:#fff;display: none; cursor: pointer;}
	.show li:HOVER .delete-img{
		display: block;
	</style>
</head>
<body>
	<div style="padding-left: 30px;">
	<p style="padding:10px 0px 15px 10px;">当前logo：</p>
	<div class="show"">
		<ul>
			<?php 
			while($row = mysql_fetch_array($result)){
				?>
				<li>
					<span class="delete-img" onclick="deletePro(<?php echo $row['id'];?>)">x</span>
					<img src="<?php echo $row['pic'];?>" alt="" style="width: 100px;"/>
					<div class="pro-name">
						<form enctype="multipart/form-data" action="product.php" method="post" >
							<input type="hidden" name="id" value="12" />
							<input type="hidden" name="act" value="modify" />
						</form>
					</div>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>	
	<p style="padding: 20px;">&nbsp;&nbsp;&nbsp;*请上传png格式的logo图片 图片格式 *jpg *png </p>
	<form enctype="multipart/form-data" action="logo_uploaddo.php" method="post">
		<div class="layui-upload" style="padding: 30px;">
			<span id="logo">  
				<input id="pic" placeholder="" class="layui-btn" type="file" name="pic">
				<input type="submit" name="submit" value="   上传    " accept="images/jpg/png" /><br />
			</span>
		</div>  
	</form>
	<script type="text/javascript">

	// layui.use(['form','layer'], function(){
	// 	$ = layui.jquery;
	// 	var form = layui.form
	// 	,layer = layui.layer;
	    function deletePro(id){//删除

	    	if(confirm("确定要删除吗？")){

	    		window.location.href = "del_logo.php?act=delete&&id=" + id;

	    		return true;

	    	}else{

	    		return false;
	        }   
         } 
	// }); 
	</script>
</body>
</html>