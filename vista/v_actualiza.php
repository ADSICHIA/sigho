<body>
<title>Editar Ficha</title>
<?php
	while($titula=mysql_fetch_array($titulacion)){
?>
<form id="form1" name="form1" method="post" action="c_fichas.php">
  <div align="center">
    <table width="600" border="0" cellpadding="2px" align="center">
      <tr>
        <td colspan="4" align="center" class="style1">
          <h2><center><b>Editar Ficha</b></center></h2>
          <br><br> 
        </td>
      </tr>
      <tr>
        <td width="60" class="style2" align="left"><label>No de Ficha</label></td>
        <td width="160" align="left">
            <input type="text" name="cod_titulacion" value="<?php echo $titula['cod_titulacion']; ?>" />
           <input type="hidden" name="actu" value="si" />
        </td>
        <td width="160" align="left">&nbsp;        	
        </td>
        </tr>
        <tr>
        <td align="left" class="style2">
          <label>Programa:</label>
        </td>
        <td align="left"align="left">
          	<select name="programa" id="programa">
			<option value="">Seleccione...</option>
        		<?php
							
				while ($programa = mysql_fetch_array($programas)){
				?>
			<option value="<?php echo $programa['cod_programa']; ?>" <?php echo ($titula['cod_programa']==$programa['cod_programa'])?'selected="selected"':""?> ><?php echo $programa['nom_programa']; ?></option>
				<?php  }  ?>         
			</select>
        </td>
      </tr>
      <tr>
        <td align="left" class="style2">
          <label>Fecha de Inicio:</label>
        </td>
        <td align="left"align="left">
          <input type="date" name="fini" value="<?php echo $titula['fecha_ini']; ?>" />
        </td>
        <td align="left" class="style2">
          <label>Fecha de Fin:</label>
        </td>
        <td align="left"align="left">
          <input type="date" name="ffin" value="<?php echo $titula['fecha_fin']; ?>" />
        </td>
      </tr>
      <tr>
        <td align="left" class="style2">
          <label>Ubicacion:</label>
        </td>
        <td align="left"align="left">
         <select name="ubicacion">
       		 <?php
				while ($ubicacion = mysql_fetch_array($ubica)){
			?>
			<option value="<?php echo $ubicacion['cod_ubicacion']; ?>" <?php if ($ubicacion['cod_ubicacion']==$titula['cod_ubicacion']) 
			echo "SELECTED";?>><?php echo $ubicacion['nom_ubicacion']; ?>
            </option>
			<?php  }  ?>         
		</select>
        </td>
        <td align="left" class="style2">
          <label>Jornada</label>
        </td>
        <td align="left"align="left">
          <select name="jornada">
       		 <?php
				while ($jornada = mysql_fetch_array($jorna)){
			 ?>
			<option value="<?php echo $jornada['cod_jornada']; ?>" <?php if ($jornada['cod_jornada']==$titula['cod_jornada']) 
			echo "SELECTED";?>><?php echo $jornada['descripcion']; ?>
            </option>
			<?php  }  ?>         
		</select>
        </td>
      </tr>
     
      <td align="center"><label>Dias</label><td>      
		<br>
		<?php 
		$consulta2 = "SELECT dt.cod_titulacion, ds.cod_dia FROM dia_titulacion AS dt INNER JOIN dia_semana AS ds ON dt.cod_dia = ds.cod_dia WHERE dt.cod_titulacion=".$titula['cod_titulacion'];
		//echo $consulta2;
        $resi1 =  mysql_query($consulta2);
		
			$dsem=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
			$dsbd=array(0,0,0,0,0,0,0);
			$ir=0;
			while($linea2 = mysql_fetch_array($resi1)){
				$dsbd[$ir]=$linea2['cod_dia'];
				//echo $dsbd[$ir]." - ";
				$ir++;
			}
			for($i=1;$i<=7;$i++){ 
				$flag=false;
				for($ir=0;$ir<7;$ir++){
					if($i==$dsbd[$ir]){
						$flag=true;
						$ir=7;
					}
				} ?>
				   <input type="checkbox" name="dia<?php echo $i; ?>" value="<?php echo $i; ?>" 
                <?php if($flag==true) echo "checked='checked'" ?>  >
                <?php echo$dsem[$i-1] ?>
				<br>
			<?php	} ?>      
		 <tr>
        <td colspan="4" align="center">
        	<?php } ?>
          <input name="EditarFicha" type="submit" id="EditarFicha" value="Editar" />
          <input type="reset" name="Submit2" value="Cancelar" />
        </td>
      </tr>
      </table>
    <p>&nbsp;  </p>
  </div>

</form>
</body>