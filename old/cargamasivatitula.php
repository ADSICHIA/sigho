<?php session_start();
	include ("controlador/conexion.php");
			$conexion=new conexion();
			$conexion->conectarDB();
			$msg="";
			$action=isset($_POST["action"]) ? $_POST["action"]:NULL;
			$actionS=isset($_SESSION["action"]) ? $_SESSION["action"]:NULL;
			if ($action == "upload" || $actionS == "upload") { 
				$upfil = isset ($_FILES['f_upload']['name']) ? $_FILES['f_upload']['name']:NULL;
				if ($upfil){
					$target_path = "masiva/";
					$target_path = $target_path.basename( $_FILES['f_upload']['name']);
					if(move_uploaded_file($_FILES['f_upload']['tmp_name'], $target_path)){
						$msg.= "\nEl archivo ". basename( $_FILES['f_upload']['name']). " ha sido subido";
					}else{
						$msg.= "\nHa ocurrido un error al cargar el archivo, trate de nuevo!";
					}
				}
			}
			$num_paginas=isset($_SESSION["num_paginas"]) ? $_SESSION["num_paginas"]:NULL;
			if($action){
				$archivo = "masiva/".$_FILES["f_upload"]['name'];
					//echo "Este es el archivo: ".$archivo;
			}else if($actionS){
				$archivo = "masiva/".$_SESSION["archivo"];
				//echo "Este es el archivo: ".$archivo;
			}
			if($archivo!="masiva/"){
					$filas=file($archivo);
					$i=1;
					$_SESSION["num_paginas"]=round(count($filas)/500);
					foreach($filas as $row){
						$ubi=2;
						$datos = explode(";",$row);
						$sql10="SELECT count(cod_titulacion) as cpc FROM titulacion WHERE cod_titulacion='".$datos[4]."'";
						$data10=$conexion->SelectDato($sql10);
						if($data10[0][0]==0){
							$sql11= "insert into titulacion (cod_titulacion, cod_programa, cod_jornada, cod_ubicacion, fecha_ini, 	fecha_fin) values ('".$datos[4]."','".$datos[24]."','".$datos[9]."','".$ubi."','".$datos[12]."','".$datos[13]."')";
							$conexion->insertar($sql11);
						}
						echo "Fila: ".$i."<br/>";
						$i++;
						if($i==500*$_SESSION["num_paginas"]){
							$_SESSION['action']=$_POST["action"];
							break;
						}
						
					}
					echo "<script language='Javascript'>location.href='#'</script>";
			}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<center>
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="#">
<table width="200" border="1">
  <tr>
    <td colspan="3">CARGA DE ARCHIVOS</td>
    
  </tr>
  <tr>
    <td colspan="2">
      <label for="fileField"></label>
      <input type="file" name="f_upload" id="f_upload" />
		<input name="action" type="hidden" value="upload" />
    </td>
    <td><input type="submit" name="button" id="button" value="Submit" /></td>
    
  </tr>
  <tr>
    <td colspan="3"><label id="msg"><?php echo $msg;?></label></td>
   
  </tr>
</table>
   </form>
   </center>
</body>
</html>