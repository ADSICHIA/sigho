<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php
include ("controlador/conexion.php");
 $conexion = new conexion();
 $conexion->conectarDB();
 $query_roles="Select * from rol order by nom_rol";
 $result_roles=$conexion->SelectDato($query_roles);
 $cantidad_roles=count($result_roles);
 
	?>
	<br /><br />
	
	<table  align="center" width="600" border="1" cellspacing="0" cellpadding="4">
	<form action="" method="POST" name="form1" >
      <tr>
        <td align="center" bgcolor="#929292" rowspan="3" colspan="4" >usuarios</td>
		<td align="center" bgcolor="#929292" colspan="<?php echo $cantidad_roles; ?>" >roles</td>
      </tr>
	  
	 
<tr>
<?php foreach($result_roles as $rol){?> 
  <td align="center"><?php echo ucfirst($rol[1]);?></td>
  
<?php }?>
  </tr>
   	
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 
	//Checkbox
	$("input[name=checktodos]").change(function(){
		$('input[type=checkbox]').each( function() {			
			if($("input[name=checktodos]:checked").length == 1){
				this.checked = true;
			} else {
				this.checked = false;
			}
		});
	});
 
});
</script>
	
	<tr>
	 <?php foreach($result_roles as $rol){
	 
	 echo '<td ><input name="checktodos" id="sel_todos" type="checkbox" onclick"marcar(this);"  value="todos" />seleccionar todos</td>';
	 }
	 ?> 
	
	  </tr>
<?php
	       $sql2="SELECT u.doc_usuario, u.nom_usuario
			FROM usuario AS u
			order by u.nom_usuario";
	
			
		$res = $conexion->SelectDato($sql2);
		for ($i=0,$t=count($res);$i<$t;$i++){
		$query_roles_usuarios="Select id_rol from usuario_rol where doc_usuario=".$res[$i][0];
		$result_roles_usuarios=$conexion->SelectDato($query_roles_usuarios);
		
?>
 
 <tr>
 			<td colspan="4" ><?php echo ucfirst($res[$i][1]); ?></td>
			
 	<?php 
	
	foreach($result_roles as $rol){
	
	
			if($result_roles_usuarios){
				
				foreach($result_roles_usuarios as $roles_usuario){
				
			
					if($roles_usuario[0]==$rol[0] ){
					
					
						echo '<td align="center"><input name="check[]" id="'.$res[$i][0]."_".$rol[0].'" checked="checked" type="checkbox" value="'.$res[$i][0].",".$rol[0].'" /></td>';
						}
						
						
			}
					
			}else{
				echo '<td align="center"><input name="check[]" id="'.$res[$i][0]."_".$rol[0].'" type="checkbox" value="'.$res[$i][0].",".$rol[0].'" /></td>';
			}
		
		}
	}
	?>
	
	<?php
	$badera= isset ($_POST["bandera"])?$_POST["bandera"]:NULL;
	$rev=mysql_fetch_array(mysql_query("select doc_usuario ,id_rol from usuario_rol " ));
	var_dump($rev);
	
	
	if ($badera==1)
      {
    echo '<h2>Seleccionaste los siguientes usuarios:</h2><br>';
    if(is_array($_POST['check']))
    {
	
      while(list($key,$value) = each($_POST['check'])) 
        {
	if($rev[id_rol])
		{
		echo 'ya existe el dato';
		exit();
		}
	   else{
	   
           
	$sql4="INSERT INTO `usuario_rol`( `doc_usuario`, `id_rol`) VALUES ($value)";
           $insert_rol=$conexion->Insert($sql4);

           
		 }  
        }
    }
}

  	?>
</tr>
  
  
  
  <center>
<br /><br />

<input type="submit" value="guardar cambios" name="bandera"  />
 <input name="bandera" type="hidden" id="bandera" value="1" />
 
</center>
  
</form>
</table>



<?php
?>


</body>
</html>
