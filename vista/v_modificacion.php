<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php 

while($linea = mysql_fetch_array($modif)){
?>
<center> <h3>bienvenido(a) <?php   echo $linea['nom_usuario']; ?> identificado con <?php echo $linea['doc_usuario']; ?></h3> </center>
          
 
<form method="POST" action="" enctype="multipart/form-data">

            <table align="center">
            <tr>
              <td><label for="pnome-cad">Nombres</label></td>
              <td><input name="nombre" id="nombre" type="text" required="required"value="<?php echo $linea['nom_usuario']; ?>" /></td>
            </tr>
             <tr>
              <td><label for="pnome-cad">Apellidos</label></td>
              <td><input name="apellido" id="apellido" type="text" required="required" value="<?php echo $linea['ape_usuario']; ?>" /></td>
            </tr>
            
            <tr>
              <td><label for="email-cad">E-Mail:</label></td>
              <td><input type="email" name="email" id="email-cad" placeholder="ejemplo@misena.edu.co" required="required" value="<?php echo $linea['email']; ?>"/></td>
            </tr>
            <tr>
              <td><label for="contrasena-cad">Contraseña:</label></td>
              <td><input type="password" name="contrasena" id="contrasena-cad"  required="required"/></td>
            </tr>                      
            <tr>
              <td>&nbsp;</td>
 <?php }?>             
              <td > <input type="submit" value="modificar" name="btn">
              </td>
              
            
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>

      </form>  
</body>
</html>
