<?php 
    include ("controlador/chorario.php");
?>
<!--Java Script-->
<script language="javascript" src="js/jquery-1.9.1.js"></script><!-- llamamos al JQuery-->
<script language="javascript">

    function RecargarProgramas(values,num,chang){

      var variable = {"variables" : values, "Numero" : num, "programa" : chang};

      if (num==1) {
        $.ajax({
          data: variable,
          url: 'vista/ver-horarios.php',
          type: 'post',
          success: function (respuesta){
            $("#reloadPrograma").html(respuesta);
          }
        });
      }else if (num==2){
            $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#reloadGrupo").html(respuesta);
              }
            });
      }else if (num==4) {
      	//var chang = {"Numero" : num, "programa" : chang};
      	$.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#lulu").html(respuesta);
              }
            });
      }
    }


    
</script>
<center>
<section>
  <form name="form" action="" method="POST">
	<div class="warui" align="center"><div><h1>Horarios Creados</h1></div>
	<div class="espacio"></div>
	<div class="espacio"></div>
	<div id="conteiner">
    <table align="center" border="0" cellspacing="" cellpadding="3" width="920px">
    <tr>
     <td align="left">
        <label>&nbsp;&nbsp;Escoja el Area: </label>
        <select name="area" id="area" onchange="javascript:RecargarProgramas(this.value,1,1);"  required>
        <option value="">Seleccione</option>
        <?php
            for ($i=0; $i <count($dat) ; $i++) {
        ?>
        <option value='<?php echo $dat[$i]["idarea"] ?>'><?php echo $dat[$i]['area'] ?></option>
        <?php
            }
        ?>
        </select>
     </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
    <td><div class="espacio"></div><div class="espacio"></div><div class="reload" id="reloadPrograma" ></div></td>
    <td><div class="espacio"></div><div class="espacio"></div><div class="reload" id="reloadGrupo" ></div></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    </table>

    <div class="espacio"></div>
    <div class="espacio"></div>

    </div>
    <div id="lulu"></div>
</div>
</form>
</section>
</center>


<script language="javascript">
var conteiner = document.getElementById("conteiner");
var q = document.getElementById("bot");
var z = document.getElementById("natsu");
var x = document.getElementById("kankaku");
var lunes = document.getElementById("day");
var martes = document.getElementById("day1");
var miercoles = document.getElementById("day2");
var jueves = document.getElementById("day3");
var viernes = document.getElementById("day4");
var sabado = document.getElementById("day5");
var domingo = document.getElementById("day6");
var primero = document.getElementById("cont");
var segundo = document.getElementById("cont1");
var tercero = document.getElementById("cont2");
var cuarto = document.getElementById("cont3");
var quinto = document.getElementById("cont4");
var sexto = document.getElementById("cont5");
var septimo = document.getElementById("cont6");

    function vertable(){
    x.className = "ver";
    }

    function verHorario(valor){
      conteiner.innerHTML = '';
      lunes.className = "lai";martes.className = "lai";miercoles.className = "lai";jueves.className = "lai";
      viernes.className = "lai";sabado.className = "lai";domingo.className = "lai";
      lunes.innerHTML = '';martes.innerHTML = '';miercoles.innerHTML = '';jueves.innerHTML = '';
        viernes.innerHTML = '';sabado.innerHTML = '';domingo.innerHTML = '';
      if (valor==5) {

        lunes.innerHTML = 'Lunes';
        martes.innerHTML = 'Martes';
        miercoles.innerHTML = 'Miercoles';
        jueves.innerHTML = 'Jueves';
        viernes.innerHTML = 'Viernes';
        sabado.innerHTML = 'Sabado';

        $("#day").toggleClass("dias");$("#day1").toggleClass("dias");$("#day2").toggleClass("dias");
        $("#day3").toggleClass("dias");$("#day4").toggleClass("dias");$("#day5").toggleClass("dias");

      }else if (valor==2 || valor==3 || valor==1) {

        lunes.innerHTML = 'Lunes';
        martes.innerHTML = 'Martes';
        miercoles.innerHTML = 'Miercoles';
        jueves.innerHTML = 'Jueves';
        viernes.innerHTML = 'Viernes';

        $("#day").toggleClass("tardema");$("#day1").toggleClass("tardema");$("#day2").toggleClass("tardema");
        $("#day3").toggleClass("tardema");$("#day4").toggleClass("tardema");

      }else if(valor==4){

        sabado.innerHTML = 'Sabado';
        domingo.innerHTML = 'domingo';

        $("#day5").toggleClass("tardema");$("#day6").toggleClass("tardema");
      }
    }

    function verEspacios(argu) {
      q.className = "voto";primero.className = "lunes";segundo.className = "martes";tercero.className = "miercoles";cuarto.className = "jueves";
        quinto.className = "viernes";sexto.className = "sabado";septimo.className = "domingo";
      if (argu==5) {
        primero.className = "reis";
        segundo.className = "reis";
        tercero.className = "reis";
        cuarto.className = "reis";
        quinto.className = "reis";
        sexto.className = "reis";
        q.className = "voto1";
      }else if (argu==2 || argu==3 || argu==1) {
        primero.className = "matarde";
        segundo.className = "matarde";
        tercero.className = "matarde";
        cuarto.className = "matarde";
        quinto.className = "matarde";
        q.className = "voto1";
      }else if (argu==4) {
        sexto.className = "matarde";
        septimo.className = "matarde";
        q.className = "voto1";
      };
    }

    function verCreados(){
    	conteiner.innerHTML = '';
    }

</script>