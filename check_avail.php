	<?php
	include "include_con.php";
	session_start();
	$sql=mysql_query("SELECT * FROM userinfo WHERE lid='$_GET[name]'",$d);
	$num=mysql_num_rows($sql);
	if($num==0&&$_GET['name']!="") echo "Available";
	else if($_GET['name']=="") echo "";
	else echo "Not available";
	?>