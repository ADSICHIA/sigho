<?php
	include_once("controlador/cresu.php");
?>

<div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">RESULTADOS</h3>
                    </div>
                    <div class="panel-body">
<form name="form1" action="" method="post" id="frm_sedes" >
<fieldset>
       <div class="form-group">
          <span class="glyphicon glyphicon-user"> </span> Codigo Resultado <?php if($in){ echo "/Inmodificable"; } ?>
        </div>
        <div class="form-group">
        
            <input class="form-control"  placeholder="Ingrese el nombre de la sede" required  name="cod" type="text" value="<?php if($in){ echo $upd[0]['id_resultado']; } ?>" <?php if($in){ ?> readonly <?php } ?> autofocus>
         
        </div>  
        <div class="form-group">
          <span class="glyphicon glyphicon-send"> </span> Resultado:
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="Ingrese la direccion de la sede" required name="res" type="text" value="<?php if($in){ echo $upd[0]['resultado']; } ?>" autofocus>
         
        </div>
         <div class="form-group">
          <span class="glyphicon glyphicon-globe"> </span>  Seleccione Competencia:
        </div>
        <div class="form-group">
           <select name="compe" required>
           <option value="">...Seleccione una competencia....</option>
            <?php
             for ($i=0; $i<count($compe); $i++){ 
            ?>
              <option value="<?php echo $compe[$i]['id_competencia'] ?>" <?php if($compe[$i]['id_competencia'] == $upd[0]['idcompetencia']){ echo 'selected="selected"';}?>><?php echo $compe[$i]['denominacion'] ?></option>
               <?php } ?>                                            
            </select>
        </div> 
         <?php if($in){  ?>  <input class="form-control"  placeholder="Ingrese un telefono de la sede" name="actu" type="hidden" value="actu" autofocus> <?php } ?>
        <input type="submit" value="enviar" name="enviar" id="btn_submit_frm" style="display:none">
        
        <!-- Change this to a button or input when using this as a form -->
        <a href="#" onclick="document.getElementById('btn_submit_frm').click();" class="btn btn-lg btn-success btn-block"><?php if($in){ ?> Actualizar <?php }else{  ?> Guardar <?php } ?></a>
         <a href="home.php?pac=890"  class="btn btn-warning btn-block">Volver</a>
    </fieldset>
</form>
</div>
</div>
</div>
</div>
