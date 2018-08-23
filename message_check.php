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
 $sql = "SELECT * FROM waxiaoxia_message";
 $total = mysql_num_rows(mysql_query($sql)); //记录总条数
 if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
 //获取数据
 $sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
 $resulti = mysql_query($sql);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
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
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input class="layui-input" placeholder="开始日" name="start" id="start">
          <input class="layui-input" placeholder="截止日" name="end" id="end">
          <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <?php if($total != ''){
             $page = new page($total, $showrow, $curpage, $url, 2);
             $total = $page->myde_total();
             echo  "<xblock>
                  <button class='layui-btn layui-btn-danger' onclick='delAll()'><i class='layui-icon'></i>批量删除</button>
                  <span class='x-right' style='line-height:40px'>共有数据：$total 条</span>
                </xblock>";
      }
      else{
            echo "</br><font color='#FF0000'>&nbsp;&nbsp;&nbsp;&nbsp;暂无相关数据</font>";
      }
      ?>
     
      <table class='layui-table'>
        <?php if($total != ''){
           echo "<thead>
                  <tr>
                    <th>
                      <div class='layui-unselect header layui-form-checkbox' lay-skin='primary'><i class='layui-icon'>&#xe605;</i></div>
                    </th>
                    <td align='center'>ID</td>
                    <td align='center'>姓名</td>
                    <td align='center'>手机号码</td>
                    <td align='center'>留言信息</td>
                    <td align='center'>留言的时间</td>
                    <td align='center'>操作</td>
                  </tr>
                </thead>";
        }
        ?>
        <?php 
        while($rowi = mysql_fetch_array($resulti)){
        ?>
        <tbody>
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $rowi['id'];?>'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td align="center"><?php echo $rowi['id'];?></td>
            <td align="center"><?php echo $rowi['name'];?></td>
            <td align="center"><?php echo $rowi['phone'];?></td>
            <td align="center"><?php echo $rowi['message'];?></td>
            <td align="center"><?php echo $rowi['message_date'];?></td>
            <td class="td-manage" align="center">
              </a>
             <button class="layui-btn layui-btn-sm layui-btn-danger"><a title="删除" onclick="del_article(this,'<?php echo $rowi['id']?>')" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </button>
            </td>
           
          </tr>
        </tbody>
         <?php }?>
      </table>
        
        <!-- 分页 -->
          <?php
           if ($total > $showrow) {//总记录数大于每页显示数，显示分页
           $page = new page($total, $showrow, $curpage, $url, 2);
           echo $page->myde_write();
           }
          ?>
        <!-- 分页 -->

    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

      /*文章-删除*/
      function del_article(obj,id){
          layer.confirm('确认删除勾选的专题',{icon:3,title:"确认"},function(index){
              //发异步删除数据
              $.ajax({
                  type:'POST',
                  url:'del_message.php',
                  data:{
                    id:id,
                  },
                  success:function(res){
                    if (res == 1) {
                       $(obj).parents("tr").remove();
                       layer.msg(res,{icon:1,time:1000});
                       window.location.reload();
                    }
                    else{
                       layer.msg(res,{icon:0,time:1000});
                    }
                  }
              });
          });
      }
     // 批量删除 
    function delAll (argument) {
        var data = tableCheck.getData();
        if (data == '') {
          layer.msg("请勾选删除的数据！", {icon: 0});
          return false;
        }
        layer.confirm('确认删除勾选的数据',{icon:3,title:"确认"},function(index){

            //捉到所有被选中的，发异步进行删除
                 //获取id后删除
                 $.ajax({
                   type:'POST',
                   url:'delAll_message.php',
                   data:{data:data},
                   success:function(res){
                     if (res == 1) {
                       layer.msg(res, {icon: 1});
                       $(".layui-form-checked").not('.header').parents('tr').remove(); 
                       window.location.reload();
                     }
                     else{
                       layer.msg(res, {icon: 0}); 
                     }
                   }
                 });
               });
             }
    //批量删除
    </script>

    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();
    </script>

  </body>

</html>