	<?php
	$d=mysql_connect("localhost","root","");
	// Create database
	$sql="CREATE DATABASE uname";
	if (mysql_query($sql,$d))
	  {
	  echo "<br>Database uname created successfully";
	  }
	else
	  {
	  echo "<br>Error creating database: ".mysql_error() ;
	  }
	 $sql = "CREATE TABLE `uname`.`userinfo` (`lid` TEXT NOT NULL, `pwd` TEXT NOT NULL, `fname` TEXT NOT NULL, `lname` TEXT NOT NULL, `email` TEXT NOT NULL, `sex` TEXT NOT NULL)";
	 if (mysql_query($sql,$d))
	  {
	  echo "<br>Table userinfo created successfully";
	  }
	else
	  {
	  echo "<br>Error creating table: ".mysql_error();
	  }
	?>