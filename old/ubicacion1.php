<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Ubicacion</title>
<script language="JavaScript" type="text/javascript" src="js/formData2QueryString.js"></script>
<script language="JavaScript" type="text/javascript">
// creando objeto XMLHttpRequest de Ajax
var obXHR;
try {
	obXHR=new XMLHttpRequest();
} catch(err) {
	try {
		obXHR=new ActiveXObject("Msxml2.XMLHTTP");
	} catch(err) {
		try {
			obXHR=new ActiveXObject("Microsoft.XMLHTTP");
		} catch(err) {
			obXHR=false;
		}
	}
}

function cargar(obId) {
	var obCarga = document.getElementById('carga').value=obId;
	var obCon = document.getElementById(obId);
	obForm = formData2QueryString(document.f1);
	obXHR.open('POST', 'ajax1.php');
	obXHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
	obXHR.onreadystatechange = function() {
		if (obXHR.readyState == 4 && obXHR.status == 200) {
			obXML = obXHR.responseXML;
                        //alert(obXML.firstChild.nodeValue);
			obDes = obXML.getElementsByTagName("descri");
			obCon.length=obDes.length;
			for (var i=0; i<obDes.length;i++) {
                            var val=obDes[i].firstChild.nodeValue.split(",");
                                //alert(val[0]);
				obCon.options[i].value=val[0];
                                obCon.options[i].text=val[1];
			}
		}
	}
	obXHR.send(obForm);
}
</script>
</head>
<center>
<body onLoad="cargar('sEst')">
<form id="f1" name="f1" action="ajax1.php" method="post">
<table width="40%" border="1" >

	<tr>
    	<td colspan="2" align="center"><h3>Ubicacion</h3></td>
    </tr>
  <tr>
    <td width="20px">Municipio:</td>
    <td><input type="hidden" id="carga" name="carga" value="" />
	 <select id="sEst" name="sEst" onChange="cargar('sDM')"></select>
    <!--<input type="button" id="btn_consultar" name="btn_consultar" value="Consultar"
           onClick=""</td>-->

  </tr>
  <tr>
    <td>Sede:</td>
    <td><select id="sDM" name="sDM" onChange="cargar('sCol')"></select></td>
  </tr>
  <tr>
    <td>Ambiente:</td>
    <td><select id="sCol" name="sCol" onChange="cargar('sc_muni')"></select></td>
  </tr>
  <tr>   
  </tr>
</table>
</form>
    <div id="idDiv"></div>
</body>
</center>
</html>
<!--
<?php

//$cn=mysql_connect("localhost","root","");
//mysql_select_db("sigho");
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Ubicacion</title>
<script language="JavaScript" type="text/javascript">
// creando objeto XMLHttpRequest de Ajax
var obXHR;
try {
	obXHR=new XMLHttpRequest();
} catch(err) {
	try {
		obXHR=new ActiveXObject("Msxml2.XMLHTTP");
	} catch(err) {
		try {
			obXHR=new ActiveXObject("Microsoft.XMLHTTP");
		} catch(err) {
			obXHR=false;
		}
	}
}
function cargar(dep) {
	var obDiv = document.getElementById("idDiv");
	obXHR.open("GET", "ajax1.php?dep="+dep);
	obXHR.onreadystatechange = function() {
		if (obXHR.readyState == 4 && obXHR.status == 200) {
			obDiv.innerHTML=obXHR.responseText;
		}
	}
	obXHR.send(null);
}
</script>
<style>
td {
  background-color: #FFFFCC;
  color: #000066;
}
th {
  background-color: #000099;
  color: #FFFFFF;
  font-weight: bold;
}
</style>
</head>

<body>

<?php
//echo "<select name='sDep' onChange='cargar(this.value)'>";
//echo "<option value='-1'>Seleccione</option>";
//$sql="SELECT ubicacion.municipio,cod_municipio FROM ubicacion";
//$rs=mysql_query($sql);
//while ($reg=  mysql_fetch_assoc($rs)){
//	echo "<option value=".$reg['cod_ubicacion'].">".$reg['nom_ubicacion']."</option>";
//}
//echo "</select>";
?>

<div id="idDiv"></div>
</body>

</html>-->
