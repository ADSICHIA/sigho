<?php
	include ("controlador/cjornada.php");	
?>
 <fieldset>
 <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="table-responsive">
                                        <table>
                                            <tr><td>  <a href="home.php?pac=117" class="btn btn-success" >Crear nueva jornada</a></td></tr>
                                        </table>
                                        <br>
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Jornada</th>
                                                    <th>Inicio</th>
                                                    <th>Fin</th>
                                                    
                                                    
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i=0;$i<count($jornada);$i++){ ?>
                                                <tr>
                                                    <td><?php echo $jornada[$i]['jornada'] ?></td>
                                                    <td><?php echo $jornada[$i]['hora_inicio'] ?></td>
                                                    <td><?php echo $jornada[$i]['hora_fin'] ?></td>
                                                    
                                                    
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

