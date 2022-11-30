<link rel="StyleSheet" href="css/forms.css" type="text/css">

<?php
echo "<br>";
echo "<table align=center class=myTable-gray>";
echo "<tr><td class=titulo>MENU PRINCIPAL</td></tr>";

echo "<tr>";
echo "<td valign=bottom><img src=\"iconos/icons/boton4.ico\" border=0>"
	. "<a href=" . $_SERVER["PHP_SELF"] . "?event=menu_fich class=link>"
	. font_color("Ficha Tecnica", "Garamond", "blue") . "</a></td>";
echo "</tr>";

echo "<tr>";
echo "<td valign=bottom><img src=\"iconos/icons/boton4.ico\" border=0>"
	. "<a href=" . $_SERVER["PHP_SELF"] . "?event=current_account>"
	. font_color("Cuenta Corriente", "Garamond", "blue") . "</a></td>";
echo "</tr>";

echo "<tr>";
echo "<td valign=bottom><img src=\"iconos/icons/boton4.ico\" border=0>"
	. "<a href=" . $_SERVER["PHP_SELF"] . "?event=add_user>"
	. font_color("Agregar Usuario", "Garamond", "blue") . "</a></td>";
echo "</tr>";
echo "</table>";
echo "<br>";
?>