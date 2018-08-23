<?php
  require_once 'base.php';
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
  <script src="ueditor/ueditor.config.js"></script>
  <script src="ueditor/ueditor.all.min.js"></script>
  <script src="ueditor/lang/zh-cn/zh-cn.js"></script>
  <script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('content',{initialFrameWidth:800,initialFrameHeight:400,});
  </script>
  <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="x-body">
      <form class="layui-form" action="">
        <div class="layui-form-item">
          <label class="layui-form-label">栏目：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
          <div class="layui-input-block">
            <select name="column1" id="column1">
              <option value="3">新闻动态</option>
              <option value="4">成功案例</option>
            </select>
          </div>
        </div>

        <div class="layui-form-item">
          <label class="layui-form-label">文章标题：</label>
          <div class="layui-input-block">
            <input type="text" name="title" id="title"  lay-verify="required" autocomplete="off" placeholder="请输入标题" class="layui-input">
          </div>
        </div>

        <div class="layui-inline">
          <label class="layui-form-label">更新时间：</label>
          <div class="layui-input-inline">
            <input type="tel" name="newstime" id="newstime" value="<?php date_default_timezone_set('PRC'); echo date("Y-m-d",time());?>" lay-verify="required"  autocomplete="off" class="layui-input">
          </div>
        </div>

        <div>&nbsp;</div>

        <div class="layui-form-item">
          <label class="layui-form-label">关键字：&nbsp;&nbsp;&nbsp;&nbsp;</label>
          <div class="layui-input-block">
            <input type="text" name="keywords" id="keywords" placeholder="使用，隔开关键词" autocomplete="off" class="layui-input">
          </div>
        </div>

        <div class="layui-form-item layui-form-text">
          <label class="layui-form-label">内容描述：</label>
          <div class="layui-input-block">
            <textarea placeholder="请输入描述内容" name="content" id="description" class="layui-textarea"></textarea>
          </div>
        </div>

        <div class="layui-form-item">
          <label class="layui-form-label">文章内容：</label>
          <div class="layui-input-block">
            <textarea placeholder="请输入描述内容" id="content" style="color: block"></textarea>
          </div>
        </div>       

        <div class="layui-form-item">
          <div class="layui-input-block">
            <button class="layui-btn" type="button" lay-filter="add" lay-submit="">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </div>
      </form>
    </div>
    <script type="text/javascript">

       layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
          //自定义验证规则
          form.verify({
            // nikename: function(value){
            //   if(value.length < 5){
            //     return '昵称至少得5个字符啊';
            //   }
            // }
            // ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            // ,repass: function(value){
            //     if($('#L_pass').val()!=$('#L_repass').val()){
            //         return '两次密码不一致';
            //     }
            // }
          });
      // 监听提交
      form.on('submit(add)', function(data){
            var title=$("#title").val();
            var keywords=$("#keywords").val();
            var newstime = $('#newstime').val();
            var description=$("#description").val();
            var content = ue.getContent(); // getContent(),获取内容信息
            var column1 = $('#column1').val();
            $.ajax({
             type: "POST",
             url: "add_articledo.php",
             data: {
              title:title,
              content:content,
              newstime:newstime,
              column1:column1,
              description:description,
              keywords:keywords,
            },
            success:function(res){
                  // console.log(res);
                  //发异步，把数据提交给php
                  layer.alert(res, {icon: 6},function () {
                   // 获得frame索引
                  //window.parent.location.reload(); //刷新父页面
                  var index = parent.layer.getFrameIndex(window.name); //获取窗口索引

                  parent.layer.close(index);  // 关闭layer

                  location.reload();// 更新当前也 重新加载数据即刷新

                  });
                  return false;
                }
            });
       });
  });
    </script>
  </body>
  </html>