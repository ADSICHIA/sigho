<?php
//Clase de conexi?n con las bases de datos de mysql
class conexion_sqlserver{
	var $link;
	var $resultado;

	function conexion_sqlserver()
	{
	}

	function conectarBD2()
	{
		include("configuracion.php");
		$this->link = mysql_connect($serv_db,$usu_db,$pass_db);
		if (!$this->link)
		{
			die("<h5>No se logr&oacute; realizar la conexi&oacute;n</h5>");
		}
		$db= mysql_select_db($db_ms);
		if (!$db)
		{
			echo "no se puede conectar db";
		}
	}

	function conectarBD()
	{
		include("configuracion.php");
		$this->link = mysql_connect($serv_db,$usu_db,$pass_db);
		if (!$this->link) {
			die("<h5>No se logr&oacute; realizar la conexi&oacute;n: " . mssql_error()."</h5>");
		}
		mysql_select_db($db) or die('No pudo seleccionarse la BD paila.');
	}

	function desconectarBD2()
	{
		mysql_close($this->link);
	}

	function desconectarBD()
	{
		mysql_close($this->link);
	}

	function seleccionarBD2($baseDeDatos)
	{
		sybase_select_db($baseDeDatos) or die('No pudo seleccionarse la BD.');
		//mssql_select_db($baseDeDatos) or die('No pudo seleccionarse la BD.');
	}

	function seleccionarBD($baseDeDatos)
	{
		mssql_select_db($baseDeDatos) or die('No pudo seleccionarse la BD.');
	}

	function ejecutarConsulta2($consulta)
	{
/*
$this->resultado = mssql_query($consulta) or die("La consulta fall&oacute;: ".mssql_error());
while ($linea = mssql_fetch_array($this->resultado)){
$arrayResultado[] = $linea;
}
*/
		$this->resultado = sybase_query($consulta);
		while ($linea = sybase_fetch_array($this->resultado))
		{
			$arrayResultado[] = $linea;
		}
		sybase_free_result($this->resultado);
		return $arrayResultado;
	}

	function ejecutarConsulta($consulta, $op)
	{
		$this->resultado = mysql_query($consulta) or die("La consulta fall&oacute;: ".mysql_error());
		//echo $op;
		if ($op==0){
			while ($linea = mysql_fetch_array($this->resultado))
			{
				$arrayResultado[] = $linea;
			}
		}else{
			$arrayResultado[] =0;
		}
		$resarr = isset($arrayResultado) ? $arrayResultado:NULL;
		if($resarr){
			return $arrayResultado;
		}
	}

	function ejecutarConsultaUpd($consulta)
	{
		$this->resultado = mssql_query($consulta) or die("La consulta fall&oacute;: ".mssql_error());
	}

	function ejecutarSentencia2($sentencia)
	{
		$resultado = false;
		//if (mssql_query($sentencia))
		if (sybase_query($sentencia)) $resultado = true;
		return $resultado;
	}

	function ejecutarSentencia($sentencia)
	{
		$resultado = false;
		if (mysql_query($sentencia)) $resultado = true;
		return $resultado;
	}

	function hallarNumeroDeCampos()
	{
		//$num = mssql_num_fields($this->resultado);
		$num = sybase_num_fields($this->resultado);
		return $num;
	}

	function cargarDatosEnum($sentencia)
	{
		//$resultados = @mssql_query($sentencia);
		//while ($opcion = mssql_fetch_array($resultados))
		$resultados = @sybase_query($sentencia);
		while ($opcion = sybase_fetch_array($resultados))
		{
			extract($opcion, EXTR_PREFIX_ALL, "IN");
			if (substr($IN_Type,0,4)=='enum')
			{
				$lista = substr($IN_Type,5,strlen($IN_Type));
				$lista = substr($lista,0,(strlen($lista)-2));
				$enums = explode(',',$lista);
				if (sizeof($enums)>0)
				{
					for ($i=0; $i<sizeof($enums);$i++)
					{
						$elem = strtr($enums[$i],"'"," ");
						$array_valores[] = trim($elem);		 
					}
					$cadena_opciones = implode(",",$array_valores);
				}
				else
					$cadena_opciones = false;
			}
		}
		return $cadena_opciones;
	}

	function hallarFilasAfectadas()
	{
		//$filas_afectadas = mssql_num_rows($this->resultado);
		$filas_afectadas = sybase_num_rows($this->resultado);
		return $filas_afectadas;
	}	  
}
?>