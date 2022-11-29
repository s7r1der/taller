<?php
switch($_SESSION["action"]){

	case "modif":
		$_SESSION["f_id"]=$_GET["f_id"];	
		$query=mysql_query("select * from ficha where f_id='".
			$_GET["f_id"]."' and f_fecha='".$_GET["fecha"]."'")or die(mysql_error());
			
		while($row=mysql_fetch_array($query,MYSQL_ASSOC)){
			include("inc/ficha/modif.php");
		}
		break;

	case "insert_ficha":
		if($_POST["dato"]==""){
			$query=mysql_query("select * from car where a_patente='".
				$_POST["dato"]."'")or die(mysql_error());
		}else{
			$query=mysql_query("select * from car where a_patente like '%"
				.$_POST["dato"]."%'")or die(mysql_error());
		}		
		if(mysql_num_rows($query)==1){
			$_SESSION["new_car"]=0;
			$row=mysql_fetch_array($query,MYSQL_ASSOC);
			include("inc/ficha/add_datos.php");
		}elseif(mysql_num_rows($query)==0){
			$_SESSION["new_car"]=1;
			$row["a_id"]="";
			$row["a_patente"]=$_POST["dato"];
			$row["a_titular"]=$row["a_telefono"]=$row["a_vehiculo"]="";
			include("inc/ficha/add_datos.php");
		}else{
			echo "<center>".font_color_s("SELECCION DE VEHICULO:")."</center>";
			echo "<br>";
			tab_gral_st();
			echo "<table>";
			echo "<tr><td><b>PATENTE - TITULAR</b></td></tr>";
			while($row=mysql_fetch_array($query,MYSQL_ASSOC)){
				echo "<tr><td>".$row["a_patente"] ." - ". $row["a_titular"]."</td>";
				echo "<th><a href=".$_SERVER["PHP_SELF"]."?event=sel_car&a_id="
					.$row["a_id"].">".font_color("  Seleccionar","times new roman","blue")
					."</a></th></tr>";
			}
			echo "</table>";
			tab_gral_end();
		}
		break;
	
	case "look_ficha":
		if($_POST["dato"]==""){
			$query=mysql_query("select * from car where a_patente='".
				$_POST["dato"]."'")or die(mysql_error());
		}else{
			$query=mysql_query("select * from car where a_patente like '%"
				.$_POST["dato"]."%'")or die(mysql_error());
		}
		if(mysql_num_rows($query)==1){
			$row=mysql_fetch_array($query,MYSQL_ASSOC);
			include("inc/ficha/ficha_tec.php");
		}elseif(mysql_num_rows($query)==0){
			echo "<center><font color=\"white\"><b>"
			."No se ha encontrado ningun vehiculo con esa patente.<br>"
			."Repita la operacion, y verifique la patente"
			."</b></font></center>";
		}else{
			echo "<center>".font_color_s("SELECCION DE VEHICULO:")."</center>";
			echo "<br>";
			tab_gral_st();
			echo "<table>";
			echo "<tr><td><b>PATENTE - TITULAR</b></td></tr>";
			while($row=mysql_fetch_array($query,MYSQL_ASSOC)){
				echo "<tr><td>".$row["a_patente"] ." - ". $row["a_titular"]."</td>";
				echo "<th><a href=".$_SERVER["PHP_SELF"]."?event=sel_car_busq&a_id="
					.$row["a_id"].">".font_color("  Seleccionar","times new roman","blue")
					."</a></th></tr>";
			}
			echo "</table>";
			tab_gral_end();
		
		}
		break;

	case "store_ficha":
		
		if(strlen($_POST["fecha"])==8)
				ereg("(..)/(..)/(..)",$_POST["fecha"],$datearray);
			elseif(strlen($_POST["fecha"])==10)
				ereg("(..)/(..)/(....)",$_POST["fecha"],$datearray);
			elseif(strlen($_POST["fecha"])==0)
			{
				echo "<center><font color=\"white\"><b>"
				."No es posible registrar dicha operacion. Fecha incorrecta.<br>"
				."Repita la operacion";
				break;
			}

		if($_SESSION["new_car"]==1){
		
			if($_POST["titular"]=="" and $_POST["vehiculo"]=="" and $_POST["telefono"]==""){
				echo "<center><font color=\"white\"><b>"
				."No es posible registrar dicha operacion. Faltan datos.<br>"
				."Repita la operacion";
				break;
			}else{
				mysql_query("insert into car values('',"
				."'".$_POST["patente"]."', "
				."'".$_POST["vehiculo"]."', "
				."'".$_POST["titular"]."', "
				."'".$_POST["telefono"]."')") or die(mysql_error());
			}
		}else{
			mysql_query("update car set "
				."a_patente='".$_POST["patente"]."', "
				."a_vehiculo='".$_POST["vehiculo"]."', "
				."a_titular='".$_POST["titular"]."', "
				."a_telefono='".$_POST["telefono"]
				."' where a_id='".$_POST["a_id"]."'") or die(mysql_error());
		}

		$query=mysql_query("select a_id from car where a_patente='"
			.$_POST["patente"]."'")or die(mysql_error());

		if($row=mysql_fetch_array($query,MYSQL_ASSOC)){

			mysql_query("insert into ficha values('',"
				."'".$row["a_id"]."', "
				."'".$_POST["desc"]."', "
				."'".$datearray[3]."-".$datearray[2]."-".$datearray[1]."')") or die(mysql_error());
		}
		header("Location:".$_SERVER["PHP_SELF"]."?event=menu_fich");
		break;

	case "update_ficha":
		if(strlen($_POST["fecha"])==8)
				ereg("(..)/(..)/(..)",$_POST["fecha"],$datearray);
			elseif(strlen($_POST["fecha"])==10)
				ereg("(..)/(..)/(....)",$_POST["fecha"],$datearray);
		elseif(strlen($_POST["fecha"])==0)
			{
				echo "<center><font color=\"white\"><b>"
				."No es posible registrar dicha operacion. Fecha incorrecta.<br>"
				."Repita la operacion";
				break;
			}

		mysql_query("update ficha set "
			."f_fecha='".$datearray[3]."-".$datearray[2]."-".$datearray[1]."', "
			."f_desc='".$_POST["desc"]
			."' where f_id='".$_SESSION["f_id"]."'") or die(mysql_error());
		header("Location:".$_SERVER["PHP_SELF"]."?event=menu_fich");
		break;

	case "update_car":
		mysql_query("update car set "
				."a_patente='".$_POST["patente"]."', "
				."a_vehiculo='".$_POST["vehiculo"]."', "
				."a_titular='".$_POST["titular"]."', "
				."a_telefono='".$_POST["telefono"]
				."' where a_id='".$_SESSION["car"]."'") or die(mysql_error());
		header("Location:".$_SERVER["PHP_SELF"]."?event=menu_fich");
		break;

	case "sel_car":
		$query=mysql_query("select * from car where a_id='".
				$_GET["a_id"]."'")or die(mysql_error());
		
		$_SESSION["new_car"]=0;
		$row=mysql_fetch_array($query,MYSQL_ASSOC);
		$_SESSION["car_tmp"]=$row["a_id"];
		include("inc/ficha/add_datos.php");
		break;

	case "sel_car_busq":
		$query=mysql_query("select * from car where a_id='".
				$_GET["a_id"]."'")or die(mysql_error());
		$_SESSION["new_car"]=0;
		$row=mysql_fetch_array($query,MYSQL_ASSOC);
		include("inc/ficha/ficha_tec.php");
		break;

}