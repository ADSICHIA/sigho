<?php
    include ("controlador/cgrupoficha.php"); 
?>
<center>

 
                           
                                
                                     
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $datos[0]['grupo']?></th>
                                                    <th><?php echo $datos[0]['nombres']?> <?php echo $datos[0]['apellidos']?></th>
                                                    <th><?php echo $datos[0]['ambiente']?></th>
    
                                                </tr>
                                            </thead>
                                        </table>

                       
    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Agregar ficha</h3>
                </div>
                <div class="panel-body">

                    <form name="frm_fichas" action="" method="post" onSubmit="return confirm('Por  favor primero  verifique  los datos ingresados  antes de hacer clic en  !aceptar!')"  >
                      
                        <fieldset> 
                            
                                <div class="form-group">
                                    <input class="form-control" placeholder="Ficha" name="ficha" maxlength="10" type="number" required="required" min="1000" requiredname="ficha" autofocus>
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" placeholder="Cantidad aprendices" name="cantidad" maxlength="3" type="number" required="required" min="1" max="100" requiredname="ficha" autofocus>
                                </div>
                               
                               
                          
                                
                             <a href="#" onclick="frm_fichas.submit();" class="btn btn-lg btn-success btn-block">Agregar</a>
                                 <a href="home.php?pac=804"  class="btn btn-warning btn-block">Volver</a>
                             
                            
                            
                              
                        </fieldset> 

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   <fieldset>
 <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="table-responsive">
                                        
                                        <br>
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ficha</th>
                                                    <th>Aprendices</th>
                                                     <th>Eliminar</th>
                                                 
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i=0;$i<count($fichas);$i++){ ?>
                                                <tr>
                                                    <td><?php echo $fichas[$i]['fichaid'] ?></td>
                                                    <td><?php echo $fichas[$i]['cant_aprendices'] ?></td>
                                                  
                                                
                                                    <td><a href="home.php?pac=805&pr=<?php echo $pr?>&del=<?php echo $fichas[$i]['idficha_grupo'] ?>" onclick="return confirm('¿Desea eliminar la ficha del grupo?');"><span class="glyphicon glyphicon-trash"></span></a></td>
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
                    </div>

    </fieldset> 

                              
                 

    
    </center>