<?php
switch ($_SESSION["action"]) {

	case "modif_cta":
		$_SESSION["cta_id"] = $_GET["cta_id"];
		$query = mysql_query("select * from cta where cta_id='" .
			$_GET["cta_id"] . "' and cta_fecha='" . $_GET["fecha"] . "'") or die(mysql_error());

		while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
			include("inc/currentaccount/modif.php");
		}
		break;

	case "insert_cta":
		if ($_POST["dato"] == "") {
			$query = mysql_query("select * from client where c_name='" .
				$_POST["dato"] . "'") or die(mysql_error());
		} else {
			$query = mysql_query("select * from client where c_name like '%"
				. $_POST["dato"] . "%'") or die(mysql_error());
		}

		if (mysql_num_rows($query) == 1) {
			$_SESSION["new_client"] = 0;
			$row = mysql_fetch_array($query, MYSQL_ASSOC);
			$_SESSION["cl_tmp"] = $row["c_id"];
			include("inc/currentaccount/add_datos.php");
		} elseif (mysql_num_rows($query) == 0) {
			$_SESSION["new_client"] = 1;
			$row["c_id"] = "";
			$row["c_name"] = $_POST["dato"];
			$row["c_dir"] = $row["c_telefono"] = "";
			include("inc/currentaccount/add_datos.php");
		} else {
			echo "<center>" . font_color_s("SELECCION DE CLIENTE:") . "</center>";
			echo "<br>";
			tab_gral_st();
			echo "<table>";
			echo "<tr><td><b>Nombre - Direccion</b></td></tr>";
			while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
				echo "<tr><td>" . $row["c_name"] . " - " . $row["c_dir"] . "</td>";
				echo "<th><a href=" . $_SERVER["PHP_SELF"] . "?event=sel_client&c_id="
					. $row["c_id"] . ">" . font_color("Seleccionar", "times new roman", "blue") . "</a></th></tr>";
			}
			echo "</table>";
			tab_gral_end();
		}
		break;

	case "look_cta":
		if ($_POST["dato"] == "") {
			$query = mysql_query("select * from client where c_name='" .
				$_POST["dato"] . "'") or die(mysql_error());
		} else {
			$query = mysql_query("select * from client where c_name like '%"
				. $_POST["dato"] . "%'") or die(mysql_error());
		}

		if (mysql_num_rows($query) == 1) {
			$row = mysql_fetch_array($query, MYSQL_ASSOC);
			include("inc/currentaccount/currentaccount.php");
		} elseif (mysql_num_rows($query) == 0) {
			echo "<center><font color=\"white\"><b>"
				. "No se ha encontrado ningun cliente con ese nombre.<br>"
				. "Repita la operacion, y verifique el nombre";
		} else {
			echo "<center>" . font_color_s("SELECCION DE CLIENTE:") . "</center>";
			echo "<br>";
			tab_gral_st();
			echo "<table>";
			echo "<tr><td><b>Nombre - Direccion</b></td></tr>";
			while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
				echo "<tr><td>" . $row["c_name"] . " - " . $row["c_dir"] . "</td>";
				echo "<th><a href=" . $_SERVER["PHP_SELF"] . "?event=sel_client_busq&c_id="
					. $row["c_id"] . ">" . font_color("Seleccionar", "times new roman", "blue") . "</a></th></tr>";
			}
			echo "</table>";
			tab_gral_end();
		}
		break;

	case "store_cta":

		if (strlen($_POST["fecha"]) == 8)
			ereg("(..)/(..)/(..)", $_POST["fecha"], $datearray);
		elseif (strlen($_POST["fecha"]) == 10)
			ereg("(..)/(..)/(....)", $_POST["fecha"], $datearray);
		elseif (strlen($_POST["fecha"]) == 0) {
			echo "<center><font color=\"white\"><b>"
				. "No es posible registrar dicha operacion. Fecha incorrecta.<br>"
				. "Repita la operacion";
			break;
		}

		if ($_SESSION["new_client"] == 1) {
			if ($_POST["nombre"] == "" and $_POST["direccion"] == "" and $_POST["telefono"] == "") {
				echo "<center><font color=\"white\"><b>"
					. "No es posible registrar dicha operacion.<br>"
					. "Repita la operacion";
				header("Location:" . $_SERVER["PHP_SELF"] . "?event=current_account");
			} else {
				mysql_query("insert into client values('','"
					. $_POST["nombre"] . "','"
					. $_POST["direccion"] . "','"
					. $_POST["telefono"] . "')") or die(mysql_error());
			}
		} else {
			mysql_query("update client set "
				. "c_name='" . $_POST["nombre"] . "', "
				. "c_dir='" . $_POST["direccion"] . "', "
				. "c_telefono='" . $_POST["telefono"]
				. "' where c_id='" . $_POST["c_id"] . "'") or die(mysql_error());
		}

		if ($_POST["debehaber"] == "a cuenta") {
			$option = "'','" . $_POST["importe"] . "', ";
		} else {
			$option = "'" . $_POST["importe"] . "','', ";
		}

		$query = mysql_query("select c_id from client where c_name='"
			. $_POST["nombre"] . "' and c_telefono='" . $_POST["telefono"] . "'")
			or die(mysql_error());

		if ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {

			mysql_query("insert into cta values('',"
				. "'" . $row["c_id"] . "', "
				. "'" . $_POST["desc"] . "', "
				. $option
				. "'" . $datearray[3] . "-" . $datearray[2] . "-" . $datearray[1] . "')") or die(mysql_error());
		}
		header("Location:" . $_SERVER["PHP_SELF"] . "?event=current_account");
		break;


	case "update_cta":
		if ($_POST["debehaber"] == "a cuenta") {
			$option = "cta_haber='" . $_POST["importe"] . "', cta_debe='0', ";
		} else {
			$option = "cta_debe='" . $_POST["importe"] . "', cta_haber='0', ";
		}

		if (strlen($_POST["fecha"]) == 8)
			ereg("(..)/(..)/(..)", $_POST["fecha"], $datearray);
		elseif (strlen($_POST["fecha"]) == 10)
			ereg("(..)/(..)/(....)", $_POST["fecha"], $datearray);
		elseif (strlen($_POST["fecha"]) == 0) {
			echo "<center><font color=\"white\"><b>"
				. "No es posible registrar dicha operacion. Fecha incorrecta.<br>"
				. "Repita la operacion";
			break;
		}

		mysql_query("update cta set "
			. "cta_fecha='" . $datearray[3] . "-" . $datearray[2] . "-" . $datearray[1] . "', "
			. $option
			. "cta_desc='" . $_POST["desc"]
			. "' where cta_id='" . $_SESSION["cta_id"] . "'") or die(mysql_error());
		header("Location:" . $_SERVER["PHP_SELF"] . "?event=current_account");
		break;

	case "update_client":
		mysql_query("update client set "
			. "c_name='" . $_POST["nombre"] . "', "
			. "c_dir='" . $_POST["direccion"] . "', "
			. "c_telefono='" . $_POST["telefono"]
			. "' where c_id='" . $_SESSION["cliente"] . "'") or die(mysql_error());
		header("Location:" . $_SERVER["PHP_SELF"] . "?event=current_account");
		break;

	case "sel_client":
		$query = mysql_query("select * from client where c_id='" .
			$_GET["c_id"] . "'") or die(mysql_error());

		$_SESSION["new_client"] = 0;
		$row = mysql_fetch_array($query, MYSQL_ASSOC);
		$_SESSION["cl_tmp"] = $row["c_id"];
		include("inc/currentaccount/add_datos.php");
		break;

	case "sel_client_busq":
		$query = mysql_query("select * from client where c_id='" .
			$_GET["c_id"] . "'") or die(mysql_error());
		$row = mysql_fetch_array($query, MYSQL_ASSOC);
		include("inc/currentaccount/currentaccount.php");
		break;
}
