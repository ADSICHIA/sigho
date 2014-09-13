<?php
	
	$conexionDB = new mysqli('localhost','root','','sigho');				
		$consulta="SELECT t.cod_titulacion, p.nom_programa, n.nom_nivel, t.fecha_ini, t.fecha_fin, j.descripcion, u1.nom_ubicacion AS municipio, u2.nom_ubicacion AS sede, u3.nom_ubicacion AS aula
FROM nivel AS n
INNER JOIN programas AS p ON n.cod_nivel = p.cod_nivel
INNER JOIN titulacion AS t ON p.cod_programa = t.cod_programa
INNER JOIN jornada AS j ON t.cod_jornada = j.cod_jornada
INNER JOIN ubicacion AS u1 ON SUBSTRING(t.cod_ubicacion,1,3) = u1.cod_ubicacion
INNER JOIN ubicacion AS u2 ON SUBSTRING(t.cod_ubicacion,1,6) = u2.cod_ubicacion
INNER JOIN ubicacion AS u3 ON t.cod_ubicacion = u3.cod_ubicacion";			  
			  $resultado = $conexionDB->query($consulta);
			
?>