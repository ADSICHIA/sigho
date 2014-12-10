<?php
    include ("controlador/cfichacomp.php");
?>
<center>
<form name="form1" action="" method="post" >
    <table width="300" height="370" >
        <tr>
            <td colspan="2" align="center" style="font-size: 20.5px;">
                <h1>Seleccione Competencias</h1><br>
            </td>
        </tr>
        <tr>
           <td align="center" colspan="2">
<?php  
// var_dump($dat);
    if($dat!=null){ ?>
            <table width="500px" border=0>
                <tr><td colspan="4" align="center"><input type="hidden" value="actu" name="actu"></td></tr>
                <tr>

           <?php 
            for($i = 0; $i<count($dat); $i++){ ?>
                 <?php if($i % 4 == 0){ ?>
                 <tr>
                 <td><br><input type="checkbox" name="compete<?php  echo $dat[$i]['id_competencia']?>" value="<?php echo $dat[$i]['id_competencia']?>"> <?php echo $dat[$i]['denominacion']?></td>
                    <?php  }else{ ?>
                    <td><br><input type="checkbox" name="compete<?php  echo $dat[$i]['id_competencia']?>" value="<?php echo $dat[$i]['id_competencia']?>"> <?php echo $dat[$i]['denominacion']?></td> 
                <?php  } ?>
 <?php  } ?>
             </table>
<?php }else{ ?>
    NO SE ENCONTRARON COMPETENCIAS.
<?php } ?>
            </td>
        </tr>
        <tr>
           <td align="center" colspan="2">
        <tr>
            <td colspan="2" align="center">
                <input type="submit" />
                <a href="home.php?pac=112" target="_self"><input type="button"  value="Volver" /> </a>
            </td>
        </tr>
    </table>
</form>
</center>
