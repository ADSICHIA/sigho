<script type="text/javascript">
function fnFiltrarPrograma(ficha){

        //alert("Entro "+ficha);
        
        var parametros={"programa":ficha};//$("#frm_login").serialize();
        //alert(parametros);
        $.ajax({
            data: parametros,
            url: './controlador/c_ficha.php',
            type: 'POST',
            beforeSend: function() {
                $("article").html("Procesando, espere por favor...");
                
            },
            success: function(data, textStatus, jqXHR)
            {
                $("article").html(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               $(article).html(textStatus);
            }
            /*success: function(data) {
                $("article").html("hola");
                //window.location='../index.php';
            }*/
        });
}

</script>

<h2><center>Administrar Fichas</center></h2>
<br /><br />

<div align="center">

<form id="frm_ficha" name="frm_ficha" method="post" action="c_fichas.php" onSubmit="return confirm('¿Desea eliminar?')">
  
<center>
Seleccione un programa
<select name="programa" id="programa" onChange="fnFiltrarPrograma(this.value)">
<option value="">Seleccione...</option>
        <?php			
		while ($line = mysql_fetch_array($programas)){
		?>
			<option value="<?php echo $line['cod_programa']; ?>"><?php echo $line['nom_programa']; ?></option>
		<?php  }  ?>         
</select>
</center>
<br /><br /><br /><br />
 	
    <table width="900" border="1" cellspacing="0" cellpadding="4"">
  	  <tr>
        <td align="center"><b>No. Ficha</b></td>
        <td align="center"><b>Programa</b></td>
        <td align="center"><b>Fecha de Inicio</b></td>
        <td align="center"><b>Fecha de Fin</b></td>
        <td align="center"><b>Jornada</b></td>
        <td align="center"><b>Ubicacion</b></td>
        <td align="center"><b>Dias</b></td>
        <td align="center"><b>Editar</b></td>
      </tr>
 <?php 	
 		while ($linea = mysql_fetch_array($lista_fichas)){
	  ?>
        <tr>       
		    <td class="style2"><input type="submit" name="del" value=<?php echo $linea['cod_titulacion']; ?>></td>
            <td class="style2" align="left"><?php echo $linea['nom_programa']; ?></td>
            <td class="style2" align="left"><?php echo $linea['fecha_ini']; ?></td>
            <td class="style2" align="left"><?php echo $linea['fecha_fin']; ?></td>
            <td class="style2" align="left"><?php echo $linea['descripcion']; ?></td>
            <td class="style2" align="left"><?php echo $linea['nom_ubicacion']; ?></td>
            <td class="style2" align="left">
            <?php	  
	   $consulta2 = "SELECT dt.cod_titulacion, ds.nombre_dia FROM dia_titulacion AS dt INNER JOIN dia_semana AS ds ON dt.cod_dia = ds.cod_dia WHERE dt.cod_titulacion=".$linea['cod_titulacion']; 
        $res =  mysql_query($consulta2);
     while($linea2 = mysql_fetch_array($res))
	 	echo SUBSTR($linea2['nombre_dia'],0,3)." "; 
		?> 
            </td>
            <td><a href="c_actualiza.php?pr=<?php echo $linea['cod_titulacion']; ?>"><img border=0 src="./vista/imagenes/editar.png" width="16" height="16" /></a></td>
		
        </tr>
      <?php  }  ?>
 
         <tr>
		    <td colspan=8>Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
        </tr>
    </table>
</form>

