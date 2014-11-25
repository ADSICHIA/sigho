<?php 
    include ("controlador/chorario.php");
?>

<!--Java Script-->
<script language="javascript" src="js/jquery-1.9.1.js"></script><!-- llamamos al JQuery-->
<script language="javascript">

    function RecargarProgramas(values,num,suji){
 
      var variable = {"variables" : values, "Numero" : num, "jornada" : suji};

      if (num==1) {
        $.ajax({
          data: variable,
          url: 'vista/area-programa.php',
          type: 'post',
          success: function (respuesta){
            $("#reloadPrograma").html(respuesta);
          }
        });
      }else if (num==2){
        $.ajax({
          data: variable,
          url: 'vista/area-programa.php',
          type: 'post',
            success: function (respuesta){
                $("#reloadGrupo").html(respuesta);
              }
        });
      }else if (num==3) {
        var dia=0;
        for(dia=0;dia++;dia<7){
          variable.dia=dia;
          if(dia==0){
            var capa="#ReloadJornada";
          }else{
            var capa="#ReloadJornada"+dia;
          }
          $.ajax({
            data: variable,
            url: 'vista/area-programa.php',
            type: 'post',
              success: function (respuesta){
                  $(capa).html(respuesta);
                  /*$("#ReloadJornada1").html(respuesta);
                  $("#ReloadJornada2").html(respuesta);
                  $("#ReloadJornada3").html(respuesta);
                  $("#ReloadJornada4").html(respuesta);
                  $("#ReloadJornada5").html(respuesta);
                  $("#ReloadJornada6").html(respuesta);*/
                }
          });
        }
      }else if (num==7) {
        var hensu = {"variables" : values, "Numero" : num, "jornada" : suji};
        $.ajax({
              data: hensu,
              url: 'vista/area-programa.php',
              type: 'post',
              success: function (respuesta){
                $("#lunes").html(respuesta);
              }
            });
      }else if (num==8) {
        var hensu = {"variables" : values, "Numero" : num, "jornada" : suji};
        $.ajax({
              data: hensu,
              url: 'vista/area-programa.php',
              type: 'post',
              success: function (respuesta){
                $("#martes").html(respuesta);
              }
            });
      }else if (num==9) {
         var hensu = {"variables" : values, "Numero" : num, "jornada" : suji};
        $.ajax({
              data: hensu,
              url: 'vista/area-programa.php',
              type: 'post',
              success: function (respuesta){
                $("#miercoles").html(respuesta);
              }
            });
      }else if (num==10) {
         var hensu = {"variables" : values, "Numero" : num, "jornada" : suji};
        $.ajax({
              data: hensu,
              url: 'vista/area-programa.php',
              type: 'post',
              success: function (respuesta){
                $("#jueves").html(respuesta);
              }
            });
      }else if (num==11) {
         var hensu = {"variables" : values, "Numero" : num, "jornada" : suji};
        $.ajax({
              data: hensu,
              url: 'vista/area-programa.php',
              type: 'post',
              success: function (respuesta){
                $("#viernes").html(respuesta);
              }
            });
      }else if (num==12) {
         var hensu = {"variables" : values, "Numero" : num, "jornada" : suji};
        $.ajax({
              data: hensu,
              url: 'vista/area-programa.php',
              type: 'post',
              success: function (respuesta){
                $("#sabado").html(respuesta);
              }
            });
      }else if (num==13) {
         var hensu = {"variables" : values, "Numero" : num, "jornada" : suji};
        $.ajax({
              data: hensu,
              url: 'vista/area-programa.php',
              type: 'post',
              success: function (respuesta){
                $("#domingo").html(respuesta);
              }
            });
      };
    }


    
</script>

<div id="koko" style="margin-left:-100px;">
<div class="warui" align="center"><h1>Crear Horarios</h1></div>
    <form name="form" action="" method="POST">
    <table align="center" border="0" cellspacing="" cellpadding="3" width="920px">
    <tr>
     <td align="left">
     <div class="espacio"></div>
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
    <td><div class="espacio"></div><div class="reload" id="reloadPrograma" ></div></td>
    <td><div class="espacio"></div><div class="reload" id="reloadGrupo" ></div></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    </table>
    <div class="relad" id="reloadFicha"></div>

    <div class="espacio"></div>

    <div class="taka" align="center">
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
                    <td align="center">
                      <label>Escoja la Jornada:</label>
                      <select name="jornada[7]" id="ReloadJornada" style="width: 95px" onchange="RecargarProgramas(document.getElementById('programaid').value,7,this.value);" ></select>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" id="lunes">
                      
                    </td>
                  </tr>
                </table>
            </div>
            <div id="cont1" class="martes">
              <table>
                <tr>
                  <td align="center">
                    <label>Escoja la Jornada:</label>
                    <select name="jornada[8]" id="ReloadJornada1"  style="width: 95px" onchange="RecargarProgramas(document.getElementById('programaid').value,8,this.value);"></select>
                  </td>
                </tr>
                <tr>
                    <td align="center" id="martes">
                      
                    </td>
                  </tr>
              </table>
            </div>
            <div id="cont2" class="miercoles">
              <table>
                <tr>
                  <td align="center">
                    <label>Escoja la Jornada:</label>
                    <select name="jornada[9]" id="ReloadJornada2"  style="width: 95px" onchange="RecargarProgramas(document.getElementById('programaid').value,9,this.value);"></select>
                  </td>
                </tr>
                <tr>
                    <td align="center" id="miercoles">
                      
                    </td>
                  </tr>
              </table>
            </div>
            <div id="cont3" class="jueves">
              <table>
                <tr>
                  <td align="center">
                    <label>Escoja la Jornada:</label>
                    <select name="jornada[10]" id="ReloadJornada3"  style="width: 95px" onchange="RecargarProgramas(document.getElementById('programaid').value,10,this.value);"></select>
                  </td>
                </tr>
                <tr>
                    <td align="center" id="jueves">
                      
                    </td>
                  </tr>
              </table>
            </div>
            <div id="cont4" class="viernes">
              <table>
                <tr>
                  <td align="center">
                    <label>Escoja la Jornada:</label>
                    <select name="jornada[11]" id="ReloadJornada4"  style="width: 95px" onchange="RecargarProgramas(document.getElementById('programaid').value,11,this.value);"></select>
                  </td>
                </tr>
                <tr>
                    <td align="center" id="viernes">
                      
                    </td>
                  </tr>
              </table>
            </div>
            <div id="cont5" class="sabado">
              <table>
                <tr>
                  <td align="center">
                    <label>Escoja la Jornada:</label>
                    <select name="jornada[12]" id="ReloadJornada5"  style="width: 95px" onchange="RecargarProgramas(document.getElementById('programaid').value,12,this.value);"></select>
                  </td>
                </tr>
                <tr>
                    <td align="center" id="sabado">
                      
                    </td>
                  </tr>
              </table>
            </div>
            <div id="cont6" class="domingo">
              <table>
                <tr>
                  <td align="center">
                    <label>Escoja la Jornada:</label>
                    <select name="jornada[13]" id="ReloadJornada6"  style="width: 95px " onchange="RecargarProgramas(document.getElementById('programaid').value,13,this.value);"></select>
                  </td>
                </tr>
                <tr>
                    <td align="center" id="domingo">
                      
                    </td>
                  </tr>
              </table>
            </div>
        </div>
    </div>
    <div class="espacio"></div>
    <div id="boton-a"><input type="submit" value="Guardar" class="voto" id="bot" /></div>
    </form>
</div>


<script language="javascript">
var w = document.getElementById("acdc");
var q = document.getElementById("bot");
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
        domingo.innerHTML = 'domingo';

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