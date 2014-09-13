 
        <?php
		 include_once("conexion.php");
 $conexion = new conexion();
 $conexion->conectarDB();
 
		function registrar($nom ,$ape ,$doc ,$email ,$con ,$btn){
		
		if ($nom && $ape && $doc && $email && $con){
			//echo $nom.$ape.$doc.$email.$con;
			//SELECT id, nombre, nickname, email, pass, sexo, foto,
			$sql="INSERT INTO usuario
			(doc_usuario, nom_usuario, ape_usuario, clave, email)
			VALUES 
			('".$doc."','".$nom."','".$ape."','".$con."','".$email."')";
			//echo $sql;
			$dato=mysql_query($sql) or die("La consulta falló:".mysql_error());
			}else if($btn){
				echo "<br><b>campos obligatorios</b></br>";
				}
		}
		?>