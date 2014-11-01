<?php
include ("controlador/conexion.php");
class mcontra{
	var $arr;
	
	function mcontra(){}

	function UpDateEncxapr($ndocaprex, $ndocapre){
		//echo "aqui va, ya casi";
		$sql = "UPDATE encxapr SET ndocapre='".$ndocapre."' WHERE ndocapre='".$ndocaprex."';";
		//echo $sql;
		$this->cons($sql);
	}
	function UpDateResapre($ndocaprex, $ndocapre){
		//echo "aqui va, ya casi";
		$sql = "UPDATE resapre SET nodcapre='".$ndocapre."' WHERE nodcapre='".$ndocaprex."';";
		//echo $sql;
		$this->cons($sql);
	}
	function UpDateExplaboral($ndocaprex, $ndocapre){
		//echo "aqui va, ya casi";
		$sql = "UPDATE explaboral SET ndocapre='".$ndocapre."' WHERE ndocapre='".$ndocaprex."';";
		//echo $sql;
		$this->cons($sql);
	}

	function Duplicidad($ndocumento){
		$sql = "SELECT count(ndocapre) as total FROM aprendiz WHERE ndocapre='".$ndocumento."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data[0]["total"];
	}
	function insapre($ndocapre, $tdocapre, $nomapre, $apeapre, $telapre, $genapre, $nlmiapre, $estcapre, $dirapre, $emaapre, $codubi, $fenaapre, $nfic, $llamaapre, $teleapre, $pass, $idper, $sangre, $emails, $telefono, $fechadeinicio){
		$sql = "INSERT INTO aprendiz (ndocapre, tdocapre, nomapre, apeapre, telapre, genapre, nlmiapre, estcapre, dirapre, emaapre, codubi, fenaapre, nfic, llamaapre, teleapre, pass,idper, sangre, email, telefono, fechadeinicio) values 
		('".$ndocapre."', '".$tdocapre."', '".$nomapre."', '".$apeapre."', '".$telapre."', '".$genapre."', '".$nlmiapre."', '".$estcapre."', '".$dirapre."', '".$emaapre."', '".$codubi."',
		 '".$fenaapre."', '".$nfic."', '".$llamaapre."', '".$teleapre."', '".$pass."', '".$idper."', '".$sangre."', '".$emails."', '".$telefono."', '".$fechadeinicio."');";
		 //echo $sql;
		$this->cons($sql);
	}
	function UpDate($ndocaprex, $ndocapre, $tdocapre, $nomapre, $apeapre, $telapre, $genapre, $nlmiapre, $estcapre, $dirapre, $emaapre,$codubi,$fenaapre,$nfic,$llamaapre,$teleapre,$pass,$idper, $sangre, $emails, $telefono){
		//echo "aqui va, ya casi";
		$sql = "UPDATE aprendiz SET ndocapre='".$ndocapre."', tdocapre='".$tdocapre."', nomapre='".$nomapre."', apeapre='".$apeapre."', telapre='".$telapre."', genapre='".$genapre."', nlmiapre='".$nlmiapre."', estcapre='".$estcapre."', dirapre='".$dirapre."', emaapre='".$emaapre."', codubi='".$codubi."', fenaapre='".$fenaapre."', nfic='".$nfic."', llamaapre='".$llamaapre."', teleapre='".$teleapre."', pass='".$pass."', idper='".$idper."', sangre='".$sangre."', email='".$emails."', telefono='".$telefono."' WHERE ndocapre='".$ndocaprex."';";
		//echo $sql;
		$this->cons($sql);
	}
	function delapre($ndocapre){
		$sql = "DELETE FROM aprendiz WHERE ndocapre='".$ndocapre."';";
		$this->cons($sql);
	}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	function selubiciudad(){
		$sql = "SELECT codubi, nomubi, depubi FROM ubicacion;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selubi(){
		$sql = "SELECT codubi, nomubi FROM vieubica;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selficha(){
		$sql = "SELECT nfic, codpro FROM ficha;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selfichapro($ficha){
		$sql = "SELECT nfic, codpro FROM ficha WHERE nfic='".$ficha."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selprograma(){
		$sql = "SELECT codpro, nompro FROM programa ORDER BY  programa.nompro;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selper(){
		$sql = "SELECT idper, nomper FROM perfil;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selpara1($num){
		$sql = "SELECT codval, nomval, codpar FROM valor where codval='".$num."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selpara($a){
		$sql = "SELECT codval, nomval, codpar FROM valor WHERE codpar='".$a."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selusu($documento){
		$sql = "SELECT * FROM aprendiz where ndocapre='".$documento."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selres1($ndocapre){
		$sql = "SELECT ndocapre, tdocapre, nomapre, apeapre, telapre, genapre, nlmiapre, estcapre, dirapre, emaapre, codubi, fenaapre, nfic, llamaapre, teleapre, pass, idper, telefono, sangre, email, fechadeinicio FROM aprendiz WHERE ndocapre='".$ndocapre."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
		function selusu1(){
		$sql = "SELECT * FROM aprendiz";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>