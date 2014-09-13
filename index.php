<?php 
    session_start();
    include_once("./modelo/conexion.php"); 
?>
<!--<!DOCTYPE HTML>-->
<html>
    <head>
        <meta charset="UTF-8"/>
        <link href="./vista/css/reset.css" type="text/css" rel="stylesheet">
        <link href="./vista/css/style.css" type="text/css" rel="stylesheet">
        <link href='./vista/css/fullcalendar.css' rel='stylesheet' />
        <link href='./vista/css/demo_page.css' rel='stylesheet' />
        <link href='./vista/css/demo_table.css' rel='stylesheet' />
        <link href='./vista/css/fullcalendar.print.css' rel='stylesheet' media='print' />
        <script src='./js/jquery.min.js'></script>
        <script src='./js/jquery-ui.custom.min.js'></script>
        <script src='./js/fullcalendar.min.js'></script>
        <script src='./js/jquery.dataTables.js'></script>
        <title> Inicio </title>
        
    </head>
    <script>
	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		$('#calendar').fullCalendar({
			editable: true,
                        height: 550,
                        weekends:false,
                        agendaWeek:true,
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-2)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/'
				}
			]
		});
                

	});
</script>
    <body>	
        <header>
            <img src="vista/imagenes/banner.jpg" />
            <?php include_once("./menu.php"); ?>
        </header>
        <article>
        
            <?php
//                if(isset($_GET["controlador"])){
//                    $link="./controlador/".$_GET["controlador"];
//                    //$link="./controlador/c_ficha.php";
//                    include_once($link); 
//                    //include_once("./contenido.php"); 
//                    //include_once("./controlador/c_login.php"); 
//                    //include_once("./vista/v_dia_titulacion.php"); 
//                    //include_once("./vista/v_ubicacion.php"); 
//                }else{
//                    include_once("./vista/calendar.php"); 
//                }
                if(isset($_GET["vista"])){
                    $link="./vista/".$_GET["vista"];
                    include_once($link); 
                    //include_once("./contenido.php"); 
                    //include_once("./controlador/c_login.php"); 
                    //include_once("./vista/v_dia_titulacion.php"); 
                    //include_once("./vista/v_ubicacion.php"); 
                }else{
                    include_once("./vista/calendar.php"); 
                }
            ?>
        
        </article>
        <footer>
            <?php //include_once("./pie.php"); ?>
        </footer>
        </body>
</html>
