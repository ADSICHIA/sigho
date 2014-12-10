<?php
	include ("controlador/cresu.php");	
?>
 <fieldset>
 <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="table-responsive">
                                        <table>
                                            <tr><td>  <a href="home.php?pac=891" class="btn btn-warning" >Crear nuevo resultado</a></td></tr>
                                        </table>
                                        <br>
                                        <table class="table table-bordered table-hover table-striped" style="width: 900px;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 146px;">Codigo Resultado</th>
                                                    <th style="width: 355px;">Resultado</th>
                                                    <th style="width: 211px;">Competencia</th>
                                                    <th>Editar</th>
                                                   <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i=0;$i<count($data);$i++){ ?>
                                                <tr>
                                                    <td><?php echo $data[$i]['id_resultado'] ?></td>
                                                    <td><?php echo $data[$i]['resultado'] ?></td>
                                                    <td><?php echo $data[$i]['denominacion'] ?></td>
                                                    <td><a href="home.php?pac=891&in=2&pr=<?php echo $data[$i]['id_resultado'] ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                                                   <td><a href="home.php?pac=890&del=<?php echo $data[$i]['id_resultado'] ?>" onclick="return confirm('¿Desea eliminar este resultado?');"><span class="glyphicon glyphicon-trash"></span></a></td> 
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