<?php
switch($_SESSION["action"]){
	case "insert_user":
		$res=mysql_query("select * from usuario".
		   " where u_name='".$_POST["usr"]."'")or die(mysql_error());
	
		if($res=mysql_fetch_array($res,MYSQL_ASSOC)){
			echo "<center><font color=\"white\"><b>"
			."Ya existe un usuario registrado con ese nombre.<br>"
			."Repita la operacion, elija otro nombre de usuario"
			."</b></font></center>";

		}else{
			if($_POST["passwd1"]==$_POST["passwd"]){
				mysql_query("insert into usuario values('','".
					$_POST["usr"]."', password('".
					$_POST["passwd"]."'),'admin')")
					or die(mysql_error());
				echo "<center><font color=\"white\"><b>"
				."Usuario registrado."
				."</b></font></center>";
			}else{
				echo "<center><font color=\"white\"><b>"
				."No existe coincidencia entre la contraseña y su verificación. <br>"
				."Repita la operacion."
				."</b></font></center>";
		}
		break;
	}

}
?>