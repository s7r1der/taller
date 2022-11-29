<?php
	connect($_POST["usr"],$_POST["passwd"]);

	$res=mysql_query("select * from usuario".
		   " where u_pswd = password('".$_POST["passwd"]."')".
		   " and u_name ='".$_POST["usr"]."'")or die(mysql_error());

	if($row=mysql_fetch_array($res,MYSQL_ASSOC)){
		$_SESSION["user"]=$row["u_name"];
		$_SESSION["pswd"]=$row["u_pswd"];
		$_SESSION["role"]=$row["u_role"];
		header("Location:".$_SERVER["PHP_SELF"]."?event=menu_user");

	}else{
		header("Location:".$_SERVER["PHP_SELF"]."?event=logout");}
?>