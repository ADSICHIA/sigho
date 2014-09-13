<?php include_once("modelo/conexion.php");
$conexion = new conexion();
 $conexion->conectarDB();
 
 function validacion_envio($btn, $doc){
	 if($btn){
	 if($doc){
			$sql="SELECT * FROM usuario WHERE doc_usuario = '".$doc."'";
			//echo $sql;
			$result=mysql_query($sql) or die("Error al ejecutar la consulta");
			 $row=mysql_fetch_array($result);
			 $correo=$row[4];
			
			 $newcont= RandomString(16,TRUE,TRUE); 
			//echo $newcont;
			$desde="FROM:"."SIGHO";
			$asunto="Cambio De Clave De Acceso SIGHO Sena";
			$mensaje ="Por Olvido De su clave, Usted realizo la asignacion de una nueva contraseña para el ingreso a www.sigho.com 				Su nueva contraseña es: ".$newcont;
			mail($correo,$asunto,$mensaje,$desde);
			$sql1="UPDATE `usuario` SET clave='".$newcont."' WHERE doc_usuario='".$doc."'";
			//echo $sql1;
			$result1=mysql_query($sql1) or die("Error al ejecutar la consulta");
			echo "<script languaje='javascript'>alert('Correo Enviado A: .$correo')</script>";
		}else{
		echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
		echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
		die();
		}
 }
 }

function RandomString($length=10,$uc=TRUE,$n=TRUE){	
			    $source = 'abcdefghijklmnopqrstuvwxyz';
    			if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    			if($n==1) $source .= '1234567890';
    			if($length>0){
        		$rstr = "";
        		$source = str_split($source,1);
        			for($i=1; $i<=$length; $i++){
           			mt_srand((double)microtime() * 1000000);
            		$num = mt_rand(1,count($source));
            		$rstr .= $source[$num-1];
        			}
 
    			}
    		return $rstr;
			}
 
			
?>