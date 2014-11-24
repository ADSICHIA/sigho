<?php
include("controlador/ccontra.php");
?>    
 <script  type='text/javascript'>
    function vali(){
          var act = document.getElementById('actu').value; 
          var pa1 = document.getElementById('pas1').value;   
          var pa2 = document.getElementById('pas2').value; 
          var co = document.getElementById('ac').value; 
          var cant = pa1.length; 

           if(act!=co){
               alert("La contraseña actual es incorrecta.");
               return false;    
           }else{
              if(pa1!=pa2){
                  alert("Las contraseñas no coincidens");
                  return false; 
              }else{
                if(cant<8){
                   alert("La contraseña debe tener mas de 8 caracteres");
                    return false; 
                }
              }
           }
                      
    }
</script>   


<center>
    <form name="elformulario"  method="post" onsubmit="return vali();">
          <table width="600" >
          <tr><td align="center"><h1>CAMBIE SU CONTRASE&Ntilde;A</h1></td></tr>
              <tr>
            <td align="center">
              <input type="password" name="ac"  size="29" id="ac" maxlength="20"  required="required"  placeholder="Ingrese su Antigua Contrase&ntilde;a" />
              <input type="hidden" value="<?php echo $dat1[0]['clave'];?>" name="actual" id="actu">
           
            </td>
          </tr>
          <tr>
         
          <tr>
            <td align="center">  
              <input type="password" name="pas1" value=""  size="29" id="pas1" maxlength="20"  required="required" placeholder="Nueva Contraseña" />        
            </td>
            <tr>
            <td align="center">      
             <input type="password" name="pas2" value=""  size="29" id="pas2" maxlength="20"    required="required" placeholder="Repita la contraseña" />            
            </td>
          <tr>
              <td align="center">        
                 <input type="submit" value="Guardar" />              
              </td>
          </tr>
          </table>
    </form>
</center>

