<?php

include ("modelo/mCompetencia.php");
include ("modelo/mpagina.php");

$ins = new mCompetencia();
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : NULL;
$idprograma = isset($_POST["programaid"]) ? $_POST["programaid"] : NULL;
$calificado = isset($_POST["calificado"]) ? $_POST["calificado"] : NULL;
$filtro = isset($_GET["filtro"]) ? $_GET["filtro"] : NULL;
$pr = isset($_GET['pr']) ? $_GET['pr'] : NULL;
$actu = isset($_POST["actu"]) ? $_POST["actu"] : NULL;
$delete = isset($_GET["del"]) ? $_GET["del"] : NULL;
$idcompetencia = isset($_POST["idcompetencia"]) ? $_POST["idcompetencia"] : NULL;

$coun= isset($_GET["coun"]) ? $_GET["coun"] : NULL;


if ($coun){
    for($i=0;$i<$coun;$i++){
        $res= isset($_GET["res_".$i]) ? $_GET["res_".$i] : NULL;
        if ($res){
           $ins->insert1($usuario, $idprograma, $calificado,$idcompetencia,$res);
        }
    }
}

if ($delete) {
    $ins->delete($delete);
}
$idcompetencia = isset($_POST["idcompetencia"]) ? $_POST["idcompetencia"] : NULL;






$pac = isset($_GET["pac"]) ? $_GET["pac"] : NULL;

$pr = isset($_GET['pr']) ? $_GET['pr'] : NULL;
$idcompetencia = isset($_POST['idcompetencia']) ? $_POST['idcompetencia'] : NULL;



$editar = $ins->selEditar($pr);
/* foreach ($result as $res){
  $resultado = isset($_POST['res_'.$res['valuea']]) ? $_POST['res_'.$res['value']]:NULL;
  echo "aqui",$resultado;
  } */

if ($usuario && $idprograma && !is_null($calificado) && !$actu) {
    $ins->insert($usuario, $idprograma, $calificado);
}

if ($usuario && $idprograma && !is_null($calificado) && $actu) {
    $ins->update($idcompetencia, $calificado);
}


$bo = "";
$nreg = 10; //numero de registros a mostrar
$pag = new mpagina($nreg);
$conp = "SELECT count(c.idcompetencia) as Npe, p.programa FROM competencia as c inner join programa as p on p.idprograma = c.programaid";
if ($filtro) {
    $conp.= " WHERE p.programa LIKE '%" . $filtro . "%'";
}

$programa = $ins->SelPrograma();
?>