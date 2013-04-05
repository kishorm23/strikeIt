<!DOCTYPE HTML PUBLIC “-//W3C//DTD HTML 4.01 Transitional//EN”
“http://www.w3.org/TR/html4/loose.dtd”>
<html>
<head>
<title>StrikeIt-To Do list manager</title>
<script type="text/javascript" src="script/script.js"></script>
<link rel="stylesheet" type="text/css" href="css/index2.css">
<link rel="stylesheet" type="text/css" href="css/index1.css">
<?php 
@session_start();
if(isset($_POST['submit'])||$_SESSION['id']=="")
{
session_unset();
echo "i'm here";
}
?>
</head>
<body>
<div class="header"><h1>StrikeIt<h1></div>
<div id="logout">
<?php
include "include_con.php";
@session_start();
$lid = $_SESSION['id'];
  $sql = "SELECT * FROM userinfo WHERE lid = '$lid'";
  if($run=mysql_query($sql))
    {
      $row = mysql_fetch_assoc($run);
      $fname = $row['fname'];
	  echo "Welcome, $fname";
	}
?>
<form method="post" action="todo.php"><input type="submit" value="logout" class="deletebutton" id="logoutbutton"></form>
</div>
<center>
<div id="content">
<form name="ToDoList">
<div id="title"><center>To Do List</center></div><br>
<div id="statistics"><div id="done"></div><div id="ndone"></div></div>
<ul id="list">
</ul>
<center><input type="button" value="Add new task" onclick="additem()" id="addnew"></center>
</div>
<script>
load();
additem();
</script>
</body>
</html>