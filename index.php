<?php
if($_COOKIE['username']!="")
{
$lid=$_COOKIE['username'];
session_start();
include "include_con.php";
$sql = "SELECT * FROM userinfo WHERE lid = '$lid'";
if($run=mysql_query($sql))
{
$row = mysql_fetch_assoc($run);
$pwd = $row['pwd'];
if($_COOKIE['pwd']==md5($pwd))
{
$_SESSION['id']=$_COOKIE['username'];
echo '<meta http-equiv="refresh" content="0;url=todo.php">';
die();
}
}
}
if(isset($_POST['submit']))
{
include "include_con.php";
if($q = mysql_query("SELECT * from userinfo WHERE lid='$_POST[lid]' AND pwd='$_POST[pwd]'",$d))
{
   $num = mysql_num_rows($q);
   if($num==1)
     {
       @session_start();
       $_SESSION['id'] = $_POST['lid'];
	   echo '<meta http-equiv="refresh" content="0;url=redirect.php">';
       $_SESSION['checkbox']=$_POST['remember'];	
	   die();
	 }
	 else {
	 $error=1;
	 }
}
}
?>
<html>
<head>
<title>Log In or Sign Up</title>
<link rel="stylesheet" type="text/css" href="css/index1.css">
<?php if($error==1) echo '<link rel="stylesheet" type="text/css" href="css/error.css">';?>
<body>
<?php if($error==1) echo '<div id="error">Invalid username/password combination</div>' ?>
<div class="header"><h1>StrikeIt</h1></div>
<center>
<center><div class="content">
<div class="logIn">
<form action="index.php" method="post">
<h4>
<b>Log In</b><br><br>
Username: <input type="textbox" name="lid" class="field" id="text">
<br>
<br>
Password: <input type="password" name="pwd" class="field" id="text">
<br>
<br>
Remember me:<input type="checkbox" name="remember">
<br>
<br>
<input type="submit" name="submit" value="Log In" class="field">
<br>
<a href="forgot.php"><div id="forgot">Forgot Password?</div></a>
</form>
</center>
</div></a>
<div class="signUp">
<form action="create.php">
<h3>
<br>
<br>
Don't have account yet: <input type="submit" value="Sign Up" class="field">
</form>
</h4>
</div>
</center>
</div>
</body>
</html>