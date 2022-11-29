<?php 	
	echo "<center>".font_color_s("MODIFICACION DE CUENTA")."</center>";
	echo "<br>";
	tab_gral_st();
?>
<form action=<? echo $_SERVER["PHP_SELF"]; ?> method=POST>
<table>
	<tr>
		<td align=right colspan=2>Fecha: </b><input type=text name=fecha size=25 
		value="<?php 
			ereg("(....)-(..)-(..)",$row["cta_fecha"],$datearray);
			echo $datearray[3]."/".$datearray[2]."/".$datearray[1];
		?>"></td></tr>


		<tr valign=top>	<td>Descripcion:</td><td><textarea rows=3 cols=45 name=desc><?php echo $row["cta_desc"];?></textarea><p></td>
				</td></tr>
		<tr><td>Importe:</td>
		<td align=right><select name=debehaber>
			<option name=opt1>a cuenta
			<option name=opt2>pagá
<?php
		if($row["cta_debe"]==0){
			echo"<option name=opt1 selected>a cuenta";
			$opt=1;
		}else{
			echo"<option name=opt2 selected>pagá";
			$opt=0;
		}
?>
		</select> $ <input type=text name=importe size=10 
		value="<?php if($opt==0){ echo $row["cta_debe"];}else{echo $row["cta_haber"];}?>
			"></td></tr>
		<tr><th colspan=5 align=right><input type=submit name=event value="Modificar Cuenta">

</table></form>
<?php 	tab_gral_end();?>
