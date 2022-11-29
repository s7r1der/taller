<?php
	//si especif. un param optional, debo esp. todos a la izq.
	function t_data($content, $bgcolor="#ffffff",$align="center"){
		echo "<td NOWRAP align=".$align." bgcolor=".$bgcolor."><font color=black>".$content."</font></td>";
	}
	
	function t_link($dest,$capt){
		return "<a href=\"$dest\">$capt</a>";
	}

	function font_color($content,$face="Garamond", $fontcolor="#33FF00"){
		return "<b><font color=".$fontcolor." face=".$face.">".$content."</font></b>";
	}
	function font_color_s($content){
		return "<b><font color=white>".$content."</font></b>";
	}
	function tab_gral_st($size="", $border=3, $bgcolor="#E4E4E4", $bordercolor="#0000CC", $path="iconos/background/image1.gif"){
			echo "<center><table border=".$border." bgcolor=".$bgcolor." width=".$size
				." bordercolor=".$bordercolor." background=".$path."><tr><td>";
	}

	function tab_gral_end(){
		return  "</td></tr></table></center>";
	}

	function dat_add_end(){
	    return  "<td colspan=3 align=right></td><td><p align=right>"
					."<input type=\"submit\" name=\"event\" value=\"Agregar\">"
					."<input type=\"submit\" name=\"event\" value=\"Cancelar\"></p></td></tr>"
				."</table></CENTER>"
			."</form>";
	}
	function dat_upd_end(){
		echo  "<td colspan=4 align=right><p align=right>"
					."<input type=\"submit\" name=\"event\" value=\"Guardar\">"
					."<input type=\"submit\" name=\"event\" value=\"Cancelar\"></p></td></tr>"
				."</table></CENTER>"
			."</form>";
	}

	$tab_color[0]="#006eaa";
	$tab_color[1]="#8888ff";//96e6";
	$tab_color[2]="#dd6666";
	$tab_color[3]="#ff6666";
?>