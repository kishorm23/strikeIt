	<!DOCTYPE HTML PUBLIC “-//W3C//DTD HTML 4.01 Transitional//EN”
	“http://www.w3.org/TR/html4/loose.dtd”>
	<html>
	<head>
	<title>Create Account</title>
	<link rel="stylesheet" type="text/css" href="css/index1.css">
	<script>
	function load(lid)
	{
	xmlhttp=new XMLHttpRequest;
	xmlhttp.onreadystatechange = function()
			{
			  if(xmlhttp.readyState==4&&xmlhttp.status==200)
			  {
			  document.getElementById('he').innerHTML=xmlhttp.responseText;
			  if(xmlhttp.responseText=="Not available") color="red";
			  else if(xmlhttp.responseText=="Available") color="green";
			  document.getElementById("he").style.color=color;
			  }
			 }
			 url="check_avail.php?name="+lid;
			 xmlhttp.open('GET',url,true);
			 xmlhttp.send();
	}
	</script>
	</head>
	<body>
	<div class="header"><h1>StrikeIt</h1></div>
	<center>
	<div class="content1" id="create_con">
	<div class="logIn" id="create_log">
	<?php @session_start();
	if($_SESSION['error1']==1) echo '<div id="error">Please choose different login name</div><br>';
	if($_SESSION['error2']==1) echo '<div id="error">Password you entered didn\'t match</div><br>';
	unset($_SESSION['error1']);
	unset($_SESSION['error2']);
	?>
	<form action="created.php" method="post" border=1px>
	<h4>
	Create Account<br><br>
	First Name: <input type="text" name="fname" class="field" id="text">
	<br>
	<br>
	Last Name: <input type="text" name="lname" class="field" id="text">
	<br>
	<br>
	Email: <input type="text" name="email" class="field" id="text">
	<br>
	<br>
	Login name: <input type="text" name="lid" class="field" id="text" onkeyup=load(this.value)><div id="he"></div>
	<br>
	<br>
	Password: <input type="password" name="pwd1" class="field" id="text">
	<br>
	<br>
	Re-enter Password: <input type="password" name="pwd2" class="field" id="text">
	<br>
	<br>
	<input type="submit" value="Create Account" class="field">
	</center>
	</h4>
	</form>
	</div>
	</div>
	</body>
	</html>
