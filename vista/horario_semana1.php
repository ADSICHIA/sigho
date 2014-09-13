<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http:// www.w3c.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
	$doc=isset($_POST['doc'])?$_POST['doc']:NULL;
	//$ficha=isset($_POST['ficha'])?$_POST['ficha']:NULL;
	$ges= new mvc();
	if($doc){
		//echo "entre";
		$res1=$ges->horarioActual($doc);
		
		$res=$ges->horario($doc,$res1[0]["fecha_ini"]);
		//var_dump($sql);
		//var_dump($res);
	}
	if(isset($res)){
		$vec=$ges->datosHorario($res);
						//echo "-----";
						//var_dump($vec);
						//echo "-----";
						//var_dump($res);
	}				
	?>
<script type="text/javascript">
		
	window.onload = function() {

		//var tbody= document.getElementById("body");
		//var tr= document.getElementById("inicio");
		//var td = document.createElement("td");
		//td1.appendChild(document.createTextNode('hola'));
		//tr.appendChild(td);
		//tbody.appendChild(tr);
		//tbody.appendChild(tr);
		<?php
			$i=0;
			if(isset($res1)){
			
			while($i<count($vec)){
		?>		
		<?php	
				if(isset($vec[0])){
				?>
				   var td = document.createElement("td");
					td.innerHTML="<?php echo $vec[0]; ?>";
					
					var tda = document.getElementById("lunes");
					tda.parentNode.replaceChild(td,tda);
				<?php
				}
				if(isset($vec[1])){
				?>
					var td = document.createElement("td");
					td.innerHTML="<?php echo $vec[1]; ?>";
					
					var tda = document.getElementById("martes");
					tda.parentNode.replaceChild(td,tda);
				<?php
				}
				if(isset($vec[2])){
				?>
					var td = document.createElement("td");
					td.innerHTML="<?php echo $vec[2]; ?>";
					
					var tda = document.getElementById("miercoles");
					tda.parentNode.replaceChild(td,tda);
					
				<?php
				
				}
				if(isset($vec[3])){
				?>
					var td = document.createElement("td");
					td.innerHTML="<?php echo $vec[3]; ?>";
					
					var tda = document.getElementById("jueves");
					tda.parentNode.replaceChild(td,tda);
					
				<?php
				
				}
				if(isset($vec[4])){
				?>
					var td = document.createElement("td");
					td.innerHTML="<?php echo $vec[4]; ?>";
					
					var tda = document.getElementById("viernes");
					tda.parentNode.replaceChild(td,tda);
					
				<?php
				
				}
				if(isset($vec[5])){
				?>
					var td = document.createElement("td");
					td.innerHTML="<?php echo $vec[5]; ?>";
					
					var tda = document.getElementById("sabado");
					tda.parentNode.replaceChild(td,tda);
					
				<?php
				
				}
				if(isset($vec[6])){
				?>
					var td = document.createElement("td");
					td.innerHTML="<?php echo $vec[6]; ?>";
					
					var tda = document.getElementById("domingo");
					tda.parentNode.replaceChild(td,tda);
					
				<?php
				
				}
			}
			$i++;
		}	
		?>
	}	
</script>
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
	<!--<div id="td">
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
	</div>-->

	<div id="submit">
		<input type="submit" name="send">
	</div>
</div>
</form>
	<table border="1" name="tabla">
		<thead>
			<tr id="cabezote">
				<td >
					Lunes
				</td>
					
				<td>
					Martes
				</td>
				<td>
					Miercoles
				</td>
				<td>
					Jueves
				</td>
				<td>
					Viernes
				</td>
				<td>
					Sabado
				</td>
				<td>
					Domingo
				</td>
			</tr>	
		</thead>
		<tbody id="body">
		
			<tr id="inicio">
				<td id="lunes">
				</td>
				<td id="martes">
				</td>
				<td id="miercoles">
				</td>
				<td id="jueves">
				</td>
				<td id="viernes">
				</td>
				<td id="sabado">
				</td>
				<td id="domingo">
				</td>
			</tr>
			
		</tbody>
	</table>
<footer>
</footer>
</body>

<script>
</script>

</html>