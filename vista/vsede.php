<?php
	include_once("controlador/csede.php");
?>

<div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">SEDES</h3>
                    </div>
                    <div class="panel-body">
<form name="form1" action="" method="post" id="frm_sedes" >
<fieldset>
       <div class="form-group">
          Nombre:
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="Ingrese el nombre de la sede"  name="nomsede" type="text" value="<?php if($in){ echo $selupd[0]['sede']; } ?>" autofocus>
          
        </div>
        <div class="form-group">
          Direccion:
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="Ingrese la direccion de la sede" name="direccion" type="text" value="<?php if($in){ echo $selupd[0]['direccion']; } ?>" autofocus>
         
        </div>
          <div class="form-group">
          Telefono:
        </div>
        <div class="form-group">
            <input class="form-control"  placeholder="Ingrese un telefono de la sede" name="telefono" type="text" value="<?php if($in){ echo $selupd[0]['telefono']; } ?>" autofocus>
            <?php if($in){  ?>  <input class="form-control"  placeholder="Ingrese un telefono de la sede" name="actu" type="hidden" value="actu" autofocus> <?php } ?>
         
         
        </div> 
         <div class="form-group">
          Municipio:
        </div>
        <div class="form-group">
           <select name="municipio" class="form-control">
            <?php for($i=0;$i<count($mu);$i++){?>
                <option value="<?php echo $mu[$i]['idmunicipio']?>"><?php echo $mu[$i]['municipio']?></option>
            <?php } ?>
                </select>
        </div> 
      
        
        <!-- Change this to a button or input when using this as a form -->
        <a href="#" onclick="frm_sedes.submit();" class="btn btn-lg btn-success btn-block"><?php if($in){ ?> Actualizar <?php }else{  ?> Enviar <?php } ?></a>
    </fieldset>
</form>
</div>
</div>
</div>
</div>
