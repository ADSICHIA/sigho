<script type="text/javascript">
function fnLogin(){

        alert("Entro");
        var parametros=$("#frm_login").serialize();
        alert(parametros["user"]);
        $.ajax({
            data: parametros,
            url: './controlador/c_login.php',
            type: 'post',
            beforeSend: function() {
                $("#resultado").html("Procesando, espere por favor...");
                
            },
            success: function(response) {
                $("#resultado").html(response);
                //window.location='./index.php';
            }
        });
}

</script>    
<div id="contenido" align="center">

    <h3>Autenticación de Usuarios</h3>
    <span>&iquest;Ya est&aacute;s registrado? Entonces accede con tu numero de documento y contrase&ntilde;a!</span>
    <form name="frm_login" method="post" onsubmit="fnLogin();">
        <table>

            <tr>
                <td><label for="email-login">Documento:</label></td>
                <td><input type="text" name="user" required="required" id="user-login" placeholder="numero de documento"/></td>
            </tr>
            <tr>
                <td><label for="contrasena-login">Contrase&ntilde;a:</label></td>
                <td><input type="password" name="password" id="password-login" required  /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Entrar" name="entrar" ></td>
            </tr>
            </tr>
            <tr>
                <td align="center" colspan="2"><a href="recupera_clave.php">Recuperar Contraseña?</a></td>
            </tr>
        </table>
    </form>
</div>