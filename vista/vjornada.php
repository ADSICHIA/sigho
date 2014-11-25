<?php
	include_once("controlador/cjornada.php");
?>

<div class="row">
            <div class="col-md-4 col-md-offset-4" >
                <div class="login-panel panel panel-default">
                  
                    <div class="panel-heading">
                        
                          
                        <h3 class="panel-title "><?php if($pr){ ?>EDITAR JORNADA <?php }else{ ?>JORNADAS<?php } ?><?php echo " "; ?><span class="glyphicon glyphicon-time"></span></h3>
                           
                        
                    </div>
                  
                    
                  
                    
                    <div class="panel-body" >
<form name="form1" action="" method="post" id="frm_sedes" >
<fieldset >
         
       <div class="form" >
           Jornada: 
           
        </div>
        <div class="form-group">
            <br>
            <input class="form-control" placeholder="Ingrese el tipo de jornada" name="jornada" type="text" value="<?php if($pr){ echo $jornafilt[0]['jornada']; } ?>" autofocus>
                                                                                                           
        </div>
        <div class="form-group">
          Hora de Inicio:
        

        </div>
     
        
            <input class="form-control"  name="horaini" type="time" value="<?php if($pr){ echo $jornafilt[0]['hora_inicio']; } ?>" autofocus>
            <div class="form-group" >
                <br>
          Hora de Fin:
 
         </div>
            <div class="form-group">
             <input class="form-control"  width="30" name="horafin" type="time" value="<?php if($pr){ echo $jornafilt[0]['hora_fin']; } ?>" autofocus>
            
         
              </div>
        

         <div class="form-group" >
                
          Cantidad de horas:
 
         </div>
          <div class="form-group">
              <input class="form-control"  width="30" name="canti" type="text" value="<?php if($pr){ echo $jornafilt[0]['horas']; } ?>" autofocus>
            
         
              </div>    
    
        
        <!-- Change this to a button or input when using this as a form -->
        <a href="#" onclick="frm_sedes.submit();" class="btn btn-lg btn-success btn-block" style="background-color: #428bca; border-color: #ADD8E6;"><?php if($pr){ ?> Actualizar <input type="hidden" name="actua" value="<?php echo $jornafilt[0]['idjornada']?>"><?php }else{  ?> Crear <?php } ?></a>
        <br>
        <a href="home.php" onclick="frm_sedes.submit();" class="btn btn-lg btn-warning btn-success btn-block" style="background-color: #428bca; border-color: #ADD8E6;"><?php if($pr){ ?> Cancelar <?php }else{  ?> Cancelar <?php } ?></a>
       
    </fieldset>
</form>
</div>
                        
       </div>         
</div>
    
    
</div>
    


<div id="page-wrapper" style="margin-left: -31px; margin-top: 100px">
<fieldset >
 <div class="table-responsive">
                            <div class="row" >
                                <div class="col-lg-4">
                                    <div class="table-responsive" align="center" >
                                        <!--<table>
                                            <tr><td>  <a href="home.php?pac=117" class="btn btn-success" >Crear nueva jornada</a></td></tr>
                                        </table>-->
                                        <br>
                                        
                                        
                                        
                                        <table class="table table-bordered table-hover table-striped" style="width: 800px; left: 60%; position: absolute;">
                                            
                                            <thead>
                                                <tr>
                                                    <td colspan="5"><h4>LISTA DE JORNADAS</h4></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <th style="background-color: #428bca; color:white;">Jornada</th>
                                                    <th style="background-color: #428bca; color:white;">Inicio</th>
                                                    <th style="background-color: #428bca; color:white;">Fin</th>
                                                    <th style="background-color: #428bca; color:white;">Editar</th>
                                                    <th style="background-color: #428bca; color:white;">Activo</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i=0;$i<count($jornadas);$i++){ ?>
                                                <tr>
                                                    <td><?php echo $jornadas[$i]['jornada'] ?></td>
                                                    <td><?php echo $jornadas[$i]['hora_inicio'] ?></td>
                                                    <td><?php echo $jornadas[$i]['hora_fin'] ?></td>
                                                    
                                                    
                                                    <td><a href="home.php?pac=116&pr=<?php echo $jornadas[$i]['idjornada'] ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                                                    
                                                    <td><a href="home.php?pac=116&codigo=<?php echo $jornadas[$i]['idjornada']; ?>&activo=<?php echo $jornadas[$i]['activo']; ?>">
                                                            
                                                    <?php if($jornadas[$i]['activo']==1){ ?><span class="glyphicon glyphicon-ok"></span><?php } ?>
                                                    <?php if($jornadas[$i]['activo']==2){ ?><span class="glyphicon glyphicon-remove-sign"></span><?php } ?></a></td>
                                                   
                                                </tr>
                                                                                            

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    

    </fieldset> 
 
</div>