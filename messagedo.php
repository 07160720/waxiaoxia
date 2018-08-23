<?php
    header("Content-type:text/html;charset=utf-8");

    require_once 'conn.php';

    $name = $_POST['name'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];
    date_default_timezone_set("Asia/Shanghai");
    $date = date('Y-m-d H:m:s',time());
    
    $sql = "INSERT INTO `waxiaoxia_message`(`name`, `phone`, `message`,`message_date`) VALUES ('$name','$phone','$message','$date')";

    $result=mysql_query($sql);

    if ($result) {
    	 echo '留言成功，我们会在24小时内联系你！';
    }
    else{
         echo '留言失败！';
    }

?>