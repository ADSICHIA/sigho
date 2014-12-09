<?php
include ("modelo/mprocompetencia.php");
$ins = new mprocompetencia;
$action = isset($_POST["action"]) ? $_POST["action"]:NULL;
$actionS = isset($_SESSION["action"]) ? $_SESSION["action"]:NULL;
$np = isset($_SESSION["np"]) ? $_SESSION["np"]:NULL;
$archises = isset($_SESSION["archisesivo"]) ? $_SESSION["archivo"]:NULL;

if (($action == "upload" || $actionS == "upload")) { 
	$upfil = isset ($_FILES['archivo']['name']) ? $_FILES['archivo']['name']:NULL;
	if ($upfil){
		$tamano = $_FILES["archivo"]['size']; 
		$tipo = $_FILES["archivo"]['type']; 
		$target_path = "archivos/";
		$target_path = $target_path.basename($upfil);
		if(move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)){
			echo "<script type='text/javascript'>alert('El archivo se ha cargado correctamente. Vamos a iniciar el proceso de carga a la base de datos.');</script>";
		}else{
			echo "Ha ocurrido un error al cargar el archivo, trate de nuevo!";
		}
	}
	if($action){
		$archivo = "archivos/".$upfil;
	}else if($actionS){
		$archivo = "archivos/".$archises;
	}

	if($archivo!="archivos/"){
		echo "<br /><br /><img src='image/precarga.gif' width='64' height='64' />";
		$filas=file($archivo);
		// iniciamos contador y la fila a cero
		$numero_fila=0;
		$nfilas= count($filas);
		// mientras exista una fila	
		echo "<br /><br /><br />";
		$cantin=100;
		$npag=round($nfilas/$cantin);
		$faltante=$nfilas-$cantin*$npag;
		if($faltante>0){
			$npag=$npag+1;
		}

		if($action){
			$np=1;
			$i=1;
		}else{
			$i=$cantin*($np-1);
		}
		if ($np==$npag){
			$fin=$cantin*($np-1)+$faltante;
		}else if ($np<$npag){
			$fin=($cantin*$np);
		}
		echo round($fin*100/$nfilas)."% - ".$fin." de ".$nfilas." Registros insertados aproximadamente.";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		echo "<br><br><br>";
		while($i<$fin){
			$row = $filas[$i];
			$datos = explode(";",$row);
			$i++;
			$numero_fila++;
			//echo $datos[24]." - ".$datos[26]." - ".$datos[25]."<br>";
			$data6 = $ins->selcompe($datos[0]);
			if($data6[0]["cp"]==0){
				$ins->inscom($datos[0],$datos[1],$datos[2],$datos[3],$datos[4]);
			}else{
				$ins->updcom($datos[0],$datos[1],$datos[2],$datos[3],$datos[4]);
			}
			
			$data9 = $ins->selres($datos[5]);
		
			if($data9[0]["cp"]==0){
				//$ins->insfic($idficha, $fecha_inicio, $fecha_fin, $oferta, $programaid, $jornadaid, $cant_aprendices);
				$ins->insres($datos[5],$datos[4],$datos[0]);
			}else{
				$ins->updres($datos[5],$datos[4],$datos[0]);
			}
		}
		$np=$np+1;
		if($action){
			$_SESSION['action'] = $action;
			$_SESSION['archivo'] = $upfil;
		}else if($actionS){
			$_SESSION['action']=$_SESSION["action"];
			$_SESSION['archivo']=$_SESSION["archivo"];
			if (($np-1)==$npag){
				/*
				$_SESSION["user"] = $datosUsuario[0]['nombres']." ".$datosUsuario[0]['apellidos'];
			$_SESSION["idUser"] = $datosUsuario[0]['idusuario'];
			$_SESSION["documento"] = isset($datosUsuario[0]['identificacion']) ? $datosUsuario[0]['identificacion']:NULL;
			$_SESSION["perfil"] = isset($datosUsuario[0]['perfilid']) ? $datosUsuario[0]['perfilid']:NULL;
			$_SESSION["autentificado"]= 10;
				*/
				
				$usr=$_SESSION["user"];
				$idu=$_SESSION["documento"];
				$per=$_SESSION["perfil"];
				session_destroy();
				session_start();
				$_SESSION["user"] = $usr;
				$_SESSION["documento"] = $idu;
				$_SESSION["perfil"] = $per;
				$_SESSION["autentificado"]= 10;
			}
		}
		$_SESSION['np']=$np;
			echo "<script language='Javascript'>location.href='home.php?pac=808';</script>";
	}
 }
?>