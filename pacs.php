<?php

$Pac = isset($_GET["pac"]) ? $_GET["pac"] : NULL;
$Up = isset($_GET["up"]) ? $_GET["up"] : NULL;
                if (is_null($Pac)) {
                    echo "Home usuario";
                    /* if($perusu==2){
                      include("vista/vcontes.php");
                      }else if($perusu==1){
                      include("vista/vencuapren.php");
                      } */
                } else if ($Pac == "101") {
                    include("vista/vlistagrupo.php");
                } else if ($Pac == "102") {
                    include("vista/vvalor1.php");
                } else if ($Pac == "103") {
                    include("vista/vcrearhorario.php");
                } else if ($Pac == "104") {
                    include("vista/varea.php");
                } else if ($Pac == "105") {
                    include("vista/vFormRol.php");
                } else if ($Pac == "106") {
                    if (is_null($Up)) {
                        include("vista/vprograma.php");
                    } else {
                        include("vista/vprograma1.php");
                    }
                } else if ($Pac == "107") {
                    include("vista/vcambiarcontra.php");
                } else if ($Pac == "108") {
                    include("vista/vCompetencia.php");
                } else if ($Pac == "109") {
                    include("vista/vdisponi.php");
                } else if ($Pac == "113") {
                    include("vista/vgrupo.php");
                } else if ($Pac == "113") {
                    include ("vista/vlistagrupo.php");
                } else if ($Pac == "112") {
                    if (is_null($Up)) {
                        include ("vista/vficha.php");
                    } else {
                        include ("vista/vficha1.php");
                    }
                } else if ($Pac == "113") {
                    include ("vista/vsede.php");
                } else if ($Pac == "114") {
                    include("vista/vlistarsede.php");
                } else if ($Pac == "115") {
                    include("vista/vambiente.php");
                } else if ($Pac == "116") {

                    include("vista/vjornada.php");
                    // include("vista/vparametro.php"); 

                    
                } else if ($Pac == "117") {
                    include("vista/v_parametro.php");
                } else if ($Pac == "118") {
                    include("vista/vlistarjor.php");
                } else if ($Pac == "119") {
                    // include("vista/vjornada.php");
                    //include("vista/vparametro.php"); 
                } else if ($Pac == "117") {
                    //include("vista/vlistarjor.php");
                } else if ($Pac == "118") {
                    include("vista/v_parametro.php");
                } else if ($Pac == "119") {

                } else if ($Pac == "119") {

                    include("vista/vsede.php");
                } else if ($Pac == "120") {
                    include("vista/vlistagrupo.php");
                }
?>