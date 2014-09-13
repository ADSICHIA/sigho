<?php
include_once('./modelo/conexion');
$link = new conexion();
$link->conectarDB();
$query_municipios = "Select * from ubicacion where depende=0";
$result_municipio = mysql_query($query_municipios) or die("Error de la consulta");
?>
<label for="ddl_municipio" name="lbl_municipio" id="lbl_municipio">Municipio</label>
<select name="" onchange="recargarUbicacion(this)">
    <option>Seleccion</option>
    <?php while ($row = mysql_fetch_assoc($result_municipio)) { ?>
        <option value="<?php echo $row['cod_ubicacion']; ?>"><?php echo $row['nom_ubicacion']; ?></option>
        <?php
    }
    ?>
</select>
<br/>
<label for="ddl_sede" name="lbl_sede" id="lbl_municipio">Sede</label>
<select name="ddl_sede" id="ddl_sede">
    <option>Seleccion</option>
</select>
<script type="text/javascript">
    
    function recargarUbicacion(ddl){
        var myObject = {myFunct: "ClientesActualizar", depende: ddl.value};
        $.ajax({
            url: "./modelo/m_ubicacion.php",
            data: myObject,
            type: "POST",
            dateType: "json",
            success: function(data) {
                for(i=0;i<data.length;i++){
                    ddl.append(new Option(data[i]["codigo"],data[i]["ubicacion"])).html( data.html );
                }
            },
            error: function() {
                alert("Ocurrio un error al consultar la ubicacion");
            }
        });
    }

</script>
