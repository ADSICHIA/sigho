<?php
//------------------------------- PAGINACION ----------------------------
//include ("controlador/conexion.php");
class mpagina{
	var $nrini;
	var $nrfin;
	var $nrm;
	
	function mpagina($nreg){
		$this->nrini = 0;
		$this->nrfin = $nreg;
	}
   //cambiar consulta que lleve count de todos los registros a mostrar
	function spag($sqlnp, $nreg, $pac, $bo){
   //cambiar numero de registros a mostrar por pagina
		$this->nrm=$nreg;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
 		$datanp = $conexionBD->ejeCon($sqlnp,0);
		
		$this->nrfin = $nreg;
		$npag=round($datanp[0]['Npe']/$this->nrm);
		$rfal=($datanp[0]['Npe']-($npag*$this->nrm));
		if($rfal>0)
			$npag=$npag+1;
		$npg = isset($_GET["npg"]) ? $_GET["npg"]:NULL;
		
		$mpag = "<form name='f2i' action='home.php' method='get'>";
		if (is_null($npg))
			$npg=1;
		$this->nrini=(($npg-1)*$this->nrm);
		$this->nrm=(($npg-1)*$this->nrm+($this->nrm));
		$mpag .= "Registros: ".($this->nrini+1)." - ";
		if($this->nrm<$datanp[0]['Npe'])
			$mpag .= $this->nrm; else $mpag .= $datanp[0]['Npe'];
		$mpag .= " de ".$datanp[0]['Npe']."&nbsp;&nbsp;&nbsp;  <p>";
		$mpag .= "<select name='npg' onChange='this.form.submit();' style='width: 80px'>";
		for ($q=1;$q<=$npag;$q++){
			if ($q==$npg)
				$sele="SELECTED";
			else
				$sele="";
			$mpag .=  "<option ".$sele.">".$q."</option>";
		}
		$mpag .= "</select>&nbsp;&nbsp;";
   //cambiar el pac por el de la pagina a mostrar o la que se esta trabajando.
		$mpag .= "<input type='hidden' name='pac' value='".$pac."'>";
		$mpag .= $bo;
		$mpag .= "</form>";
		echo $mpag;
	}
	
	function rvalini(){
		return $this->nrini;
	}
	
	function rvalfin(){
		return $this->nrfin;
	}
//------------------------------- PAGINACION ----------------------------
}
?>