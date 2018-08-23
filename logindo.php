<?php  
  require_once 'conn.php';
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = "select username,password from waxiaoxia_admin where username = '$username' and password = '$password'";  
  $result = mysql_query($sql);  
  $row = mysql_num_rows($result);  
  if($row)  
  {  
    if (!isset($_SESSION)) {
     	session_start(); 
     } 
        $_SESSION['username'] = $username;
        echo "1";
  }  
  else 
  {  
  	    echo "0";
  }  

?>