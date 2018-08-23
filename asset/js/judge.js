function judge(form){
  this.errMsg = new Array();
  var form = form == null?"theForm":form;
    this.require = function(controlId,msg){
       var obj = document.forms[form].elements[controlId];     //获取元素
      if(typeof(obj) == "undefined" || obj.value == "" || obj.value == "undefined" || obj.value.replace(/(^\s*)|(\s*$)/g,"") == "") {
          this.errMsg.push(msg);
      }
    };

    this.warn = function(){           //弹出提示
        if(this.errMsg.length > 0){
          var msg = "";
          msg += "-" + this.errMsg[0];
          alert(msg);
          return false;
        } else {return true;}
    };

    this.phone = function(){              //判断手机号码是否符合
      var phone = document.forms[form].elements["phone"];
      if(phone.value.length == 0 || phone.value.search(/^[1][3,4,5,7,8][0-9]{9}$/) == -1){
        alert("请输入11位有效的手机号码！(^_^)");
        phone.focus();
        return false;
      }
      else {return true;}
    };

    this.submitOnce = function(){        //防止多次提交
      var subOnce = document.getElementById("inputForm");
      subOnce.disabled = true;
      return true;
    };
}
