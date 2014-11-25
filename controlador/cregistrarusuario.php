<?php
	include("modelo/mregistrarusuario.php");
	$ins = new mregistrarusuario();
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	if ($del){
		$ins->eliminar($del);
	}
	$pac=102;
	$idusuario = isset($_POST["idusuario"]) ? $_POST["idusuario"]:NULL;
    $tipo_documento = isset($_POST["tipo_documento"]) ? $_POST["tipo_documento"]:NULL;
    $identificacion = isset($_POST["identificacion"]) ? $_POST["identificacion"]:NULL;
    $email_sena = isset($_POST["email_sena"]) ? $_POST["email_sena"]:NULL;
    $email_misena = isset($_POST["email_misena"]) ? $_POST["email_misena"]:NULL;
    $email = isset($_POST["email"]) ? $_POST["email"]:NULL;
    $celular = isset($_POST["celular"]) ? $_POST["celular"]:NULL;
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"]:NULL;
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"]:NULL;
    $municipioid = isset($_POST["municipioid"]) ? $_POST["municipioid"]:NULL;
    $nombres = isset($_POST["nombres"]) ? $_POST["nombres"]:NULL;
    $apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"]:NULL;
    $clave = isset ($_POST["clave"]) ? $_POST["clave"]:NULL;
    $fecha_documento = isset ($_POST["fecha_documento"]) ? $_POST["fecha_documento"]:NULL;
    $fecha_expiracion = isset ($_POST["fecha_expiracion"]) ? $_POST["fecha_expiracion"]:NULL;
    $perfilid = isset ($_POST["perfilid"]) ? $_POST["perfilid"]:NULL;
    $genero = isset ($_POST["genero"]) ? $_POST["genero"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    $horas_formacion = isset ($_POST["horas_formacion"]) ? $_POST["horas_formacion"]:NULL;
    $nivel_formacion = isset ($_POST["nivel_formacion"]) ? $_POST["nivel_formacion"]:NULL;
    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;

    $nivel=$ins->getValor(1);
	$dat = $ins->parametro();
	$dat1 = $ins->genero();
	$dat2 = $ins->perfil();
	$dat3 = $ins->departamento();
	
	$dat5 = $ins->editar($pr);

	$dat6 = $ins->municipio();

	if ($tipo_documento && $identificacion && $nivel_formacion && $horas_formacion && $email_sena && $email_misena && $email && $celular && $telefono && $direccion && $municipioid && $nombres && $apellidos && $clave && $fecha_documento  && $fecha_expiracion && $perfilid  && $genero && !$actu){
		$ins->insertar($tipo_documento, $nivel_formacion,$horas_formacion, $identificacion, $email_sena, $email_misena, $email, $celular, $telefono, $direccion, $municipioid, $nombres, $apellidos, $clave,$fecha_documento, $fecha_expiracion, $perfilid, $genero);
		echo "<script type='text/javascript'>alert('Sus Datos se han Registrado exitosamente.');</script>";
	}
	// echo $tipo_documento," , ",$identificacion," , ",$fecha_documento," , ",$fecha_expiracion," , ",$nombres," , ",$apellidos," , ",$email_sena," , ",$email_misena," , ",$email," , ",$celular," , ",$telefono," , ",$direccion," , ",$genero," , ",$perfilid," , ",$municipioid," , ",$clave," , ",$horas_formacion," , ",$nivel_formacion," , ",$idusuario;
 	
	if ($tipo_documento && $identificacion && $nivel_formacion && $horas_formacion  && $email_misena && $email && $celular && $direccion && $municipioid && $nombres && $apellidos && $clave && $fecha_documento  && $fecha_expiracion && $perfilid  && $genero && $actu){
		$ins->actua($tipo_documento,$identificacion,$fecha_documento,$fecha_expiracion,$nombres,$apellidos,$email_sena,$email_misena,$email,$celular,$telefono,$direccion,$genero,$perfilid,$municipioid,$clave,$horas_formacion,$nivel_formacion,$idusuario);
		echo "<script type='text/javascript'>alert('Sus Datos se han Actualizado exitosamente.');</script>";
	} 
		
	
?> 