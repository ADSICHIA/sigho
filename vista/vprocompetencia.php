<center>
<?php include ("controlador/cprocompetencia.php"); ?>
<form action="home.php?pac=808" method="post" enctype="multipart/form-data">
    <span class="TextoTitulo">INGRESO MASIVO DE COMPETENCIAS</span><br/><br/><br/>
    <center><b>Por favor primero seleccione el archivo</b>
    <center><b>y despu&eacute;s cargue el archivo :</b>  </br></br>
    <input name="archivo" type="file" size="35" />
    <input  id="boton3" name="enviar" type="submit" value="Cargar Archivos" />
    <input name="action" type="hidden" value="upload" />
    <img src="image/precarga.gif" width="1" height="1">
</form>
</br></br></br>
<form name="form2">
<a href="archivos/competencias.csv" style="font-size:12px; text-decoration:none; color:black; font-weight:bold">Descargar Plantilla<br/><br/><img src="image/excel.gif"/></a>
</br></br></br><table width="500px" height="300px">
<tr>
<td>
<img src="image/competencia.jpg" width="600" height="300px" />
</tr>
</td>
</table>
</form>
</center>