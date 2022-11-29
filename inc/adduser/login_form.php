<CENTER>
<FORM action=<?php echo $_SERVER["PHP_SELF"]; ?> method="POST">
	<center><b>Agregar de Usuario</b>
	<table><tr>
		<td><p>Nombre Usuario:</p></td>
		<td><input type=text name=usr><td>
	</tr><tr>
		<td><p>Contraseña:</p></td>
		<td><input type=password name=passwd></td>
	</tr><tr>
		<td><p>Comprobacion Contraseña:</p></td>
		<td><input type=password name=passwd1></td>
		<td></td>
	</tr><tr>
		<td colspan=2><p align=RIGHT><input type=submit name="event" value="Insertar"></p></td>	
	</tr></table>
	</td></tr>
	</table>
</FORM>
</CENTER>