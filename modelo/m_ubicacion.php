<?php
require_once('conexion');
if(isset($_REQUEST["myFunct"])){
    echo getUbicacion($_REQUEST["depende"]);
}else{
    echo json_encode("nollego nada");
}
function getUbicacion($depende){
    $link=new conexion();
    $link->conectarDB();
    $query="Select cod_ubicacion as codigo,nom_ubicacion as ubicacion from ubicacion where depende='$depende' order by nom_ubicacion";
    $result=  mysql_query($query);
    while($row= mysql_fetch_assoc($result)){
        $ubicacion[]=$row;
    }
    return json_encode($ubicacion);
}

?>
