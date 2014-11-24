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
    
</script>
<center>
    <form name="form1" action="" method="post" >
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <h1>
                    CREAR USUARIO
                </h1>
            </tr>
            <tr>
                <td>
                    Tipo de Documento
                        <select name="tipo_documento"style="width: 195px;" >
                            <option value="0" >Seleccione</option>
                                <?php 
                                    for ($i=0; $i < count($dat); $i++){
                                 ?>
                                    <option value="<?php echo $dat[$i]['idvalor'] ?>"><?php echo $dat[$i]['valor'] ?></option>
                                <?php } ?>
                        </select>
                </td>

                <td>
                    Identificacion
                    <input type="text" name="identificacion" style="width: 200px;" required="required" />
                </td>
            </tr>
            <tr>
                <td>
                    Fecha de Nacimiento
                    <input type="date" name="fecha_documento" style="width: 200px;"required="required" />
                </td>
                <td>
                    Fecha de Expedición
                    <input type="date" name="fecha_expiracion" style="width: 200px;"required="required" />
                </td>
            </tr>
            <tr>
                <td>
                    Nombres
                    <input type="text" name="nombres" style="width: 200px;"required="required" />
                </td>
                <td>
                    Apellidos
                    <input type="text" name="apellidos"style="width: 200px;" required="required" />
                </td>
            </tr>

            <tr>
                <td>
                    Correo Sena
                    <input type="email" name="email_sena" style="width: 200px;"required="required" />
                </td>
                <td>
                    Correo Mi Sena
                    <input type="email" name="email_misena"style="width: 200px;" required="required" />
                </td>
            </tr>
            <tr>
                <td>
                    Correo Electronico
                    <input type="email" name="email" style="width: 200px;"required="required" />
                </td>
                <td>
                    No. Celular
                    <input type="text" name="celular"style="width: 200px;" required="required" />
                </td>
            </tr>
            <tr>
                <td>
                    No. Telefono
                    <input type="text" name="telefono" style="width: 200px;"required="required" />
                </td>
                <td>
                    Direccion
                    <input type="text" name="direccion" style="width: 200px;"required="required" />
                </td>
            </tr>
            <tr>
                <td>
                        Genero
                        <select name="genero" style="width: 195px;">
                            <option value="0">Seleccione</option>
                                <?php 
                                    for ($i=0; $i < count($dat1); $i++){
                                 ?>
                                    <option value="<?php echo $dat1[$i]['idvalor'] ?>"><?php echo $dat1[$i]['valor'] ?></option>
                                <?php } ?>
                        </select>
                </td>
                 <td>
                        Perfil
                        <select name="perfilid" style="width: 195px;">
                            <option value="0">Seleccione</option>
                                <?php 
                                    for ($i=0; $i < count($dat2); $i++){
                                 ?>
                                    <option value="<?php echo $dat2[$i]['idperfil'] ?>"><?php echo $dat2[$i]['perfil'] ?></option>
                                <?php } ?>
                        </select>
                </td>

            </tr>

            <tr>
                <td>
                    <div >Departamento
                            <select name="departamento" onchange="javascript:municipio(this.value);" style="width: 195px;">
                                <option value="0" >Seleccione</option>
                                <?php 
                                    for ($i=0; $i < count($dat3); $i++){
                                 ?>
                                    <option value="<?php echo $dat3[$i]['iddepartamento'] ?>"><?php echo $dat3[$i]['departamento'] ?></option>
                                <?php } ?>
                            </select>
                    </div>
                </td>

                <td>
                    <div id="municipioid"></div>
                </td>
            </tr>
            <tr>
                <td>
                clave
                <input type="password" name="clave"  style="width: 200px;"required="required" />
                </td>
                <td>
                Horas de Formacion
                <input type="text" name="horas_formacion" style="width: 200px;" required="required" />
                </td>
            </tr>
            <tr>
                <td>
                        Nivel de Formacion
                            <select name="nivel_formacion"style="width: 195px;" >
                                <option value="0" >Seleccione</option>
                                    <?php 
                                        for ($i=0; $i < count($nivel); $i++){
                                     ?>
                                        <option value="<?php echo $nivel[$i]['idvalor'] ?>"><?php echo $nivel[$i]['valor'] ?></option>
                                    <?php } ?>
                            </select>
                    </td>
                <!--<td>
                Nivel de Formacion
                <input type="text" name="nivel_formacion" style="width: 200px;" required="required" />
                </td>-->
               
            </tr>

            <tr>
                <td align="center" colspan="2" >
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
            <td><a href = "home.php?pr=<?php echo $dat4[$i]['idusuario'] ?>&pac=<?php echo $pac; ?>&up=11"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>
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