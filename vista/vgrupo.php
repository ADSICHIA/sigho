<?php
include_once ("controlador/cgrupo.php");
?>
<center>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Grupos</h3>
                </div>
                <div class="panel-body">

                    <form name="frm_grupo" action="" method="post" onSubmit="return confirm('Por  favor primero  verifique  los datos ingresados  antes de hacer clic en  !aceptar!')"  >
                        <fieldset> 
                            
                                <div class="form-group">
                                    <input class="form-control" placeholder="nombre grupo" name="nombre" maxlength="45" type="text" required="required">
                                </div>
                            <div class="form-group">
                                    <select name="director" required class="form-control" >
                  <option value>Director</option>
       
       <?php 
		
		for ($i=0; $i < count($seldirector); $i++){
		
		?>
       
         <option value=" <?php 	echo $seldirector[$i]['idusuario'] ?>" /> <?php echo $seldirector[$i]['identificacion'] ?> <?php echo $seldirector[$i]['nombres'] ?> </option>
		
		 <?php } ?>
			
	   </select>
                                
                                </div>
                                 <div class="form-group">
                                    <select name="ambiente" required class="form-control" >
                  <option value>Ambiente</option>
       
       <?php 
		
		for ($i=0; $i < count($selambiente); $i++){
		
		?>
       
         <option value=" <?php 	echo $selambiente[$i]['idambiente'] ?>" /> <?php echo $selambiente[$i]['ambiente'] ?> </option>
		
		 <?php } ?>
			
	   </select>
                                
                                </div>
                             <a href="#" onclick="frm_grupo.submit();" class="btn btn-lg btn-success btn-block">Guardar</a>
                              <a href="home.php?pac=111"  class="btn btn-warning btn-block">Grupos</a>
                            
                            
                              
                        </fieldset> 

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




</center>