<?php
	if(isset($_GET["event"])){	//GET
	
		if(substr($_GET["event"],0,3)!="nh_")include("inc/header.php");

		switch($_GET["event"]){

		//General Functions

			case "nh_atras":
				header("Location:".$_SERVER["PHP_SELF"]."?event=menu_user");
				break;
			case "logout":
				if(session_id()){
					session_unset();
					session_destroy();
				}
				login_form();
				break;

			case "menu_user": 		include("inc/menu_user.php");				break;

		//Get Ficha Functions

			case "menu_fich": 		include("inc/ficha/menu_fich.php");		break;
			case "busq_add":		include("inc/ficha/busq_add.php");			break;
			case "busq_verif":		include("inc/ficha/busq_verif.php");		break;		
			case "sel_car":
				$_SESSION["action"]="sel_car";
				include("inc/ficha/res_ficha.php");
				break;
			case "sel_car_busq":
				$_SESSION["action"]="sel_car_busq";
				include("inc/ficha/res_ficha.php");
				break;
			case "modif":
				$_SESSION["action"]="modif";
				include("inc/ficha/res_ficha.php");
				break;
			
			case "del_ficha":
				mysql_query("delete from ficha"
				." where f_fecha='".$_GET["fecha"]."'"
				." AND f_id='".$_GET["f_id"]."'") or die(mysql_error());
					
				header("Location:".$_SERVER["PHP_SELF"]."?event=menu_fich");
				break;

			case "del_cta":
				mysql_query("delete from cta"
				." where cta_fecha='".$_GET["fecha"]."'"
				." AND cta_id='".$_GET["cta_id"]."'") or die(mysql_error());
					
				header("Location:".$_SERVER["PHP_SELF"]."?event=current_account");
				break;
		
		//Get Current Account Functions

			case "current_account":	include("inc/currentaccount/menu_cta.php");			break;
			case "busq_cta":		include("inc/currentaccount/busq_add.php");			break;
			case "busq_estado":		include("inc/currentaccount/busq_estado.php");		break;
			case "sel_client":
				$_SESSION["action"]="sel_client";
				include("inc/currentaccount/res_cta.php");
				break;
			case "sel_client_busq":
				$_SESSION["action"]="sel_client_busq";
				include("inc/currentaccount/res_cta.php");
				break;
			case "modif_cta":
				$_SESSION["action"]="modif_cta";
				include("inc/currentaccount/res_cta.php");
				break;
		//Add User Functions
		
			case "add_user":
				tab_gral_st();
				include("inc/adduser/login_form.php");	
				tab_gral_end();
				break;
			
		}if(substr($_GET["event"],0,3)!="nh_")include("inc/footer.php");

	}elseif(isset($_POST["event"])){ //POST
		
		if(substr($_POST["event"],0,3)!="nh_")include("inc/header.php");
	
		switch($_POST["event"]){
			
			//Post Ficha Functions
			
			case "Ingresar":
				$_SESSION["action"]="insert_ficha";
				include("inc/ficha/res_ficha.php");
				break;

			case "Buscar":
				$_SESSION["action"]="look_ficha";
				include("inc/ficha/res_ficha.php");
				break;
			
			case "Almacenar":
				$_SESSION["action"]="store_ficha";
				include("inc/ficha/res_ficha.php");
				break;

			case "Modificar":
				$_SESSION["action"]="update_ficha";
				include("inc/ficha/res_ficha.php");
				break;
			
			case "Guardar Datos":
				$_SESSION["action"]="update_car";
				include("inc/ficha/res_ficha.php");
				break;
			
			//Post Add User Functions
			
			case "Insertar":
				$_SESSION["action"]="insert_user";
				include("inc/adduser/res_insertion.php");
				break;

			//Post Current Account Functions
			
			case "Agregar":
				$_SESSION["action"]="insert_cta";
				include("inc/currentaccount/res_cta.php");
				break;

			case "Agregar a cuenta":
				$_SESSION["action"]="store_cta";
				include("inc/currentaccount/res_cta.php");
				break;
			
			case "Buscar cuenta":
				$_SESSION["action"]="look_cta";
				include("inc/currentaccount/res_cta.php");
				break;

			case "Modificar Cuenta":
				$_SESSION["action"]="update_cta";
				include("inc/currentaccount/res_cta.php");
				break;
			
			case "Guardar Modificacion":
				$_SESSION["action"]="update_client";
				include("inc/currentaccount/res_cta.php");
				break;


		}if(substr($_POST["event"],0,3)!="nh_")include("inc/footer.php");
	}
?>