<?php session_start(); ?>
<html>
<head>
<title> Inicio </title>
<link href="vista/css/style.css" type="text/css" rel="stylesheet"><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />            
</head>
<body background="vista/imagenes/fondotrabajo1.jpg">

<?php include_once("./encabezado.php"); ?>

           

<?php

 include ("modelo/conexion.php");
 $conexion = new conexion();
 $conexion->conectarDB();

?>	
<div id="contenido" align="center">

<h3>Entrar</h3>
        <span>&iquest;Ya estás registrado? Entonces accede con tu email y contraseña!</span>
    
    	<form method="post" action="">
        	<table>
            <tr>
              <td><label for="email-login">E-Mail:</label></td>
              <td><input type="text" name="emalog"rrequired="required"; id="email-login" placeholder="ejemplo@misena.edu.co"/></td>
            </tr>
            <tr>
              <td><label for="contrasena-login">Contraseña:</label></td>
              <td><input type="password" name="conlog" id="senha-login" required  /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" value="Entrar" name="entrar"></td>
            </tr>
          </table>
          <?php
		  
				
		  	$elog=isset ($_POST["emalog"])?$_POST["emalog"]:NULL;
		  	$plog=isset ($_POST["conlog"])?$_POST["conlog"]:NULL;
			if($elog && $plog){
				$sql1="SELECT * FROM usuario WHERE email ='".$elog."' and clave ='".$plog."'";
				//echo $sql1;
				$dato= $conexion->SelectDato($sql1);
				if(count($dato)>0){
				$_SESSION["doc_usuario"]=$dato[0]['doc_usuario'];
				$_SESSION["nom_usuario"]=$dato[0]['nom_usuario'];
				header('Location: home.php');
				echo "Bienvenido ".$_SESSION["nom_usuario"];
				}else{
  echo "<script languaje='javascript'>alert('Contraseña O Email Incorrectos')</script>";
          
				
				session_destroy();}
				}
		  ?>
          

        </form><span>¿Aún no tienes una cuenta? hacer tu registro ahora, fácil y rápido!</span>
        
        <?php
		$nom= isset ($_POST["nombre"])?$_POST["nombre"]:NULL;
		$ape= isset ($_POST["apellido"])?$_POST["apellido"]:NULL;
		$doc= isset ($_POST["documento"])?$_POST["documento"]:NULL;
		$email= isset ($_POST["email"])?$_POST["email"]:NULL;
		$con= isset ($_POST["contrasena"])?$_POST["contrasena"]:NULL;
		$btn= isset ($_POST["btn"])?$_POST["btn"]:NULL;
		
		if ($nom && $ape && $doc && $email && $con){
			//echo $nom.$ape.$doc.$email.$con;
			//SELECT id, nombre, nickname, email, pass, sexo, foto,
			$sql="INSERT INTO usuario
			(doc_usuario, nom_usuario, ape_usuario, clave, email)
			VALUES 
			('".$doc."','".$nom."','".$ape."','".$con."','".$email."')";
			//echo $sql;
			$dato=$conexion->Insert($sql);
			}else if($btn){
				echo "<br><b>campos obligatorios</b></br>";
				}
		
		?>
        <form method="post" action="" enctype="multipart/form-data">
            <table>
            <tr>
              <td><label for="pnome-cad">Nombres</label></td>
              <td><input name="nombre" id="nombre" type="text" required /></td>
            </tr>
             <tr>
              <td><label for="pnome-cad">Apellidos</label></td>
              <td><input name="apellido" id="apellido" type="text" required /></td>
            </tr>
            <tr>
              <td><label for="nickname-cad">Documento de identidad:</label></td>
              <td><input type="text" name="documento" id="documento" required  /></td>
            </tr>
            <tr>
              <td><label for="email-cad">E-Mail:</label></td>
              <td><input type="email" name="email" id="email-cad" placeholder="ejemplo@misena.edu.co" required/></td>
            </tr>
            <tr>
              <td><label for="contrasena-cad">Contraseña:</label></td>
              <td><input type="password" name="contrasena" id="contrasena-cad"  required="required"/></td>
            </tr>                      
            <tr>
              
              
              <td align="center" colspan="2"> <input type="submit" value="Registrar" name="btn">
              </td>
         </tr>
          </table>

      </form>  
</div>
</body>
 <?php include_once("./pie.php");?>
</html>
