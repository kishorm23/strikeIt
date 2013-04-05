<?php
session_start();
$lid=$_SESSION['id'];
include "include_con.php";
$sql = "SELECT * FROM userinfo WHERE lid = '$lid'";
if($run=mysql_query($sql))
{
$row = mysql_fetch_assoc($run);
$pwd = md5($row['pwd']);
setcookie('username',$_SESSION['id'],time()+259200);
setcookie('pwd',$pwd,time()+259200);
}
?>
<meta http-equiv="refresh" content="0;url=todo.php">