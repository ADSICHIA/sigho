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
            <tr colspan="4">
                <h1>
                   Registrarse
                </h1>
            </tr>
            <tr>
                
                    <td>Tipo de Documento<FONT COLOR="RED">*</FONT></td>
                      <td>  <select name="tipo_documento"style="width: 195px;" required>
                            <option value="" >Seleccione</option>
                                <?php 
                                    for ($i=0; $i < count($dat); $i++){
                                 ?>
                                    <option value="<?php echo $dat[$i]['idvalor'] ?>"><?php echo $dat[$i]['valor'] ?></option>
                                <?php } ?>
                        </select>
                </td>

                <td>
                    Identificacion<FONT COLOR="RED">*</FONT></td><td>
                    <input type="text" name="identificacion" style="width: 200px;" required="required" />
                </td>
            </tr>
            <tr>
                <td>
                    Fecha de Expedición Documento<FONT COLOR="RED">*</FONT></td><td>
                    <input type="date" name="fecha_documento" style="width: 200px;"required="required" />
                </td>
                <td>
                    Fecha de Expiracion<FONT COLOR="RED">*</FONT></td><td>
                    <input type="date" name="fecha_expiracion" style="width: 200px;"required="required" />
                </td>
            </tr>
            <tr>
                <td>
                    Nombres<FONT COLOR="RED">*</FONT></td><td>
                    <input type="text" name="nombres" style="width: 200px;"required="required" />
                </td>
                <td>
                    Apellidos<FONT COLOR="RED">*</FONT></td><td>
                    <input type="text" name="apellidos"style="width: 200px;" required="required" />
                </td>
            </tr>

            <tr>
                <td>
                    Correo Sena</td><td>
                    <input type="email" name="email_sena" style="width: 200px;"/>
                </td>
                <td>
                    Confirme Correo Mi Sena<FONT COLOR="RED">*</FONT></td><td>
                    <input type="email" name="email_misena"style="width: 200px;" required="required" />
                </td>
            </tr>
            <tr>
                <td>
                    Correo Electronico Personal<FONT COLOR="RED">*</FONT></td><td>
                    <input type="email" name="email" style="width: 200px;"required="required" />
                </td>
                <td>
                    No. Celular<FONT COLOR="RED">*</FONT></td><td>
                    <input type="text" name="celular"style="width: 200px;" required="required" />
                </td>
            </tr>
            <tr>
                <td>
                    No. Telefono</td><td>
                    <input type="text" name="telefono" style="width: 200px;" />
                </td>
                <td>
                    Direccion<FONT COLOR="RED">*</FONT></td><td>
                    <input type="text" name="direccion" style="width: 200px;"required="required" />
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
                                    <option value="<?php echo $dat1[$i]['idvalor'] ?>"><?php echo $dat1[$i]['valor'] ?></option>
                                <?php } ?>
                        </select>
                </td>
                <input type="hidden" name="perfilid" value="2" >
                 <input type="hidden" name="estado" value="1" >
            </tr>

            <tr>
                <td>
                    <div >Departamento<FONT COLOR="RED">*</FONT></td><td>
                            <select name="departamento" onchange="javascript:municipio(this.value);" style="width: 195px;" required>
                                <option value="" >Seleccione</option>
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
                contraseña<FONT COLOR="RED">*</FONT></td><td>
                <input type="password" name="clave" id="clave" style="width: 200px;"required="required" />
                </td>
                 <td>
                Repita Contraseña<FONT COLOR="RED">*</FONT></td><td>
                <input type="password" name="clave1" id="clave1"  style="width: 200px;"required="required" />
                </td>
               
            </tr>
            <tr>
             <td>
                Horas de Formacion<FONT COLOR="RED">*</FONT></td><td>
                <input type="text" name="horas_formacion" style="width: 200px;" required="required" />
                </td>
                <td>
                        Nivel de Formacion<FONT COLOR="RED">*</FONT></td><td>
                            <select name="nivel_formacion"style="width: 195px;" required>
                                <option value="" >Seleccione</option>
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
                <td align="center" colspan="4" >
                    <input  type="submit" value="Guardar" class="btn btn-default" />
                    <a href="index.php"><input type="button" value="Volver" class="btn btn-default" ></a>
                    
                </td>
            </tr>
        </table>
    </form>
</center>