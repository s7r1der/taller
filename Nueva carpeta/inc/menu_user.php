<?php
	echo "<center>".font_color_s("MENU PRINCIPAL")."</center>";
	echo "<br>";
	echo "<table align=center>";
		echo "<tr>";
			echo "<td valign=bottom><img src=\"iconos/icons/boton4.ico\" border=0>"
			."<a href=".$_SERVER["PHP_SELF"]."?event=menu_fich>"
			.font_color("Ficha Tecnica")."</a></td>";
		echo "</tr>";

		echo "<tr>";
			echo "<td valign=bottom><img src=\"iconos/icons/boton4.ico\" border=0>"
			."<a href=".$_SERVER["PHP_SELF"]."?event=current_account>"
			.font_color("Cuenta Corriente")."</a></td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td valign=bottom><img src=\"iconos/icons/boton4.ico\" border=0>"
			."<a href=".$_SERVER["PHP_SELF"]."?event=add_user>"
			.font_color("Agregar Usuario")."</a></td>";
		echo "</tr>";
	echo "</table>";
	echo "<br>";
?>