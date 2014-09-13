<h3><center><h2> Consultar Ficha</h2>
  <table width="980" border="2" cellspacing="0" cellpadding="0">
    <tr>
      <!--<th style="alignment-adjust:central">Ubicacion</th>-->
        <!--<th scope="row">Ubicacion</th>-->
      <th><font style="column-span:2">Ficha </th>
      <th><font style="column-span:2">Programa </th>
      <th style="alignment-adjust:central">Titulacion</th>
      <th><font  style="column-span:2">Fecha Inicio</th>
      <th><font  style="column-span:2">Fecha Fin</th>
      <th><font  style="column-span:2">Jornada</th>
      <th><font  style="column-span:2">Ubicacion </th>
      <th><font  style="column-span:2">Dias </th>
      
      
    </tr>
  <?php while($linea =$resultado ->fetch_array(MYSQL_ASSOC)){ ?>
    <tr>
      <td aling="center"><?php echo $linea['cod_titulacion']; ?></td> 
      <td aling="center"><?php echo $linea['nom_programa'];?></td>
      <td aling="center"><?php echo $linea['nom_nivel'];?></td>
      <td aling="center"><?php echo $linea['fecha_ini']; ?></td>
      <td aling="center"><?php echo $linea['fecha_fin']; ?></td>
      <td aling="center"><?php echo $linea['descripcion']; ?></td> 
	  <td aling="center"><?php echo $linea['municipio']."-".$linea['sede']."-".$linea['aula']; ?></td> 		
      <td aling="center">
	   <?php	  
	   $consulta2 = "SELECT dt.cod_titulacion, ds.nombre_dia FROM dia_titulacion AS dt INNER JOIN dia_semana AS ds ON dt.cod_dia = ds.cod_dia WHERE dt.cod_titulacion=".$linea['cod_titulacion']; 
        $res = $conexionDB->query($consulta2);
     while($linea2 = $res->fetch_array(MYSQL_ASSOC))
	 	echo SUBSTR($linea2['nombre_dia'],0,3)." "; 
		?> 
      </td>           
    </tr>
   <?php } ?>
  </table>
</center></h3>