<?php 
  header("Content-type:text/html;charset=utf-8");
if(!isset($_SESSION)){
    session_start();
}
    unset($_SESSION['username']);
    echo '<script>alert("退出成功!点击跳转");location.href="login.php";</script>';
?>