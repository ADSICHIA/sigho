<?php
	include ("modelo/mgrupo.php");
        //include ("modelo/mpagina.php");
      
	$ins = new mgrupo();
	//Eliminar
       
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	if ($del){
            $existe1=$ins->selhorario($del);
             $existe2=$ins->selficha($del);
             $countR = count($existe1);
             $countR1 = count($existe2);
             if ($countR >=1 or $countR1 >=1 ){
                  ?>
            <script language="javascript">
            alert ("El grupo no se puede eliminar porque tiene horarios o fichas asignadas");
            location.href='home.php?pac=111';
            </script>
              <?php   
                 
                 
                 
             }else{
                   $ins->delgrupo($del);         
            ?>
            <script language="javascript">
            alert ("Grupo eliminado");
           location.href='home.php?pac=111';
            </script>
              <?php   
             }
          
             
             
          
	
	
	}
         $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
        $act = isset($_GET["act"]) ? $_GET["act"]:NULL;
        if ($act){
             if ($act==2){
                 $ins->cambiar1(0,$pr);
                  ?>
            <script language="javascript">
          
           location.href='home.php?pac=111';
            </script>
              <?php   
                 
                 
                 
             }else{
                    $ins->cambiar2(1,$pr);
                     ?>
            <script language="javascript">
          
           location.href='home.php?pac=111';
            </script>
              <?php   
                 
                    
                 
             }
            
            
            
        }
        
        
        //$pac=107;
        //$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
     
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
        if ( $idgrupo&&$nombregr && $director && $ambiente && $actu) {
           
		$ins->upgrupo($idgrupo,$nombregr ,$director , $ambiente);
                ?>
		<script language="javascript">
		 alert ("Grupo Editado");
                 location.href='home.php?pac=111';
                 
	
</script>
<?php
        }
         $datos1=$ins->selgrupo1($pr);
	$seldirector=$ins->seldirector();
        
        $selambiente=$ins->selambiente();
        $datos=$ins->selgrupo();
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