<?php
  require_once 'base.php';
?>
<?php 
    header("content-type:text/html;charset=utf-8");

    require_once 'conn.php';

    $ad_password = md5($_POST['ad_password']); // 输入密码的旧密码

    $password = $_POST['password']; // 新密码

    $repassword = $_POST['repassword']; // 确认密码

    if(!isset($_SESSION)){
    	session_start();
    }

    $username = $_SESSION['username'];
  
    $sql = "SELECT * FROM `waxiaoxia_admin` WHERE username = '$username'";
    
    $result = mysql_query($sql);
   
    $rs = mysql_fetch_assoc($result); // sql取出一个字段的值

    //var_dump($rs['password']);exit;

    $rs1 = $rs['password'];// 原密码

    if ($rs1 !=  $ad_password) { // 判断原密码是否与输入密码的旧密码一致
    	echo "原密码不正确！！！";
    }
    else if ( $rs1 == md5($password )) { // 判断原密码是否与修改的新密码一致
    	echo "新密码不能与原密码一样！！！"; 
    }
    else if(md5($password) !=  md5($repassword)){
        echo "新密码与确认密码不一致！！！"; 
    }
    else{
         
        $password1 = md5($password);

    	$sqli = "UPDATE `waxiaoxia_admin` SET `password`= '$password1' WHERE username = '$username'";
    	
    	$res1 = mysql_query($sqli);

    	if ($res1) {
    		echo "修改密码成功！！！";
    	}
    	else{
    		echo "修改密码失败！！！";
    	}
    }


    


?>