<?php
	include_once("controlador/cjornada.php");
?>

<div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">JORNADAS</h3>
                    </div>
                    <div class="panel-body">
<form name="form1" action="" method="post" id="frm_sedes" >
<fieldset>
       <div class="form-group">
          Jornada:
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="Ingrese el tipo de jornada"  name="jornada" type="text" value="<?php if($in){ echo $selupd[0]['sede']; } ?>" autofocus>
          
        </div>
        <div class="form-group">
          Hora de Inicio:
        

        </div>
     
        <div class="form-group">
            <input class="form-control"  name="horaini" type="time" value="<?php if($in){ echo $selupd[0]['direccion']; } ?>" autofocus>
            <div class="form-group" >
                <br>
          Hora de Fin:
 
         </div>
            <div class="form-group">
             <input class="form-control"  width="30" name="horafin" type="time" value="<?php if($in){ echo $selupd[0]['telefono']; } ?>" autofocus>
            
         
              </div>
        </div>

         <div class="form-group" >
                
          Cantidad de horas:
 
         </div>
          <div class="form-group">
              <input class="form-control"  width="30" name="canti" type="text" value="<?php if($in){ echo $selupd[0]['telefono']; } ?>" autofocus>
            
         
              </div>    
    
        
        <!-- Change this to a button or input when using this as a form -->
        <a href="#" onclick="frm_sedes.submit();" class="btn btn-lg btn-success btn-block"><?php if($in){ ?> Actualizar <?php }else{  ?> Enviar <?php } ?></a>
    </fieldset>
</form>
</div>
</div>
</div>
</div>