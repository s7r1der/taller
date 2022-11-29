<?php 	
echo "<center>".font_color_s("MODIFICACION DE FICHA	")."</center>";
	echo "<br>";
	tab_gral_st();

echo "<form action=".$_SERVER["PHP_SELF"]." method=POST>";
?>
<table>
	<tr>
		<td align=right colspan=2>Fecha: </b><input type=text name=fecha size=30 
		value="<?php ereg("(....)-(..)-(..)",$row["f_fecha"],$datearray);
			echo $datearray[3]."/".$datearray[2]."/".$datearray[1];
		?>"></td></tr>
		<tr valign=top>	<td>Descripcion:</td><td><textarea rows=3 cols=50 name=desc><?php echo $row["f_desc"];?></textarea><p></td>
				</td></tr>
		<tr><th colspan=5 align=right><input type=submit name=event value="Modificar">	
</table></form>
<?php 	tab_gral_end();?>