<?php include_once("controlador/seguridad.php")?>
<?php include_once("modelo/conexion.php")?>
<html>
<head>
<title> Inicio </title>
<link href="vista/css/style.css" type="text/css" rel="stylesheet">               
</head>
<body background="./imagenes/fondotrabajo.jpg">	
<?php include_once("./encabezado.php"); ?>

           
<div id="menu">
 <?php include_once("./menu.php"); ?>
</div>
<div id="contenido">
<?php include_once("controlador/c_modificacion.php");?>
</div>
</body>
 <?php include_once("./pie.php");?>
</html>
