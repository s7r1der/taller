<link rel="StyleSheet" href="css/forms.css" type="text/css">

<?php
	echo "<table align=center class=myTable-gray>";

	echo "<tr><td class=titulo>MENU FICHA DE TRABAJO</td></tr>";

	echo "<tr>";
		echo "<td valign=bottom><img src=\"iconos/icons/boton4.ico\" border=0>"
		."<a href=".$_SERVER["PHP_SELF"]."?event=busq_add>"
		.font_color(" Agregar datos","Garamond","blue")."</a></td>";
	echo "</tr><tr>";
		echo "<td valign=bottom><img src=\"iconos/icons/boton4.ico\" border=0>"
		."<a href=".$_SERVER["PHP_SELF"]."?event=busq_verif>"
		.font_color(" Verificar datos","Garamond","blue")."</a></td>";
	echo"</tr>";
	echo "</table>";
	echo "<br>";
?>