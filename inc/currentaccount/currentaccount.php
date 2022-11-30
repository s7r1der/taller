<?php
	global $dat_col;
	global $col;	
	global $tab_color;
	$cont=0;
	$pid="";
	$_SESSION["cliente"]=$row["c_id"];

	echo "<center>".font_color_s("CUENTA CORRIENTE:")."</center>";
	echo "<br>";
	tab_gral_st();
	
	echo "<table><CENTER><form action=".$_SERVER["PHP_SELF"]." method=POST>";
		echo "<tr><td colspan=4 align=left><b>Datos del Cliente:</b></td></tr>";
		echo "<tr></tr><tr></tr><tr></tr>";
		echo "<tr>";
			echo "<td>Nombre:</b></td><td><input type=text name=nombre".
				" size=30 value=\"".$row["c_name"]."\"></td>";
			echo "<td>Telefono:</B></td><td><input type=text name=telefono".
				" size=30 value=\"".$row["c_telefono"]."\"></td></tr>";
		echo"<tr>";
			echo "<td>Direccion:</B></td><td colspan=3><input type=text name=direccion"
				." size=75 value=\"".$row["c_dir"]."\"></td>";
		echo "<tr><th colspan=6 align=right><input type=submit "
			."name=event value=\"Guardar Modificacion\"></tr>";
	echo "</form></table></td></tr>";
	
	echo "<tr><td><table algin=left>";
		echo "<tr><td colspan=4 align=left><b>Detalle de Operaciones:</b></td></tr>";
		echo "<tr></tr><tr></tr><tr></tr>";
	
	echo"<table align=center>";
		echo"<tr>";
			t_data("<b>FECHA</b>","");
			t_data("<b>DESCRIPCION</b>","");
			t_data("<b>DEBE</b>","");
			t_data("<b>HABER</b>","");
		echo "</tr>";

		$query=mysql_query("select cta_fecha, cta_debe, cta_haber, cta_desc, c_id, cta_id "
			."from cta where c_id='".$row["c_id"]."' order by cta_fecha asc")
			or die(mysql_error());

		while($row1=mysql_fetch_array($query,MYSQL_ASSOC)){
			(($col%2)==0)?$dat_color=$tab_color[0] :$dat_color=$tab_color[1];							
			
			echo "<tr>";
				ereg("(....)-(..)-(..)",$row1["cta_fecha"],$datearray);
				t_data("<b>"
					.$datearray[3]."/".$datearray[2]."/".$datearray[1]."</b>", $dat_color);
				t_data($row1["cta_desc"], $dat_color);
				t_data("<b>".$row1["cta_debe"]."</b>", $dat_color);
				t_data("<b>".$row1["cta_haber"]."</b>", $dat_color);
				echo "<th><a href=".$_SERVER["PHP_SELF"]."?event=modif_cta&fecha="
					.$row1["cta_fecha"]
					."&cta_id=".$row1["cta_id"].">"
					.font_color("Modificar","times new roman","blue")."</a></th>";
				echo "<th><a href=".$_SERVER["PHP_SELF"]."?event=del_cta&fecha="
					.$row1["cta_fecha"]
					."&cta_id=".$row1["cta_id"].">"
					.font_color("Eliminar","times new roman","blue")."</a></th></tr>";
				$col=$col+1;;
		}
	
		$query1=mysql_query("select sum(cta_debe) as debe, sum(cta_haber) as haber "
		."from cta where c_id='".$row["c_id"]."' group by c_id")or die(mysql_error());
		$row2=mysql_fetch_array($query1,MYSQL_ASSOC);
		
		echo "<tr>";
			echo"<td align=right colspan=2>TOTALES: </td>";
			echo "<td align=center>$".number_format($row2["debe"],2)."</td>";
			echo "<td align=center>$".number_format($row2["haber"],2)."</td></tr>";
			echo"<td align=right colspan=2>SALDO: </td>";
			$saldo=$row2["debe"]-$row2["haber"];
			$saldo=number_format($saldo,2);
			if($row2["debe"]>$row2["haber"]){
				echo "<td align=center>$".$saldo."</td>";
			}else{
				echo "<td></td><td align=center>$".$saldo."</td>";
			}
	echo "</table></td><tr/>";
	tab_gral_end();
