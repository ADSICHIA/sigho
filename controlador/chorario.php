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
    

    if(!$actu && $grupoid){
        
    	foreach ($_POST["jornada"] as $key => $value) {
    		//echo $key."--".$value."<br>";
    		$dat2 = $ins-> seleccionHorario($value, $grupoid, $key);
            //echo $dat2[0];
    		if ($dat2==0) {

    			if ($value==0 || $value=="") {

    			}else{
                    foreach ($_POST["dia"] as $key => $values) {
                        //echo $key."--".$value."<br>";
                        $ins->insertar($grupoid, $key, $values, $value);         
                        $ins->ReducirHoras($values,$value,$key);     
                    //echo "<label>El Horario se guardo.</label>";  
                    }
					
				}
			}else{
                //echo "El grupo";
            }
    	}
    }

    if ($actu) {
        
        foreach ($_POST["day"] as $key => $value) {
            
            if ($value==0 || $value=="") {
                
            }else{
                $dat3 = $ins-> Validacion($key, $grupoid);
                if ($dat3[0]==0 || $dat3[0]=="") {
                    $ins->insertar($grupoid, $key, $value, $jornadaid);         
                    $ins->ReducirHoras($value,$jornadaid,$key);    
                }else{
                    if ($dat3[0]==$value) {
                     
                    }else{
                        echo "ala";
                        $valor = $ins-> QuitarHoras($dat3[0], $jornadaid,$key);
                        $actua = $ins-> Actualizar($value, $grupoid, $key, $jornadaid);
                    }
                }
            }
        }
    }

?>