<?php include ("../controlador/cregistrarusuario.php");
?>
<center>
<form name="form1" action="" method="post" >
	<table width="400">
        <tr>
        	<td colspan="2" align="center">
            	<h2>Insertar Usuario</h2>
            </td>
        </tr>
		
		<tr>
        	<td align="left">Tipo de documento</td>
        	<td>
                <select name="tipo_documento" >
                    <?php 
                        for ($i=0; $i < count($dat); $i++){
                    ?>
                        <option value="<?php echo $dat[$i]['idvalor']?>"><?php echo $dat[$i]['valor']?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>

    	<tr>
        	<td align="left"> No identificaci&oacute;n</td>
        	<td><input type="text" name="identificacion" size="30" maxlength="12" required="required" /></td>
        </tr>

		<tr>
        	<td align="left">Genero</td>
        	<td>
                <select name="genero">
                    <?php 
                        for ($i=0; $i < count($dat1); $i++){
                    ?>
                        <option value="<?php echo $dat1[$i]['idvalor']?>"><?php echo $dat1[$i]['valor']?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
        	<td align="left">Nombre</td>
        	<td><input type="text" name="nomapre" size="30" maxlength="50" required="required" /></td>
        </tr>
        <tr>
        	<td align="left">Apellido</td>
        	<td><input type="text" name="apeapre" size="30" maxlength="50" required="required" /></td>
        </tr>
        <tr>
            <td align="left">Celular</td>
            <td><input type="text" name="emaapre" size="30" maxlength="50" required="required" /></td>
        </tr>
        <tr>
        	<td align="left">Telefono</td>
        	<td><input type="text" name="telapre" size="30" maxlength="30" required="required" /></td>
        </tr>
		<tr>
        	<td align="left">Correo Electronico</td>
        	<td><input type="text" name="emaapre" size="30" maxlength="50" required="required" /></td>
        </tr>
        <tr>
            <td align="left">Correo Sena</td>
            <td><input type="text" name="emaapre" size="30" maxlength="50" required="required" /></td>
        </tr>
        <tr>
            <td align="left">Correo Misena</td>
            <td><input type="text" name="emaapre" size="30" maxlength="50" required="required" /></td>
        </tr>

		<tr>
        	<td align="left">Perfil</td>
        	<td>
                <select name="idperfil">
                    <?php 
                            for ($i=0; $i < count($dat2); $i++){
                    ?>
                            <option value="<?php echo $dat2[$i]['idperfil']?>"><?php echo $dat2[$i]['perfil']?></option>
                    <?php } ?>
               </select>
            </td>     
        </tr>
		<tr>
        	<td align="left">Contraseña</td>
        	<td><input type="password" name="pass" size="30" maxlength="50" required="required" /></td>
        </tr>
		<tr>
        	<td align="left">Residencia Actual</td>
            <td>
        	   <select name="departamento">
                    <?php 
                            for ($i=0; $i < count($dat3); $i++){
                    ?>
                            <option value="<?php echo $dat3[$i]['iddepartamento']?>"><?php echo $dat3[$i]['departamento']?></option>
                    <?php } ?>
               </select>
            </td>
        </tr>
        <tr>
        	<td align="left">Direcci&oacute;n</td>
        	<td><input type="text" name="dirapre" size="30" maxlength="50" required="required" /></td>
        </tr>
		
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" value="Guardar" />
            </td>
        </tr>
    </table>
</form>


<form id="form2" name="form2" method="GET" action="" onSubmit="return confirm('¿Desea eliminar?')">
  
  <div align="center">
    <table width="650" border="1" cellspacing="0" cellpadding="4">

      <tr>
	    <td class="style1" align="center" width="160">Tipo de Documento</td>
        <td class="style1" align="center" width="80">No. Documento<input name="pac" type="hidden" id="pac" value="1010" /></td>
		<td class="style1" align="center" width="160">Fecha de Nacimiento</td>
		<td class="style1" align="center" width="160">Genero</td>
		<td class="style1" align="center" width="160">No. Libta Militar</td>
        <td class="style1" align="center" width="160">Nombre</td>
        <td class="style1" align="center" width="160">Telefono</td>
		<td class="style1" align="center" width="160">Email</td>
		<td class="style1" align="center" width="160">Perfil</td>
		<td class="style1" align="center" width="160">Residencia</td>
        <td class="style1" align="center" width="160">Direcci&oacute;n</td>
		<td class="style1" align="center" width="160">Estado Civil</td>
        <td class="style1" align="center" width="160">No.Ficha</td>
		<td class="style1" align="center" width="160">Contacto</td>
        <td class="style1" align="center" width="160">Tel Contacto</td>
        <td class="style1" align="center" width="60">Editar</td>
      </tr>
	  
	  
<?php 
 	//Select
		$dat = $ins->selapre();
		for ($i=0; $i < count($dat); $i++){
	  ?>
        <tr>
			<td class="style2" align="left"><?php echo $dat[$i]['valor']?></td>
			<td class="style2" align="center"><input type="submit" name="del" value=<?php echo $dat[$i]['ndocapre'] ?>></td>
			<td class="style2" align="left"><?php echo $dat[$i]['fenaapre']?></td>
			<td class="style2" align="left"><?php echo $dat[$i]['valor']?></td>
			<td class="style2" align="left"><?php echo $dat[$i]['nlmiapre']?></td>
			<td class="style2" align="left"><?php echo $dat[$i]['nomapre']." ".$dat[$i]['apeapre'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['telapre'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['emaapre'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['perfil'] ?></td>
			<td class="style2" align="center"><?php echo $dat[$i]['ubicacion'] ?></td>
			<td class="style2" align="center"><?php echo $dat[$i]['dirapre'] ?></td>
			<td class="style2" align="center"><?php echo $dat[$i]['valor'] ?></td>
			<td class="style2" align="center"><?php echo $dat[$i]['ficha'] ?></td>
			<td class="style2" align="center"><?php echo $dat[$i]['llamaapre'] ?></td>
			<td class="style2" align="center"><?php echo $dat[$i]['teleapre'] ?></td>
            <td align="center"><a href="vaprendiz1.php?pr=<?php echo $dat[$i]['ndocapre'] ?>&pac=1010&up=11"><img border=0 src="../image/editar.png" width="16" height="16" /></a></td>
		
        </tr>
      <?php  }  ?>
 
         <tr>
		    <td colspan=16 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
        </tr>
    </table>
    <p>&nbsp; </p>
  </div>
</form>

</center>


