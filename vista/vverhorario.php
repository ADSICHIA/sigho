<?php 
    include ("controlador/chorario.php");
?>
<!--Java Script-->
<script language="javascript" src="js/jquery-1.9.1.js"></script><!-- llamamos al JQuery-->
<script language="javascript">

    function RecargarProgramas(values,num,chang,grup){
      var variable = {"variables" : values, "Numero" : num, "programa" : chang, "grupo" : grup};
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
      }else if (num==7) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#ReloadJornada").html(respuesta);
              }
            });
      }else if (num==8) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#ReloadJornada1").html(respuesta);
              }
            });
      }else if (num==9) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#ReloadJornada2").html(respuesta);
              }
            });
      }else if (num==10) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#ReloadJornada3").html(respuesta);
              }
            });
      }else if (num==11) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#ReloadJornada4").html(respuesta);
              }
            });
      }else if (num==12) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#ReloadJornada5").html(respuesta);
              }
            });
      }else if (num==13) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#ReloadJornada6").html(respuesta);
              }
            });
      }else if (num==14) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#lunes").html(respuesta);
              }
            });
      }else if (num==15) {

        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#martes").html(respuesta);
              }
            });
      }else if (num==16) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#miercoles").html(respuesta);
              }
            });
      }else if (num==17) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#jueves").html(respuesta);
              }
            });
      }else if (num==18) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#viernes").html(respuesta);
              }
            });
      }else if (num==19) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#sabado").html(respuesta);
              }
            });
      }else if (num==20) {
        $.ajax({
              data: variable,
              url: 'vista/ver-horarios.php',
              type: 'post',
              success: function (respuesta){
                $("#domingo").html(respuesta);
              }
            });
      }
    }


    
</script>
<center>
<section>
  <form name="form" action="" method="POST">
	<div class="warui" align="center"><h1>Horarios Creados</h1></div>
	<div class="espacio"></div>
	<div class="espacio"></div>
	<div id="conteiner">
    <table align="center" border="0" cellspacing="" cellpadding="3" width="920px">
    <input type="hidden" name="actu" value="actu" />
    <tr>
     <td align="left">
        <label>&nbsp;&nbsp;Escoja el Area: </label>
        <select name="area" id="area" onchange="javascript:RecargarProgramas(this.value,1,1,1);"  required>
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
    </div>
        <div class="morita" align="center">
        <div class="coll">
            <div id="day" align="center" class="lily"></div>
            <div id="day1" align="center" class="lily"></div>
            <div id="day2" align="center" class="lily"></div>
            <div id="day3" align="center" class="lily"></div>
            <div id="day4" align="center" class="lily"></div>
            <div id="day5" align="center" class="lily"></div>
            <div id="day6" align="center" class="lily"></div>
        </div>

        <div class="call">
            <div id="cont" class="lunes">
                <table>
                  <tr>
                    <td align="center" >
                    <label>Jornada Actual:</label>
                      <select name="jornada[7]" id="ReloadJornada"  style="width: 95px" ></select>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" id="lunes">
                      <label onclick="RecargarProgramas(document.getElementById('ReloadJornada').value,14,document.getElementById('grupo').value,document.getElementById('programa').value);" class="ir">Ver Instructor &dArr;</label>
                    </td>
                  </tr>
                </table>
            </div>
            <div id="cont1" class="martes">
              <table>
                <tr>
                  <td align="center">
                  <label>Jornada Actual:</label>
                     <select name="jornada[8]" id="ReloadJornada1"  style="width: 95px" ></select>
                  </td>
                </tr>
                <tr>
                    <td align="center" id="martes">
                      <label onclick="RecargarProgramas(document.getElementById('ReloadJornada1').value,15,document.getElementById('grupo').value,document.getElementById('programa').value);" class="ir">Ver Instructor &dArr;</label>
                    </td>
                  </tr>
              </table>
            </div>
            <div id="cont2" class="miercoles">
              <table>
                <tr>
                  <td align="center" >
                  <label>Jornada Actual:</label>
                     <select name="jornada[9]" id="ReloadJornada2"  style="width: 95px" ></select>
                  </td>
                </tr>
                <tr>
                    <td align="center" id="miercoles">
                      <label onclick="RecargarProgramas(document.getElementById('ReloadJornada2').value,16,document.getElementById('grupo').value,document.getElementById('programa').value);" class="ir">Ver Instructor &dArr;</label>
                    </td>
                  </tr>
              </table>
            </div>
            <div id="cont3" class="jueves">
              <table>
                <tr>
                  <td align="center">
                  <label>Jornada Actual:</label>
                     <select name="jornada[10]" id="ReloadJornada3"  style="width: 95px" ></select>
                  </td>
                </tr>
                <tr>
                    <td align="center" id="jueves">
                      <label onclick="RecargarProgramas(document.getElementById('ReloadJornada3').value,17,document.getElementById('grupo').value,document.getElementById('programa').value);" class="ir">Ver Instructor &dArr;</label>
                    </td>
                  </tr>
              </table>
            </div>
            <div id="cont4" class="viernes">
              <table>
                <tr>
                  <td align="center" >
                  <label>Jornada Actual:</label>
                     <select name="jornada[11]" id="ReloadJornada4"  style="width: 95px" ></select>
                  </td>
                </tr>
                <tr>
                    <td align="center" id="viernes">
                      <label onclick="RecargarProgramas(document.getElementById('ReloadJornada4').value,18,document.getElementById('grupo').value,document.getElementById('programa').value);" class="ir">Ver Instructor &dArr;</label>
                    </td>
                  </tr>
              </table>
            </div>
            <div id="cont5" class="sabado">
              <table>
                <tr>
                  <td align="center" >
                  <label>Jornada Actual:</label>
                     <select name="jornada[12]" id="ReloadJornada5"  style="width: 95px" ></select>
                  </td>
                </tr>
                <tr>
                    <td align="center" id="sabado">
                      <label onclick="RecargarProgramas(document.getElementById('ReloadJornada5').value,19,document.getElementById('grupo').value,document.getElementById('programa').value);" class="ir">Ver Instructor &dArr;</label>
                    </td>
                  </tr>
              </table>
            </div>
            <div id="cont6" class="domingo">
              <table>
                <tr>
                  <td align="center">
                  <label>Jornada Actual:</label>
                    <select name="jornada[13]" id="ReloadJornada6"  style="width: 95px" ></select>
                  </td>
                </tr>
                <tr>
                    <td align="center" id="domingo">
                      <label onclick="RecargarProgramas(document.getElementById('ReloadJornada6').value,20,document.getElementById('grupo').value,document.getElementById('programa').value);" class="ir">Ver Instructor &dArr;</label>
                    </td>
                  </tr>
              </table>
            </div>
        </div>
    </div>
    <div class="espacio"></div>
    <div id="boton-ac"><input type="submit" value="Actualizar" class="voto" id="bot" /></div>
</form>
</section>
</center>


<script language="javascript">
var conteiner = document.getElementById("conteiner");
var q = document.getElementById("bot");
var w = document.getElementById("acdc");
var z = document.getElementById("natsu");
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
 

    function verHorario(valor){
      lunes.className = "lai";martes.className = "lai";miercoles.className = "lai";jueves.className = "lai";
      viernes.className = "lai";sabado.className = "lai";domingo.className = "lai";
      lunes.innerHTML = '';martes.innerHTML = '';miercoles.innerHTML = '';jueves.innerHTML = '';
        viernes.innerHTML = '';sabado.innerHTML = '';domingo.innerHTML = '';

      if (valor==1) {
        lunes.innerHTML = 'Lunes';
        martes.innerHTML = 'Martes';
        miercoles.innerHTML = 'Miercoles';
        jueves.innerHTML = 'Jueves';
        viernes.innerHTML = 'Viernes';
        sabado.innerHTML = 'Sabado';
        domingo.innerHTML = 'Domingo';

        $("#day").toggleClass("dias");$("#day1").toggleClass("dias");$("#day2").toggleClass("dias");
        $("#day3").toggleClass("dias");$("#day4").toggleClass("dias");$("#day5").toggleClass("dias");$("#day6").toggleClass("dias");

      }
    }

    function verEspacios(argu) {

       q.className = "voto";primero.className = "lunes";segundo.className = "martes";tercero.className = "miercoles";cuarto.className = "jueves";
      quinto.className = "viernes";sexto.className = "sabado";septimo.className = "domingo";

      if (argu==1) {

        primero.className = "reis";
        segundo.className = "reis";
        tercero.className = "reis";
        cuarto.className = "reis";
        quinto.className = "reis";
        sexto.className = "reis";
        septimo.className = "reis";
        q.className = "voto1";
      }
    }

</script>