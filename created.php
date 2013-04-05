<?php
include "include_con.php";
session_start();
$sql=mysql_query("SELECT * FROM userinfo WHERE lid='$_POST[lid]'",$d);
$num=mysql_num_rows($sql);
if($num==1) $_SESSION['error1']=1;
if($_POST['pwd1']!=$_POST['pwd2']) $_SESSION['error2']=1;
if($_POST[lid]==""){echo '<meta http-equiv="refresh" content="0;url=create.php">';die();}
if($_SESSION['error1']==1||$_SESSION['error2']==1) {echo '<meta http-equiv="refresh" content="0;url=create.php">';die();}
else { mysql_query("INSERT INTO userinfo VALUES ('$_POST[lid]','$_POST[pwd1]','$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[sex]')",$d);
		 $sql = "CREATE TABLE `uname`.`$_POST[lid]` (`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `VALUE` TEXT NOT NULL, `DONE` INT NOT NULL)";
		 mysql_query($sql,$d);}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/index1.css">
<title>Account Created</title>
</head>
<body>
<center>
<div class="header"><h1>StrikeIt</h1></div>
        <div class="content"><div id="created">Thanks <?php echo $_POST[fname]?> for creating account..<br>You can login by clicking <a href="\index.php">here</div><h2></a><div>
		</center>
</body>
</html>
