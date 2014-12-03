<?php 
    include ("modelo/mhorario.php");
    $ins = new mhorario();

    //print_r($_POST);

    $grupoid = isset($_POST["grupo"]) ? $_POST["grupo"]:NULL;
    $agendado = isset($_POST["agenda"]) ? $_POST["agenda"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    //echo $grupoid." - ".$jornadaid;

    $dat = $ins-> seleccionArea();
    $dat1 = $ins-> seleccionJornada();
    
    $jorna=array();
    $validar;
/*-------------------------------------------------------------------------------------------------------*/
/*-----------------------------------INSERTAR------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------*/
    if(!$actu && $grupoid){
        
    	foreach ($_POST["jornada"] as $key => $value) {
    		//echo $key."--".$value."<br>";
            if ($value==0 || $value=="") {
        		
            }else{
                $dat2 = $ins-> seleccionHorario($value, $grupoid, $key);
                //echo $dat2[0];
                if ($dat2!=0) {
                    $validar = 1;
               //     echo "El registro ya esta";
                }else{
                    $validar = 0;
                 //   echo "El registro no esta";

                }
            }
    	}
        foreach ($_POST["jornada"] as $key => $value) {
            $jorna[$key]=$value;
        }

        if ($validar==0) {
             foreach ($_POST["dia"] as $key => $values) {
                        //echo $key."--".$value."<br>";
                        $ins->insertar($grupoid, $key, $values, $jorna[$key]);         
                        $ins->ReducirHoras($values,$jorna[$key],$key);     
                    //echo "<label>El Horario se guardo.</label>";  
                    }
        }else{
                             
        }
    }
/*-------------------------------------------------------------------------------------------------------*/
/*-------------------------------ACTUALIZAR--------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------*/
    $hora=array();
    if ($actu) {

        foreach ($_POST["jornada"] as $key => $value) {
            $hora[$key]=$value;
        }

        foreach ($_POST["day"] as $key => $value) {
            
            if ($value==0 || $value=="") {
                
            }else{
                $dat3 = $ins-> Validacion($key, $grupoid);
                if ($dat3[0]==0 || $dat3[0]=="") {
                    $ins->insertar($grupoid, $key, $value, $hora[$key]);         
                    $ins->ReducirHoras($value,$hora[$key],$key);    
                }else{
                    if ($dat3[0]==$value) {
                     
                    }else{
                        //echo "ala";
                        $valor = $ins-> QuitarHoras($dat3[0], $hora[$key],$key);
                        $actua = $ins-> Actualizar($value, $grupoid, $key, $hora[$key]);
                    }
                }
            }
        }
    }
/*-------------------------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------*/

?>