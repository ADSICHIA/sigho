<title>Crear Titulacion</title>
</head>

<div class="ficha">

<h3><center>Crear Ficha</center></h3>
<form name="creaficha" action="c_creartitulacion.php" method="post">

<br><b><center>Todos los campos son requeridos.</center></b></br>

	<table align="center">
    <br>
		<td><label>Numero de Ficha</label>
			<td><input type="text" size="15" maxlength="30"  name="nficha" required="required"></td>
		<tr/>

		<tr>
		<td><label>Programa</label></td>
        <td>
		<select name="programa">
        <?php
		while ($line = mysql_fetch_array($listaProgramas)){
		?>
			<option value="<?php echo $line['cod_programa']; ?>"><?php echo $line['nom_programa']; ?></option>
		<?php  }  ?>         
		</select>
        </td>
		</tr>

		<tr>
        	<td><label>Jornada</label></td>
			<td>
            <select name="jornada">
			<?php
			while ($line = mysql_fetch_array($listaJornada)){
			?>
			<option value="<?php echo $line['cod_jornada']; ?>"><?php echo $line['descripcion']; ?></option>
			<?php  }  ?>         
			</select>
            </td>
        </tr>

		<tr>
			<td><label>Ubicacion</label></td>
			<td>
            <select name="ubicacion">
			<?php
			while ($line = mysql_fetch_array($listaUbicacion)){
			?>
			<option value="<?php echo $line['cod_ubicacion']; ?>"><?php echo $line['nom_ubicacion']; ?></option>
			<?php  }  ?>         
			</select>
            </td>
		<tr/>

		<tr>
			<td><label>Fecha Inicio</label><td><input type="Date" size="15" maxlength="30"  name="fini"></center></td>
		<tr/>

		<tr>
			<td><label>Fecha Fin</label><td><input type="Date" size="15" maxlength="30"  name="ffin"></center></td>
		<tr/>
        
        
<td><label>Dias</label><td>      
<br>
<?php 
$dsem=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
for($i=1;$i<=7;$i++){ ?>
<input type="checkbox" name="dia<?php echo $i; ?>" value="<?php echo $i; ?>"><?php echo$dsem[$i-1]  ?>
<br>
<?php } ?>      
		<tr>
			<td><center><input type="submit" value="Ingresar"  size="15" maxlength="30"  name="nombre"></center></td></center>
		<tr/>
</tr>
</table>
</form>
</div>

</body>
</html>