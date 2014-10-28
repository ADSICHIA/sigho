<?php
                        $Pac = isset($_GET["pac"]) ? $_GET["pac"] : NULL;
                        $Up = isset($_GET["up"]) ? $_GET["up"] : NULL;
                        if (is_null($Pac)) {
							echo "Home usuario";
                            /*if($perusu==2){
                            include("vista/vcontes.php");
							}else if($perusu==1){
                            include("vista/vencuapren.php");
							}*/
                         } else if ($Pac == "110") {
                            include("vista/vgrupo.php");                             
                        } else if ($Pac == "101") {
                            include("vista/vregistro.php");
						} else if ($Pac == "102") {
                            include("vista/vvalor1.php");
                        } else if ($Pac == "103") {
                            include("vista/vparametro.php");
                        } else if ($Pac == "104") {
							include("vista/vparametro.php");
                        } else if ($Pac == "105") {
                            include("vista/vperfil.php");
                        } else if ($Pac == "106") {
                            include("vista/vprograma.php");
                        } else if ($Pac == "107") {
                        	include("vista/vficha.php");
                        } else if ($Pac == "108") {
                           include("vista/vaprendiz.php");
                        } else if ($Pac == "109") {
                           include("vista/vencuesta.php");
                        } else if ($Pac == "110") {
                           include("vista/vcontes.php");
                        } else if ($Pac == "111") {
                           include ("vista/vencuapren.php");
                        } else if ($Pac == "112") {
                           include ("vista/vencuapren.php");
                        } else if ($Pac == "113") {
                           include ("vista/vestadi.php");
                        } else if ($Pac == "114") {
                          include("vista/vpromas.php");
                        } else if ($Pac == "115") {
                          include("vista/vfichamas.php");
                        } else if ($Pac == "116") {
                          include("vista/vaprenmas.php");
                        } else if ($Pac == "117") {
                          include("vista/vpre.php");
                        } else if ($Pac == "118") {
                           include("vista/vregistrousu.php");
						}
								
                       
                        
                        ?>