<?php
	include ("modelo/mgrupo.php");
        //include ("modelo/mpagina.php");
      
	$ins = new mgrupo();
	//Eliminar
       
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	if ($del){
             $existea=$ins->selalumno($del);
             $countR = count($existea);
             if ($countR >=1){
                  ?>
            <script language="javascript">
            alert ("Para poder eliminar esta ruta primero debe asignar a los alumnos que viajan en esta ruta a otra");
            location.href='home.php?acceso=102';
            </script>
              <?php   
                 
                 
                 
             }else{
                   $ins->delruta($del);         
            ?>
            <script language="javascript">
            alert ("Registro eliminado");
           location.href='home.php?acceso=102';
            </script>
              <?php   
             }
          
             
             
          
	
	
	}
        
        //$pac=107;
        //$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
     $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
        $idgrupo= isset($_POST["idgrupo"]) ? $_POST["idgrupo"]:NULL;
	$nombregr = isset($_POST["nombre"]) ? $_POST["nombre"]:NULL;
	$director = isset($_POST["director"]) ? $_POST["director"]:NULL;
	$ambiente= isset($_POST["ambiente"]) ? $_POST["ambiente"]:NULL;
	$actu= isset($_POST["actu"]) ? $_POST["actu"]:NULL;
 
	if ($nombregr && $director && $ambiente &&!$actu) {
		$ins->insgrupo($nombregr ,$director , $ambiente);
                ?>
		<script language="javascript">
		 alert ("Grupo Creado con \u00e9xito");
                 //location.href='home.php?pac=107';
	
</script>
  
<?php
		
	}
        if ($placa && $npuesto && $idconductor  && $idruta && $modelo && $idmarca && $actu ) {
           
		$ins->upruta($placa,$npuesto,$idconductor ,$idruta ,$modelo,$idmarca);
                ?>
		<script language="javascript">
		 alert ("Ruta  actualizada ");
                 
	
</script>
<?php
        }

	$seldirector=$ins->seldirector();
        
        $selambiente=$ins->selambiente();
	//$det = $ins->selper();
        //$datos =$ins->selruta();
        //$marca =$ins->selmarca();

       //Paginar
	   /*
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="select count(ap.ndocapre) as Npe from aprendiz as ap inner join valor as va1 on 
ap.tdocapre=va1.codval inner join  valor as va2  on 
ap.genapre=va2.codval 
inner join valor as va3 on  ap.estcapre=va3.codval  inner join 
ubicacion as ubi on ap.codubi=ubi.codubi 
 inner join perfil as per on ap.idper=per.idper  and ap.idper=2 ";
	if($filtro) $conp.= " WHERE ap.ndocapre LIKE '%".$filtro."%'";
       
      */ 
	
?>