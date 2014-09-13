<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http:// www.w3c.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <?php 
	 $ficha=isset($_POST['ficha'])? $_POST['ficha']:NULL;
	 $fi=isset($_POST['fecha_ini'])? $_POST['fecha_ini']:NULL;
	 $ff=isset($_POST['fecha_fin'])? $_POST['fecha_fin']:NULL;
	 
	 $ges= new controladorFicha();
	 if($ficha && $fi && $ff){
		 $res1=$ges->Ran($ficha,$fi,$ff);
		 //var_dump($res1);8
		// var_dump($sql);
	 }
	 ?>
    <title>
   </title>
    </head>
  <body><center><br><br>
  <header>
  </header> 
     <form name="form1"  method="post" action="">
     
          <table>
              <tr>
                  <td>N°Ficha:</td>
                  <td><input type="text" name="ficha" required="required"/></td>
              </tr>
              <tr>
                  <td>Fecha Inicial: </td>
                  <td><input type="date" name="fecha_ini" required="required" id="fecha_ini" /></td>
                  <td>Fecha Final: </td>
                  <td><input type="date" name="fecha_fin" required="required" id="fecha_fin" /></td>
              </tr>
          </table>
          <input name="send" type="submit" value="Consultar"/>
     </form>
 
  <h2>Horario</h2>
	  <table border="1" name="tabla">
          <thead>
              <tr id="cabezota">
                <td>Ficha</td><td>Nombre del Instructor</td><td>Programa</td><td>Jornada</td><td>Aula</td><td>Dia</td>
              </tr>
           </thead>
                  <tbody>
					  <?php
						  $i=0;
						  //$res;
						  if(isset($res1)){
						  while($i<count($res1)){
						  //echo $res[$i]["doc_usuario"];
						  //echo $res[$i]["dia"];
					  //echo $res1[$i]["cod_titulacion"];
					    ?>
                  <tr>
                   <td>
						  <?php
                          	echo $res1[$i]["cod_titulacion"];
                          ?>
                      </td>
                  
                      <td>
						  <?php
                            echo $res1[$i]["nom_usuario"];
                          ?>
                      <td>
						  <?php
                          	echo $res1[$i]["nom_programa"];
                          ?>
                      </td>
                      <td>
						  <?php
                          	echo $res1[$i]["descripcion"];
                          ?>
                      </td>
                      <td>
						  <?php
                          	echo $res1[$i]["nom_ubicacion"];
                          ?>
                      </td>
                       <td>
						  <?php
							  //echo $res[$i]["nom_usuario"];
							  echo $res1[$i]["dia"];
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
	</center>
	</body>
    <script>
	</script>
</html>