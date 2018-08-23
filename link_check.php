<?php
  require_once 'base.php';
?>
<?php 
 require_once 'conn.php';
 require_once('page.class.php'); //分页类
 $showrow = 5; //一页显示的行数
 $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
 $url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
 //省略了链接mysql的代码，测试时自行添加
 $sql = "SELECT * FROM waxiaoxia_link";
 $total = mysql_num_rows(mysql_query($sql)); //记录总条数
 if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
 //获取数据
 $sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
 $resulti = mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/list.css" rel="stylesheet" type="text/css" />
<style type="text/css">
  p{margin:0}
            #page{
                height:40px;
                padding:20px 0px;
                width: 600px;
                margin: 0 auto;
            }
            #page a{
                display:block;
                float:left;
                margin-right:10px;
                padding:2px 12px;
                height:24px;
                border:1px #cccccc solid;
                background:#fff;
                text-decoration:none;
                color:#808080;
                font-size:12px;
                line-height:24px;
            }
            #page a:hover{
                color:#077ee3;
                border:1px #077ee3 solid;
            }
            #page a.cur{
                border:none;
                background:#077ee3;
                color:#fff;
            }
            #page p{
                float:left;
                padding:2px 12px;
                font-size:12px;
                height:24px;
                line-height:24px;
                color:#bbb;
                border:1px #ccc solid;
                background:#fcfcfc;
                margin-right:8px;
            }
            #page p.pageRemark{
                border-style:none;
                background:none;
                margin-right:0px;
                padding:4px 0px;
                color:#666;
            }
            #page p.pageRemark b{
                color:red;
            }
            #page p.pageEllipsis{
                border-style:none;
                background:none;
                padding:4px 0px;
                color:#808080;
            }
            .dates li {font-size: 14px;margin:20px 0}
            .dates li span{float:right}
</style>
</head>

<body >
<form enctype="multipart/form-data" name="listForm" id="list-form" action="link.php" method="post"   onsubmit="return deleteData('all')">
	<a href="add_link.php"><input type="button" value="增加友情链接" /></a>
	<div  id="list-div">
       	<table cellpadding="0" cellspacing="1" id="main-table">

          	<tr >
                <th><input type="checkbox"  onclick="selectAll(this, 'checkboxes')" /></th>
                <th><span>ID</span></th>
                <th><span>网站名称</span></th>
                <th><span>网站地址</span></th>
            	<th><span>操作</span></th>
          	</tr>
﻿<!-- </br><font color='#FF0000'>&nbsp;&nbsp;&nbsp;&nbsp;暂无相关数据</font> -->
          <?php while($row = mysql_fetch_array($resulti)){?>
﻿            <tr>
               <td align="center"><input type="checkbox" id="checkboxes0" name="checkboxes[]" value="18"></td>
               <td align="center"><span><?php echo  $row['id']?></span></td> 
               <td align="center"><span><?php echo  $row['web_name']?></span></td>
               <td align="center"><span><?php echo  $row['web_address']?></span></td>
               <td align="center" >
               <a href="edit_link.php?id=<?php  echo $row['id']; ?>" title="编辑"><img src="images/icon_edit.gif" width="16" height="16" border="0" /></a>
               <a href="javascript:void(0);" id="delete<?php $row['id'];?>" data="<?php echo  $row['web_name']?>" onclick="deleteData(<?php echo $row['id'];?>)" title="删除">
                 <img src="images/delete.jpg" width="13" height="14" border="0" /></a>
               </td>
            </tr>
           <?php }?>
        </table>
  </div>
<!DOCTYPE html>
<html> 
<head lang="en">
    <meta charset="UTF-8">
    <style type="text/css">
        #select{}
        #select input{vertical-align: middle;margin: 0;}
        #select span{vertical-align: middle;margin: 0;padding: 0;}
        .paging{text-align: center;margin-top: 20px;margin-bottom:40px;color: #555555;font-size: 13px;}
        .paging a{display: inline-block;text-align: center;text-decoration: none;color: #555555;border:1px solid #CCCCCC;padding:2px 8px 2px 8px;}
        .paging a.current{border:1px solid #008080;background: #80BDCB;}
        .paging a:hover{background:#80BDCB;border:1px solid #008080;}
        .paging input[type="text"]{text-align: center;height: 12px;}
        
    </style>
</head>
<body >

    <p id="select">
        &nbsp;<span>全选</span>
        <input type="checkbox"  onclick="selectAll(this, 'checkboxes')" />&nbsp;
        <input type="submit" id="btnSubmit" disabled="true" value="删除选中项" />
        <input type="hidden" name="act" value="deleteAll" />
    </p>
    
    <!-- 分页 -->
    <?php
           if ($total > $showrow) {//总记录数大于每页显示数，显示分页
             $page = new page($total, $showrow, $curpage, $url, 2);
             echo $page->myde_write();
           }
    ?>
    <!-- /分页 -->

  </body>
</html>	

<script type="text/javascript">

//删除信息
function deleteData(id){
	if(id == 'all'){
		if(confirm("确定要删除选中的记录吗？")){
			return true;
		}else{return false;}
		
	}else{
		if(confirm("确定要删除吗？")){
			window.location.href="del_link.php?act=delete&id="+id;
			return true;
		}else
			return false;
	}
		
}


//判断是否选中
function hasselect(){
	var countList = 0;
	var cbxList = document.getElementsByName('checkboxes[]');
    for(var i=0;i<cbxList.length;i++){
       if(cbxList[i].checked == true){
            countList++;
            cbxList[i].parentNode.parentNode.style.background="#BBDDE5";//选中后改变整行的背景色
       }else{
     	  cbxList[i].parentNode.parentNode.style.background="";
           }
     } 
     if(countList == 0){
    	 document.getElementById('btnSubmit').disabled=true;
        }else{
        	document.getElementById('btnSubmit').disabled=false;
	        }
 }
 
//选中全部
selectAll = function(obj, chk)
{
	
  if (chk == null)
  {
    chk = 'checkboxes';
  }
  var elems = obj.form.getElementsByTagName("INPUT");//获取当前对象的form里面所包含的input

  for (var i=0; i < elems.length; i++)
  {
    if (elems[i].name == chk || elems[i].name == chk + "[]")
    {
      elems[i].checked = obj.checked;
      
      if(obj.checked==true){
      	elems[i].parentNode.parentNode.style.background="#BBDDE5";//选中后改变整行的背景色 
      }else{elems[i].parentNode.parentNode.style.background="";}
      
    }
  }
  if(obj.checked){
	  document.getElementById('btnSubmit').disabled=false;
	  }else{
		  document.getElementById('btnSubmit').disabled=true;
		  }
}
</script>
</form>
</body>
</html>