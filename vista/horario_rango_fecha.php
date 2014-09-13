<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http:// www.w3c.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
	$doc=isset($_POST['doc'])?$_POST['doc']:NULL;
	$fi=isset($_POST['fecha_ini'])?$_POST['fecha_ini']:NULL;
	$ff=isset($_POST['fecha_fin'])?$_POST['fecha_fin']:NULL;
	//$ficha=isset($_POST['ficha'])?$_POST['ficha']:NULL;
	$ges= new controldorHorarioRango();
	if($doc && $fi && $ff){
		//echo "entre";
		$res1=$ges->horario($doc,$fi,$ff);
		
		
		//var_dump($sql);
		//var_dump($res1);
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
		ingrese su documento
	</div>

</div>

<div id="tr">
	<div id="td">
		<input type="text" name="doc">
	</div>
	<div id="td">
		ingrese fecha inicial
	</div>
		<div id="td">
		<input type="date" name="fecha_ini">
	</div>
	<div id="td">
		ingrese fecha final
	</div>
		<div id="td">
		<input type="date" name="fecha_fin">
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
					Jornada
				</td>
					
				<td>
					Programa
				</td>
				<td>
					Ficha
				</td>
				<td>
					aula
				</td>
				
			</tr>	
		</thead>
		<tbody>
		<?php
		$i=0;
		if(isset($res1)){
			while($i<count($res1)){
		?>
		<tr>
			<td>
				<?php
					echo $res1[$i]["nom_usuario"];
				?>
			</td>
			<td>
				<?php
					echo $res1[$i]["nom_programa"];
				?>
			</td>
			<td>
				<?php
					echo $res1[$i]["cod_titulacion"];
				?>
			</td>
			<td>
				<?php
					echo $res1[$i]["nom_ubicacion"];
				?>
			</td>
		</tr>
		<?php
					$i++;
			}
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