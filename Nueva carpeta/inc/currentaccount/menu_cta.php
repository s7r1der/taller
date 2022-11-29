<?php
	echo "<center>".font_color_s("MENU DE MANEJO CUENTA CORRIENTE")."</center>";
	echo "<br>";
	echo "<table align=center>";
	echo "<tr>";
		echo "<td valign=bottom><img src=\"iconos/icons/boton4.ico\" border=0>"
		."<a href=".$_SERVER["PHP_SELF"]."?event=busq_cta>".font_color(" Agregar a cuenta corriente")."</a></td>";
	echo "</tr><tr>";
		echo "<td valign=bottom><img src=\"iconos/icons/boton4.ico\" border=0>"
		."<a href=".$_SERVER["PHP_SELF"]."?event=busq_estado>".font_color(" Ver estado de cuenta")."</a></td>";
	echo"</tr>";
	echo "</table>";
	echo "<br>";
?>