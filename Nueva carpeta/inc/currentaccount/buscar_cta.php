<?php 	
	echo "<center>".font_color_s("BUSQUEDA DE CLIENTE SEGUN NOMBRE:")."</center>";
	echo "<br>";
	tab_gral_st();
?>
<CENTER><form action=<? echo $_SERVER["PHP_SELF"]; ?> method=POST>
	<table>
		<tr>	<td colspan=3 >Nombre:</td><td><input type=text name=dato></td></tr>
