<?php
	echo "<center>".font_color_s("MENU DE FICHA DE TRABAJO")."</center>";
	echo "<br>";
	echo "<table align=center>";
	echo "<tr>";
		echo "<td valign=bottom><img src=\"iconos/icons/boton4.ico\" border=0>"
		."<a href=".$_SERVER["PHP_SELF"]."?event=busq_add>".font_color(" Agregar datos")."</a></td>";
	echo "</tr><tr>";
		echo "<td valign=bottom><img src=\"iconos/icons/boton4.ico\" border=0>"
		."<a href=".$_SERVER["PHP_SELF"]."?event=busq_verif>".font_color(" Verificar datos")."</a></td>";
	echo"</tr>";
	echo "</table>";
	echo "<br>";
?>