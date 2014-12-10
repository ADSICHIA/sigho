<?php
	include_once("controlador/ccompeprograma.php");
?>

<div class="row">
            <div class="col-md-4 col-md-offset-4" >
                <div class="login-panel panel panel-default">
                  
                    <div class="panel-heading">
                        
                          
                        <h3 class="panel-title "><?php if($pr){ ?>EDITAR COMPETENCIA<?php }else{ ?>NUEVA COMPETENCIA<?php } ?><?php echo " "; ?><span class="glyphicon glyphicon-time"></span></h3>
                           
                        
                    </div>
                  
                    
                  
                    
                    <div class="panel-body" >
<form name="form1" action="" method="post" id="frm_sedes" >
<fieldset >


  <div class="form" >
             Id competencia: 
           
        </div>
    
        <div class="form-group">
            <br>
            <?php if($pr){ ?>
            <input class="form-control" placeholder="Ingrese un codigo numerico para la competencia" name="codigo" type="text"  pattern="[0-9]+" value="<?php echo $valoredita[0]['id_competencia'] ?>" /><input type="hidden" name="valor" value="<?php echo $valoredita[0]['id_competencia'] ?>" />
            <?php }else{ ?>
            <input class="form-control" placeholder="Ingrese un codigo numerico para la competencia" name="codigo" type="text"  pattern="[0-9]+" >
            <?php } ?>  
            
        </div>



  
       <div class="form" >
           Denominacion: 
           
        </div>
        <div class="form-group">
            <br>
            <?php if($pr){ ?>
            
            <input class="form-control" placeholder="Ingrese una descripcion para la competencia" name="denomina" type="text" value="<?php echo $valoredita[0]['denominacion'] ?>"/>
            
            <?php }else{ ?>
            
            
            
            <input class="form-control" placeholder="Ingrese una descripcion para la competencia" name="denomina" type="text" >
            
            <?php } ?>
                                                                                                           
        </div>
        <div class="form-group">
          Cantidad de horas:
        

        </div>
     
        <?php if($pr){ ?>
            <input class="form-control"  name="cantihor" type="text" pattern="[0-9]+" value="<?php echo $valoredita[0]['cantidad_horas'] ?>">
        <?php }else{ ?>
             <input class="form-control"  name="cantihor" type="text" pattern="[0-9]+" >
        <?php } ?>
            <div class="form-group" >
                <br>
          Seleccione el programa:
 
         </div>
            <div class="form-group">

             <?php if($pr){ ?>
            
            
             <select name="idpro" class="form-control" >

                 <?php for($a=0;$a<count($valoresprograma);$a++){ ?>

                <option <?php if($valoredita[0]['programaid']==$valoresprograma[$a]['idprograma']) echo "SELECTED"; ?>  value="<?php echo $valoresprograma[$a]['idprograma'] ?>" /><?php echo $valoresprograma[$a]['programa']; ?></option>
 
                 <?php } ?>

             </select>
                
                
                
                
             <?php }else{ ?>
                
                
             <select name="idpro" class="form-control" >

                 <?php for($a=0;$a<count($valoresprograma);$a++){ ?>

                <option value="<?php echo $valoresprograma[$a]['idprograma']; ?>"><?php echo $valoresprograma[$a]['programa']; ?></option>
 
                 <?php } ?>

             </select>
                
                
             <?php } ?>
                
              </div>
        
       <?php if($pr){ ?>
             
       <input type ='hidden' name='actu' value='actu' />
       
       <?php } ?>
    
        
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
                                                    <th style="background-color: #428bca; color:white;">codigo</th>
                                                    <th style="background-color: #428bca; color:white;">Nombre</th>
                                                    <th style="background-color: #428bca; color:white;">Horas</th>
                                                    <th style="background-color: #428bca; color:white;">Programa</th>
                                                    <th style="background-color: #428bca; color:white;">Editar</th>
                                                    <th style="background-color: #428bca; color:white;">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i=0;$i<count($compe);$i++){ ?>
                                                <tr>
                                                    <td><?php echo $compe[$i]['id_competencia'] ?></td>
                                                    <td><?php echo $compe[$i]['denominacion'] ?></td>
                                                    <td><?php echo $compe[$i]['cantidad_horas'] ?></td>
                                                    <td><?php echo $compe[$i]['programa'] ?></td>
                                                    
                                                    <td><a href="home.php?pac=809&pr=<?php echo $compe[$i]['id_competencia'] ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                                                    <td><a href="home.php?pac=809&elim=<?php echo $compe[$i]['id_competencia'] ?>"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
                                                   
                                                           
                                                   
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

