<?php
	// Connection Parametres
		$host="localhost";		
		$DBname="autofrenos";
		$user="root";
		$passwd="autofreno";

	// Starting Connection
	$conn=mysql_connect($host,$user,$passwd) or
		die(mysql_error());
	
	// Selecting DataBase
		mysql_select_db($DBname) or 
			die (mysql_error());
?>