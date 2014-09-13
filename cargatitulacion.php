<link href="images/estilos.css" rel="stylesheet" type="text/css" />

<center>
        <form action="" method="post" enctype="multipart/form-data">
        	<span class="TextoTitulo">INGRESO MASIVO P4</span><br/><br/><br/>
            <center><b>Por favor primero seleccione el archivo P4 </b>
            <center><b>y despu&eacute;s cargue el archivo :</b>  </br></br>
            <input name="archivo" type="file" size="35" />
            <input name="enviar" type="submit" value="Cargar Archivos" />
            <input name="action" type="hidden" value="upload" />
            <img src="../images/precarga.gif" width="1" height="1">
        <?php
			//session_start();
			// archivo txt
			include ("controlador/conexion.php");
			$conexion=new conexion();
			$conexion->conectarDB();
			
			$action=isset($_POST["action"]) ? $_POST["action"]:NULL;
			$actionS=isset($_SESSION["action"]) ? $_SESSION["action"]:NULL;
			if ($action == "upload" || $actionS == "upload") { 

	$upfil = isset ($_FILES['archivo']['name']) ? $_FILES['archivo']['name']:NULL;
	if ($upfil){
		$target_path = "masiva/";
		$target_path = $target_path.basename( $_FILES['archivo']['name']);
		if(move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)){
			//echo "El archivo ". basename( $_FILES['upldf']['name']). " ha sido subido";
		}else{
			echo "Ha ocurrido un error al cargar el archivo, trate de nuevo!";
		}
	}
				$np=isset($_SESSION["np"]) ? $_SESSION["np"]:NULL;
				//echo "Este es el np: ".$np;
				// obtenemos los datos del archivo 
				//$tamano = $_FILES["archivo"]['size']; 
				//$tipo = $_FILES["archivo"]['type']; 
				if($action){
					$archivo = "masiva/".$_FILES["archivo"]['name'];
					//echo "Este es el archivo: ".$archivo;
				}else if($actionS){
					$archivo = "masiva/".$_SESSION["archivo"];
					//echo "Este es el archivo: ".$archivo;
				}
				//$prefijo = substr(md5(uniqid(rand())),0,6); 
				//echo $archivo."<br><br>";
				
		if($archivo!="masiva/"){
				echo "<br /><br /><img src='images/precarga.gif' width='64' height='64' />";
				$filas=file($archivo);
				// iniciamos contador y la fila a cero
				
				$numero_fila=0;
				$nfilas= count($filas);
				// mientras exista una fila	
			?>
        <br /><br /><br />
          <?php
		  
          //while($i<$nfilas){
			  $cantin=815;
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
			   echo round($fin*100/$nfilas)."% - ".$fin." de ".$nfilas." Insertados apr&oacute;ximadamente.";
			   //echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
			   //echo "<br><br><br>";
		  while($i<$fin){
			  		//echo $i." de ".$nfilas." Insertados aproximadamente.";
					// incremento contador de la fila
					$row = $filas[$i];
					// genero array por medio del separador "," que es el que tiene el archivo txt
					$datos = explode(",",$row);
					// incrementamos contador
					$i++;
					$numero_fila++;

					$ubi=2;
					// Inserta Titulacion
					$sql10="SELECT count(cod_titulacion) as cpc FROM titulacion WHERE cod_titulacion='".$datos[4]."'";
					$data10=$conexion->SelectDato($sql10);
					if($data10[0][0]==0){
						$sql11= "insert into titulacion (cod_titulacion, cod_programa, cod_jornada, cod_ubicacion, fecha_ini, fecha_fin) values ('".$datos[4]."','".$datos[24]."','".$datos[9]."','".$ubi."','".$datos[12]."','".$datos[13]."')";
						$conexion->insertar($sql11);
					}

				}
					//session_start();
					$np=$np+1;
					if($action){
						$_SESSION['action']=$_POST["action"];
						$_SESSION['archivo']=$_FILES["archivo"]['name'];
					}else if($actionS){
						$_SESSION['action']=$_SESSION["action"];
						$_SESSION['archivo']=$_SESSION["archivo"];
						if (($np-1)==$npag){
			  				$usr=$_SESSION["user"];
							$idu=$_SESSION["idUser"];
			  				session_destroy();
							echo "<font style='font-size:1px;' color='#FFFFFF'>";
							session_start();
							echo "</font>";
							$_SESSION["user"] = $usr;
							$_SESSION["idUser"] = $idu;
							$_SESSION["autentificado"]= 10;
			  			}
					}
					$_SESSION['np']=$np;
					//$_POST['action1']=$_POST["action"];
					//$_POST['archivo1']=$_POST["archivo"];
					//echo $nfilas;
					//echo "<script language='Javascript'>location.href='home.php?pac=1199';</script>";
		  }
				}
			?>
</form>
</center>