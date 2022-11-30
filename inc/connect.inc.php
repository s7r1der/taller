<?php
$host = "localhost";	//Definicion parametros
$DBname = "autofrenos";

$conn = mysql_connect($host, "root", "intseqring"); // or	header("Location:".$_SERVER["PHP_SELF"]."?event=logout");

mysql_select_db($DBname) or die(mysql_error());
