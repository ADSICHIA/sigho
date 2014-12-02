<?php
include ("controlador/cdisponi.php");
?>
<html>
    <head>

        <title>Disponibilidad</title>
    </head>
    <title>Sujerencia de Disponibilidad</title>
    <body>

        <div class="table-responsive">   

            <h3 aling="center" style="text-align: center">DISPONIBILIDAD SUGERIDA</h3>

            <form id="usuario" name="Disponibilidad" method="post" >


                <table width="600" height="200" id ="tdispo" style="position: relative; left: 220px">


                    <tr  bordercolor="#FFFFFF" font="weight:bold" style="background:#2E64FE;opacity: 0.8;">
                        <td align="center" width="100" style="border: 3px solid #EFF5FB ">Jornada</td>

                        <?php
                        $dia = $ins->seldias();
                        for ($i = 0; $i < count($dia); $i++) {
                            ?>
                            <td align="center" width="100" style="border: 3px solid #EFF5FB "><?php echo utf8_encode($dia[$i]['valor']); ?></td>
                        <?php } ?>
                    </tr>

                    <?php
                    $dispo = $ins->seldisponi($usuarioid);


                    $jorn = $ins->seljornadas();

                    for ($j = 0; $j < count($jorn); $j++) {
                        ?>

                        <tr>
                            <td style="border-bottom: 1px solid #3730B9; background:#2E64FE;opacity: 0.8;border: 3px solid #EFF5FB ;" align="center" ><?php
                    $date = date_create($jorn[$j]['hora_inicio']);
                    $date1 = date_create($jorn[$j]['hora_fin']);
                    echo $jorn[$j]['jornada'] . '<br>' . date_format($date, 'g:i A') . '<br>' . date_format($date1, 'g:i A');
                        ?></td>
                                <?php
                            for ($i = 0; $i < count($dia); $i++) {
                                ?>

                                <td align="center" width="150" ><input style =" width: 20px;height: 20px;" class="form-control" 
                                                                       type="checkbox" name="chequeo[<?php echo $jorn[$j]['idjornada'] . "_" . $dia[$i]['idvalor']; ?>]" 
        <?php
        for ($d = 0; $d < count($dispo); $d++) {

            if (($jorn[$j]['idjornada'] . "_" . $dia[$i]['idvalor']) == ($dispo[$d]['jornadaid'] . "_" . $dispo[$d]['dia'])) {
                echo 'checked';
            } else {
                echo 'folse';
            };
            ?> 
                                                                       <?php }; ?> value=1">  </td>  
                                                                   <?php
                                                                   };
                                                               };
                                                               ?>         

                </table>

                <table>
                    <tr>
                    <a href="home.php" style="position: relative;left: 315px;top: 50px;width: 215px;"><h4>volver</h4></a>
                    </tr>
                    <tr>
                        <td><input style="position: relative;left: 415px;top: 15px;width: 215px;" type="submit" name="Submit" value="Sugerir" onClick="alert('Su sujerencia fue registrada correctamente')"/></td>
                    </tr>
                </table>




            </form>
        </div>
    </body>
</html>



