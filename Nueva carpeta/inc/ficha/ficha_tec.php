<?php
	global $dat_col;
	global $col;	
	global $tab_color;
	$cont=0;
	$pid="";
	
	$_SESSION["car"]=$row["a_id"];
	
	echo "<center>".font_color_s("FICHA VEHICULAR:")."</center>";
	echo "<br>";
	tab_gral_st();
	
	echo "<table><CENTER><form action=".$_SERVER["PHP_SELF"]." method=POST>";
		echo "<tr><td colspan=4 align=left><b>Datos del Vehiculo:</b></td></tr>";
		echo "<tr></tr><tr></tr><tr></tr>";
		echo "<tr>";
			echo "<td>Patente:</b></td><td><input type=text name=patente".
				" size=30 value=\"".$row["a_patente"]."\"></td>";
			echo "<td>Vehiculo:</B></td><td><input type=text name=vehiculo".
				" size=30 value=\"".$row["a_vehiculo"]."\"></td></tr>";
		echo"<tr>";
			echo "<td>Titular:</B></td><td><input type=text name=titular"
				." size=30 value=\"".$row["a_titular"]."\"></td>";
			echo "<td>Telefono:</B></td><td><input type=text name=telefono".
				" size=30 value=\"".$row["a_telefono"]."\"></td></tr>";
		echo "<tr><th colspan=6 align=right><input type=submit "
			."name=event value=\"Guardar Datos\"></tr>";
	echo "</form></table></td></tr>";
	echo "<tr><td><table algin=left>";
		echo "<tr><td colspan=4 align=left><b>Ficha Tecnica:</b></td></tr>";
echo "<tr></tr><tr></tr><tr></tr>";
	echo"<table align=center>";
		echo"<tr>";
			t_data("<b>FECHA</b>","");
			t_data("<b>DESCRIPCION</b>","");
		echo "</tr>";

	$query=mysql_query("select * from ficha where a_id='".$row["a_id"]."' order by f_fecha desc")
		or die(mysql_error());

	while($row1=mysql_fetch_array($query,MYSQL_ASSOC)){
			(($col%2)==0)?$dat_color=$tab_color[0] :$dat_color=$tab_color[1];							
			echo "<tr>";
				ereg("(....)-(..)-(..)",$row1["f_fecha"],$datearray);
				t_data("<b>"
					.$datearray[3]."/".$datearray[2]."/".$datearray[1]."</b>", $dat_color);
				t_data($row1["f_desc"], $dat_color);
				echo "<th><a href=".$_SERVER["PHP_SELF"]."?event=modif&fecha="
					.$row1["f_fecha"]
					."&f_id=".$row1["f_id"].">"
					.font_color("Modificar","times new roman","blue")."</a></th>";
				echo "<th><a href=".$_SERVER["PHP_SELF"]."?event=del_ficha&fecha="
					.$row1["f_fecha"]
					."&f_id=".$row1["f_id"].">"
					.font_color("Eliminar","times new roman","blue")."</a></th>";

				$col=$col+1;
	}
	echo "</table></td><tr/>";
	tab_gral_end();
?>