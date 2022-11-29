<?php 	
	echo "<center>".font_color_s("FICHA DE TRABAJO:")."</center>";
	echo "<br>";
	tab_gral_st();
?>
<CENTER><form action=<? echo $_SERVER["PHP_SELF"]; ?> method=POST>
	<input type=hidden name=a_id size=30 value="<?php echo $row["a_id"];?>">
	<table>
		<tr><td colspan=4 align=right>Fecha:</b><input type=text name=fecha size=30 
			value=""></td>

		<tr><td>Patente:</b></td><td><input type=text name=patente size=30 
			value="<?php echo $row["a_patente"];?>"></td>
			<td>Vehiculo:</B></td><td><input type=text name=vehiculo size=30 
			value="<?php echo $row["a_vehiculo"];?>"></td></tr>
		<tr><td>Titular:</B></td><td><input type=text name=titular size=30 
			value="<?php echo $row["a_titular"];?>"></td>
			<td>Telefono:</B></td><td><input type=text name=telefono size=30 
			value="<?php echo $row["a_telefono"];?>"></td></tr>
	
		<tr valign=top>	<td>Descripcion:</td>
			<td colspan=4 ><textarea rows=6 cols=56 name=desc 
			value="<?php echo $row["a_desc"]; ?>"></textarea></td></tr>

		<tr><th colspan=6 align=right><input type=submit name=event value=Almacenar>
	</form></CENTER>
	</table>
<?php	tab_gral_end();	?>

