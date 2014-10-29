<?php
	include ("controlador/cgrupo.php");	
?>
 <fieldset>
 <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="table-responsive">
                                        <table>
                                            <tr><td>  <a href="home.php?pac=110" class="btn btn-warning" >Crear nuevo grupo</a></td></tr>
                                        </table>
                                        <br>
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Agendado</th>
                                                    <th>Vigente</th>
                                                    <th>Director</th>
                                                     <th>Ambiente</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i=0;$i<count($datos);$i++){ ?>
                                                <tr>
                                                    <td><?php echo $datos[$i]['grupo'] ?></td>
                                                  <td><a <span <?php if($datos[$i]['agendado']==1){?> class="glyphicon glyphicon-ok" <?php }else{ ?> class="glyphicon glyphicon-remove" <?php }?>></a></td>
                                                   <td><a href="home.php?pac=111&act=<?php echo $datos[$i]['vigente']+1 ?>&pr=<?php echo $datos[$i]['idgrupo'] ?>"  onclick="return confirm('¿Desea cambiar el estado?');"><span <?php if($datos[$i]['vigente']==1){?> class="glyphicon glyphicon-ok" <?php }else{ ?> class="glyphicon glyphicon-remove" <?php }?>></span></a></td>
                                                    <td><?php echo $datos[$i]['nombres'] ?> <?php echo $datos[$i]['apellidos'] ?></td>
                                                     <td><?php echo $datos[$i]['ambiente'] ?></td>
                                                
                                                    <td><a href="home.php?pac=113&in=2&pr=<?php echo $sedes[$i]['idsede'] ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                                                    <td><a href="home.php?pac=114&del=<?php echo $sedes[$i]['idsede'] ?>" onclick="return confirm('¿Desea eliminar la sede?');"><span class="glyphicon glyphicon-trash"></span></a></td>
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