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
                    include("vista/vregistrarusuario.php");
                } else if ($Pac == "103") {
                    include("vista/vcrearhorario.php");
                } else if ($Pac == "104") {
                    if (is_null($Up)) {
                        include("vista/varea.php");
                    } else {
                        include("vista/varea1.php");
                    }
                } else if ($Pac == "105") {
                    include("vista/veditarusuario.php");
                } else if ($Pac == "106") {
                    if (is_null($Up)) {
                        include("vista/vprograma.php");
                    } else {
                        include("vista/vprograma1.php");
                    }
                } else if ($Pac == "107") {
                    include("vista/vcambiarcontra.php");
                } else if ($Pac == "108") {
                    if (is_null($Up)) {
                        include("vista/vCompetencia.php");
                    } else {
                        include("vista/vCompetencia1.php");
                    }
                } else if ($Pac == "109") {
                    include("vista/vdisponi.php");
                }else if ($Pac == "110") {
                    include("vista/vhorario.php");
                }else if ($Pac == "111") {
                    include("vista/vverhorario.php");
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
                } else if ($Pac == "119") {
                    include ("vista/vsede.php");
                } else if ($Pac == "127") {
                    include("vista/vlistarsede.php");
                } else if ($Pac == "115") {
                    if (is_null($Up)) {
                        include("vista/vambiente.php");
                    } else {
                        include("vista/vambiente1.php");
                    }
                } else if ($Pac == "116") {

                    include("vista/vjornada.php");
                    // include("vista/vparametro.php"); 

                    
                } else if ($Pac == "117") {
                    include("vista/v_parametro.php");
                } else if ($Pac == "118") {
                    include("vista/vlistarjor.php");
                } else if ($Pac == "119") {
                    //include("vista/vCompetencia.php");
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