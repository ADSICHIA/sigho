<?php
	include ("controlador/csede.php");	
?>
 <fieldset>
 <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="table-responsive">
                                        <table>
                                            <tr><td>  <a href="home.php?pac=801" class="btn btn-warning" >Crear nueva sede</a></td></tr>
                                        </table>
                                        <br>
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Direccion</th>
                                                    <th>Telefono</th>
                                                    <th>Municipio</th>
                                                     <th>Estado</th>
                                                    <th>Editar</th>
                                                  <!--  <th>Eliminar</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i=0;$i<count($sedes);$i++){ ?>
                                                <tr>
                                                    <td><?php echo $sedes[$i]['sede'] ?></td>
                                                    <td><?php echo $sedes[$i]['direccion'] ?></td>
                                                    <td><?php echo $sedes[$i]['telefono'] ?></td>
                                                    <td><?php echo $sedes[$i]['municipioid'] ?></td>
                                                    <td><a href="home.php?pac=802&act=<?php echo $sedes[$i]['estado'] ?>&pr=<?php echo $sedes[$i]['idsede'] ?>"  onclick="return confirm('¿Desea cambiarle el estado de la sede?');"><span <?php if($sedes[$i]['estado']==1){?> class="glyphicon glyphicon-ok" <?php }else{ ?> class="glyphicon glyphicon-remove" <?php }?>></span></a></td>
                                                    <td><a href="home.php?pac=801&in=2&pr=<?php echo $sedes[$i]['idsede'] ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                                                   <!--<td><a href="home.php?pac=114&del=<?php echo $sedes[$i]['idsede'] ?>" onclick="return confirm('¿Desea eliminar la sede?');"><span class="glyphicon glyphicon-trash"></span></a></td> -->
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