<?php
	include_once("controlador/chorario_programa.php");
?>
<div id="filtro">
	
</div>
<div id="horario">

</div>
<script type="text/javascript">

	$(document).ready(function() {
		
		$('#horario').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			lang: 'es',
			defaultDate: '<?php echo $week_lunes; ?>',
			defaultView: 'agendaWeek',
			editable: false,
			firstDay:1,
			events: [
					<?php
					$count=count($horario_grupo);
					$registros=1;
					foreach ($horario_grupo as $horario) {
						$dias_arestar=$ins->getDiaSuma($horario["diaSemana"]);
						//echo $dias_arestar;
						$fecha_dia=date('Y-m-d',strtotime('+'.($dias_arestar).'day',strtotime($week_lunes)));
						//echo $fecha_dia;
						echo '{';
						echo "id:".$horario['idhorario'].",";
						echo "title:'".$horario["instructor"]."',";
						echo "start: '".$fecha_dia."T".$horario["inicio"]."',";
						echo "end: '".$fecha_dia."T".$horario["fin"]."'";
						if($count==$registros){
							echo '}'.PHP_EOL;	
						}else{
							echo '},'.PHP_EOL;;
						}
						$registros++;

					}
					?>
			]
		});
		
	});

</script>