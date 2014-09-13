<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http:// www.w3c.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
	$doc=isset($_POST['doc'])?$_POST['doc']:NULL;
	
	//$ficha=isset($_POST['ficha'])?$_POST['ficha']:NULL;
	$ges= new controladorResumenHoras();
	if($doc){
		$hactual=$ges->horarioActual($doc);
		$res=$ges->horario($doc,$hactual[0]["fecha_ini"]);
		//var_dump($res);
		$resumen=$ges->ResumenHoras($res);
		//var_dump($resumen);
	}
	?>
	

<title></title>
</head>
<body>
<header>

</header>
<form name="form1" method="post" action="">
<div id="tr">
	<div id="td">
		ingrese el numero de documento
	</div>

</div>

<div id="tr">
	<div id="td">
		<input type="text" name="doc">
	</div>
	

	<div id="submit">
		<input type="submit" name="send">
	</div>
</div>
</form>
	<table border="1" name="tabla">
		<thead>
			<tr id="cabezote">
				<td >
					Resumen al mes
				</td>
					
				
				
			</tr>	
		</thead>
		<tbody>
		<?php
		
		if(isset($resumen)){
			
		?>
			<tr>
				<td>
					<?php
						echo $resumen*4;
					?>
				</td>
			</tr>
		<?php
					
			}
				
		?>
		</tbody>
		
	</table>
<footer>
</footer>
</body>

<script>
</script>

</html>