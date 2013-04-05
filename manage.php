<?php
include "include_con.php";
@session_start();
echo "$SESSION[id]";
if($_GET['task']=="add")
{
		$sql = "SELECT * FROM `$_SESSION[id]` WHERE ID='$_GET[id]'";
		$run = mysql_query($sql,$d);
		$num = mysql_num_rows($run);
		if($num==0)
		{
			$query="INSERT INTO `$_SESSION[id]` VALUES ('$_GET[id]','$_GET[value]',0)";
			mysql_query($query,$d) or die(mysql_error());
		}
		else
		{
			$query="UPDATE `$_SESSION[id]` SET VALUE='$_GET[value]' WHERE ID='$_GET[id]'";
			mysql_query($query,$d) or die(mysql_error());
        }
}
else if($_GET['task']=="retrieve")
{
       $sql = "SELECT * FROM  `$_SESSION[id]` ORDER BY  `$_SESSION[id]`.`ID` ASC ";
	   $run = mysql_query($sql,$d);
		$num = mysql_num_rows($run);
	   if($run=mysql_query($sql))
    {
	   for($i=0;$i<$num;$i++)
	   {
	   $row=mysql_fetch_assoc($run);
	   $row['value'];
	   $send=$send.$row['ID'].'#'.$row['VALUE'].'^'.$row['DONE']."\n";
	   }
    }
	echo $send.'%';
}
else if($_GET['task']=="delete")
{
		$sql="DELETE FROM `$_SESSION[id]` WHERE `ID`=$_GET[id]";
		$run = mysql_query($sql,$d) or die(mysql_error());
}
else if($_GET['task']=="done")
{
		$sql="UPDATE `$_SESSION[id]` SET DONE=1 WHERE ID='$_GET[id]'";
		mysql_query($sql,$d) or die(mysql_error());
		
}
		
?>