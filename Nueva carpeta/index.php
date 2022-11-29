<?php
	// include function prototypes.

	function login_valid(){	include("inc/login_valid.php");	}
	function login_form(){	include("inc/login_form.php");	}
	function resolv(){		include("inc/resolv.inc.php");	}
	function connect(){		include("inc/connect.inc.php");	}

	include("inc/syntax.inc.php");
	session_start();
	
		$_SESSION["day"]=date("d");
		$_SESSION["month"]=date("m");
		$_SESSION["year"]=date("y");

	if(!session_is_registered("role")){
		if(isset($_POST["event"])){
			if($_POST["event"]=="Acceder")
				login_valid();
		}else{
			include("inc/header.php");
			login_form();
			include("inc/footer.php");
		}		
	}else{
		connect();
		resolv();
	}

?>

