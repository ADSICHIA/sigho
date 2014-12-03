<?php
    include ("controlador/cregistrarusuario.php");
?>
<script language="javascript" src="../js/jquery-1.9.1.js"></script><!-- llamamos al JQuery-->
<script language="javascript">
    function municipio(value){
        var parametros = {
            "valor" : value
        };
        $.ajax({
                data:  parametros,
                url:   'vista/vajax.php',
                type:  'post',
                success:  function (response) {
                  $("#municipioid").html(response);
                }
        });
     }

      function vali(){
          var pa1 = document.getElementById('clave').value; 
          var pa2 = document.getElementById('clave1').value;   
    
          var cant = pa1.length; 
            if(pa1!=pa2){
                    alert("Las contraseñas no coinciden.");
                     return false;
            }else{
                if(cant<8){
                    alert("Las contraseña debe tener mas de 8 caracteres.");
                     return false;
                }
            }

                      
    }
    
</script>

<center>
    <form name="form1" action="" method="post" onsubmit="return vali();">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <h1>
                     EDITAR USUARIO
                </h1>
            </tr>
            <tr>
                
                    <td>Tipo de Documento<FONT COLOR="RED">*</FONT></td>
                      <td>  <select name="tipo_documento"style="width: 195px;" required>
                            <option value="" >Seleccione</option>
                                <?php 
                                    for ($i=0; $i < count($dat); $i++){
                                 ?>
                                    <option value="<?php echo $dat[$i]['idvalor']?>" <?php if($dat5[0]['tipo_documento']==$dat[$i]['idvalor']) echo 'selected'; ?>>
                                        <?php echo $dat[$i]['valor']?>
                                <?php } ?>
                        </select>
                </td>

                <td>
                    Identificacion<FONT COLOR="RED">*</FONT></td><td>
                    <input type="text" name="identificacion" style="width: 200px;" required="required"  value="<?php echo $dat5[0]['identificacion']?>"/>
                    <input type="hidden" name="actu" value="actu">
                </td>
            </tr>
            <tr>
                <td>
                    Fecha de Expedición Documento<FONT COLOR="RED">*</FONT></td><td>
                    <input type="date" name="fecha_documento" style="width: 200px;"required="required" value="<?php echo $dat5[0]['fecha_documento']?>"/>
                </td>
                <td>
                    Fecha de Expiracion<FONT COLOR="RED">*</FONT></td><td>
                    <input type="date" name="fecha_expiracion" style="width: 200px;"required="required" value="<?php echo $dat5[0]['fecha_expiracion']?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Nombres<FONT COLOR="RED">*</FONT></td><td>
                    <input type="text" name="nombres" style="width: 200px;"required="required" value="<?php echo $dat5[0]['nombres']?>" />
                </td>
                </td>
                <td>
                    Apellidos<FONT COLOR="RED">*</FONT></td><td>
                    <input type="text" name="apellidos"style="width: 200px;" required="required" value="<?php echo $dat5[0]['apellidos']?>"/>
                </td>
            </tr>

            <tr>
                <td>
                    Correo Sena</td><td>
                    <input type="email" name="email_sena" style="width: 200px;" value="<?php echo $dat5[0]['email_sena']?>"/>
                </td>
                <td>
                    Confirme Correo Mi Sena<FONT COLOR="RED">*</FONT></td><td>
                    <input type="email" name="email_misena"style="width: 200px;" required="required" value="<?php echo $dat5[0]['email_misena']?>" />
                </td>
            </tr>
            <tr>
                <td>
                    Correo Electronico Personal<FONT COLOR="RED">*</FONT></td><td>
                    <input type="email" name="email" style="width: 200px;"required="required" value="<?php echo $dat5[0]['email']?>"/>
                </td>
                <td>
                    No. Celular<FONT COLOR="RED">*</FONT></td><td>
                    <input type="text" name="celular"style="width: 200px;" required="required"  value="<?php echo $dat5[0]['celular']?>" />
                </td>
            </tr>
            <tr>
                <td>
                    No. Telefono</td><td>
                    <input type="text" name="telefono" style="width: 200px;" value="<?php echo $dat5[0]['telefono']?>"/>
                </td>
                <td>
                    Direccion<FONT COLOR="RED">*</FONT></td><td>
                    <input type="text" name="direccion" style="width: 200px;"required="required" value="<?php echo $dat5[0]['direccion']?>"/>
                </td>
            </tr>
            <tr>
                <td>
                        Genero<FONT COLOR="RED">*</FONT></td><td>
                        <select name="genero" style="width: 195px;" required>
                            <option value="">Seleccione</option>
                                <?php 
                                    for ($i=0; $i < count($dat1); $i++){
                                 ?>
                                    <option value="<?php echo $dat1[$i]['idvalor']?>" <?php if($dat5[0]['genero']==$dat1[$i]['idvalor']) echo 'selected'; ?>>
                                        <?php echo $dat1[$i]['valor']?>

                                     </option>

                                <?php } ?>
                        </select>
                </td>
                 <td>
                        Perfil<FONT COLOR="RED">*</FONT></td><td>
                        <select name="perfilid" style="width: 195px;" required>
                            <option value="">Seleccione</option>
                                <?php 
                                    for ($i=0; $i < count($dat2); $i++){
                                 ?>
                                    <option value="<?php echo $dat2[$i]['idperfil']?>" <?php if($dat5[0]['perfilid']==$dat2[$i]['idperfil']) echo 'selected'; ?>>
                                        <?php echo $dat2[$i]['perfil']?>
                                <?php } ?>
                        </select>
                </td>

            </tr>

            <tr>
                <td>
                    <div >Departamento<FONT COLOR="RED">*</FONT></td><td>
                            <select name="departamento" onchange="javascript:municipio(this.value);" style="width: 195px;" required>
                                <option value="" >Seleccione</option>
                                <?php 
                                    for ($i=0; $i < count($dat3); $i++){
                                 ?>
                                  <option value="<?php echo $dat3[$i]['iddepartamento']?>" <?php if($dat5[0]['municipioid']==$dat3[$i]['iddepartamento']) echo 'selected'; ?>>
                                        <?php echo $dat3[$i]['departamento']?>
                                <?php } ?>
                            </select>
                    </div>
                </td>

                <td>
                    <div id="municipioid">
                        Municipio
                        <select name="municipioid" style="width: 200px;">
                            <option value="" >Seleccione</option>
                                <?php 
                                    for ($i=0; $i < count($dat6); $i++){
                                ?>
                                <option value="<?php echo $dat6[$i]['idmunicipio']?>" <?php if($dat5[0]['municipioid']==$dat6[$i]['idmunicipio']) echo 'selected'; ?>>
                                <?php echo $dat6[$i]['municipio']?>

                                </option>
                            <?php } ?>
                        
                        </select>  
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                contraseña<FONT COLOR="RED">*</FONT></td><td>
                <input type="password" name="clave" id="clave" style="width: 200px;"required="required" value="<?php echo $dat5[0]['clave']?>" />
                </td>
                 <td>
                Repita Contraseña<FONT COLOR="RED">*</FONT></td><td>
                <input type="password" name="clave1" id="clave1"  style="width: 200px;"required="required" value="<?php echo $dat5[0]['clave']?>"/>
                </td>
               
            </tr>
            <tr>
             <td>
                Horas de Formacion<FONT COLOR="RED">*</FONT></td><td>
                <input type="text" name="horas_formacion" style="width: 200px;" required="required" value="<?php echo $dat5[0]['horas_formacion']?>"/>
                </td>
                <td>
                      Nivel de Formacion<FONT COLOR="RED">*</FONT></td><td>
                            <select name="nivel_formacion"style="width: 195px;" required>
                                <option value="" >Seleccione</option>
                                    <?php 
                                        for ($i=0; $i < count($nivel); $i++){
                                     ?>
                                           <option value="<?php echo $nivel[$i]['idvalor']?>"  <?php if($dat5[0]['nivel_formacion']==$nivel[$i]['idvalor']) echo 'selected'; ?>><?php echo $nivel[$i]['valor'] ?></option>
                                    <?php } ?>
                            </select>
                    </td>
                <!--<td>
                Nivel de Formacion
                <input type="text" name="nivel_formacion" style="width: 200px;" required="required" />
                </td>-->
               
            </tr>

            <tr>
                <td align="center" colspan="4" >
                    <input  type="submit" value="Guardar" class="btn btn-default" />
                </td>
            </tr>
        </table>
    </form>

<h2>Usuarios registrados</h2>
<form  name="form2" method="get" action="" onSubmit="return confirm('¿Desea eliminar?')">
  
  <div align="center" class="table-responsive">
    <table  class="table table-bordered table-hover table-striped">

      <tr>
        <td>No. Usuario<input name="pac" type="hidden" id="pac" value="<?php echo $pac; ?>"/></td>
        <td>Documento</td>
        <td>Identificacion</td>
        <td>Genero</td>
        <td>Nombres</td>
        <td>Apellidos</td>
        <td>Email</td>
        <td>Email Misena</td>
        <td>Telefono</td>
        <td>Municipio</td>
        <td>Perfil</td>
        <td>Editar</td>
       
      </tr>
         <?php 
    //Select
        
        $dat4 = $ins->seleccionar();
        for ($i=0; $i < count($dat4); $i++){
            
      ?>
   
          <tr>

            <td><input type="submit" name="del" value=<?php echo $dat4[$i]['idusuario'] ?>></td>
            <td><?php echo $dat4[$i]['cedula']  ?></td>
            <td><?php echo $dat4[$i]['identificacion'] ?></td>
            <td><?php echo $dat4[$i]['genero'] ?></td>
            <td><?php echo $dat4[$i]['nombres'] ?></td>
            <td><?php echo $dat4[$i]['apellidos'] ?></td>
            <td><?php echo $dat4[$i]['email'] ?></td>
            <td><?php echo $dat4[$i]['email_misena'] ?></td>
            <td><?php echo $dat4[$i]['telefono'] ?></td>
            <td><?php echo $dat4[$i]['municipio'] ?></td>
            <td><?php echo $dat4[$i]['perfil'] ?></td>
            <td><a href = "home.php?pr=<?php echo $dat4[$i]['idusuario'] ?>&pac=102&up=11"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>
                    <?php  }  ?>
            
        </tr>
      
 
         <tr>
            <td colspan=8 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
        </tr>
    </table>
    <p>&nbsp; </p>
  </div>
</form>

</center>