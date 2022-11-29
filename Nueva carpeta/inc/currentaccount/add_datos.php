<?php 	
	echo "<center>".font_color_s("FICHA DE CUENTA CORRIENTE:")."</center>";
	echo "<br>";
	tab_gral_st();
?>
<CENTER><form action=<? echo $_SERVER["PHP_SELF"]; ?> method=POST>

	<table>
		<tr><td colspan=3 align=right>Fecha:</b><input type=text name=fecha size=30 
			value=""></td>
	
		<tr><td>Nombre:</b></td><td><input type=text name=nombre size=30 
			value="<?php echo $row["c_name"];?>"></td></tr>
		<tr><td>Telefono:</B></td><td><input type=text name=telefono size=30 
			value="<?php echo $row["c_telefono"];?>"></td></tr>
			<td>Direccion:</B></td><td><input type=text name=direccion size=30 
			value="<?php echo $row["c_dir"];?>"></td></tr>
		<tr valign=top>	<td>Descripcion:</td>
			<td colspan=2 ><textarea rows=3 cols=22 name=desc 
			value="<?php echo $row["cta_desc"]; ?>"></textarea></td></tr>
		<tr>
			<td>Importe:</td>
			<td align=right><select name=debehaber>
					<option name=opt1>a cuenta
					<option name=opt2>pagá
			</select>
			$ <input type=text name=importe size=10></td></tr>

		<tr><th colspan=2 align=right><input type=submit name=event value="Agregar a cuenta">
	</table>
</form></CENTER>
<?php	tab_gral_end();	?>