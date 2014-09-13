<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso8859-1" />
<title>Crear Programa</title>
</head>
<div class="crear">

<h2><center>Crear Programa</center></h2>
<br/><br/><br/>

<form name="crear" action="c_crearprograma.php" method="post"> 

<br><b><center>Todos los campos son requeridos.</center></b></br><br/>

<table align="center">
<tr>
	<td><label>Codigo Programa</label></td>
	<td><input type="text" size="15" maxlength="30"  name="codpro" required="required"></td>
<tr/>

<tr>
	<td><label>Nombre Programa</label></td>
	<td><input type="text" size="15" maxlength="30"  name="nombre" required="required"></td>
<tr/>

<tr>
	 <td><label>Nivel</label></td>
    
     <td><select name ="nivel" id="nivel">
     	<?php
			while ($line = mysql_fetch_array($niveles)){
		?> 
 		<option value="<?php  echo $line['cod_nivel']; ?>"> <?php echo $line['nom_nivel']; ?></option>   
    	<?php  }  ?>         
		</select>
     </td>
</tr>

<tr>     
	<td colspan="2"><center><input type="submit" value="Crear" size="20" maxlength="35"  name="crear2" /></center></td>
</tr>
    
</table>
</form>
</div>
</body>


