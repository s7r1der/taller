<?php
	
	//echo "ESTAMOS VALIDANDO";

	connect($_POST["usr"],$_POST["passwd"]);

	$res=mysql_query("select * from usuario".
		   " where u_pswd = '".$_POST["passwd"]."'".
		   " and u_name ='".$_POST["usr"]."'")or die(mysql_error());

	//echo mysql_num_rows($res);
	if($row=mysql_fetch_array($res,MYSQL_ASSOC)){
		$_SESSION["user"]=$row["u_name"];
		$_SESSION["u_pswd"]=$row["u_pswd"];
		$_SESSION["u_role"]=$row["u_role"];
		//include("inc/menu_user.php");
		header("Location:".$_SERVER["PHP_SELF"]."?event=menu_user");

	}else{
		header("Location:".$_SERVER["PHP_SELF"]."?event=logout");}
?>