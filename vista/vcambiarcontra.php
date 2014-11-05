<?php
include ("controlador/ccontra.php");
?>    


 <script  type='text/javascript' language="JavaScript">

  
    function ver_password() {
             var passwd_valor = document.elformulario.input_pass.value;
     
        document.getElementById('passwd_sitio').innerHTML = (document.elformulario.input_ver.checked)
        
            ? '<input type="text"  id="contrax" name="input_pass" value="">': '<input type="password" id="contrax" name="input_pass" value="">';
     
        document.elformulario.input_pass.value = passwd_valor;
    }
    var is = document.getElementById("confirmar");
    var as = document.getElementById("confirma");

    function contra(valor){
        var variablejs = "<?php echo $dat1[0]['clave']; ?>";
        if (valor == variablejs) {
            is.innerHTML = "<br><input name='clave' type='password' size='29' maxlength='20' placeholder='Nueva Contrase&ntilde;a Minimo 8 Caracteres' id='contraseña' required='required' onblur='vali(this.value)' /></br><br><input name='cont2' type='password' size='29' maxlength='20' placeholder='Confirme su Nueva Contrase&ntilde;a' required='required' id='contraseña1' /></br>";
            as.innerHTML= "<br><input type='button' value='Confirmar' onclick='confir(clave.value, cont2.value)' /></br>";
        }else{
        alert("La Contrase\u00f1\a no es Correcta");
    }
        
    }
         
    function confir(va1, va2){
        var x = document.getElementById("contraseña");
        var z = document.getElementById("contraseña1");
        if(va1!=0 && va2!=0){
            if (va1 != va2) {
                x.className = "box";
                z.className = "box";
                alert("Las contrase\u00f1\as no concuerdan");
            }else{
                x.className = "bax";
                z.className = "bax";
                        as.innerHTML = "<input type='submit' value='Guardar' />";
            }
        }else{
            alert("Ingrese las contrase\u00f1\as");
        }
    }
    function vali(vale){
      if(vale.length < 8){
        alert("La Contrase\u00f1\a debe tener m\u00e1\s de 8 digitos.");
      }
    }
    </script>    
<center>
    <form name="elformulario" >
    <table>
    <tr><td><h1>CAMBIE SU CONTRASE&Ntilde;A</h1></td></tr>
        <tr>
      <td>
        <span id="passwd_sitio">
        <input type="password" name="input_pass" value=""  size="29" id="contrax" maxlength="20"  required="required" placeholder="Ingrese su Antigua Contrase&ntilde;a" />
        </span>
      </td>
    </tr>
    <tr>
     <td align="center">
        <input type="checkbox" name="input_ver" value="ver" onclick="ver_password();" />Mostrar Caracteres&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/>
      </td>
    </tr>
    <tr>
        <td align="center">
            <input type="button" class="boton1" value="seguir" onclick="contra(document.getElementById('contrax').value)" /> 
        </td>
    </tr>
    </table>
    </form>
</center>

