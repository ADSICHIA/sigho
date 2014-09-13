<?php
 include_once('./modelo/conexion');
 $link=new conexion();
 $link->conectarDB();
 $query="Select * from dia_semana order by cod_dia";
 $result=  mysql_query($query) or die("Error de la consulta");
while($row=  mysql_fetch_assoc($result)){ 
?>
<input type="checkbox" name="dia_<?php echo $row["cod_dia"];?>" id="dia_<?php echo $row["cod_dia"];?>" value="<?php echo $row["cod_dia"];?>" />
<label for="dia_<?php echo $row["cod_dia"];?>"><?php echo $row["nombre_dia"];?></label>

<?php 
}
?>
