<html>
<head>
<title>Validate</title>
 <?php @session_start();
 if($_SESSION['id']=='')
 {echo '<meta http-equiv="refresh" content="0;url=index.php">';
 die();}
 ?>
<link rel="stylesheet" type="text/css" href="css/index1.css">
 </head>
<body>
<?php
       echo "<div class='header'><h1>StrikeIt</h1></div>";
       @session_start();
       echo "<center><h2><div class='logIn'><h4>Please wait while we redirect you..</h4></div>";
	   if($_SESSION['checkbox']=="on") $redirect="set.php";
	   else $redirect="todo.php";
  echo "</center></h2>";   
  unset($_SESSION['checkbox']);
?>
 <meta http-equiv="refresh" content="2;url=<?php echo $redirect?>">
</body>
</html>