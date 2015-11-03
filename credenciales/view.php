<?php 
include ("./sisBib.php");
$query="SELECT * FROM `usuarios` WHERE id=".$_GET["id"];
$resultado=sisBibEjecutaSql($query);
$r_array=mysql_fetch_array($resultado);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
.aa {
	font-size: 9px;
}
</style>
</head>

<body>

<div>
  <table width="229" height="302" border="0">
      <tr>
        <td height="73" colspan="2"><img src="img/image001.jpg" width="132" height="82" /></td>
        
        <td colspan="2" rowspan="2"><img src="./<?= $r_array["foto"]  ?>" width="76" height="107"  /></td>
      </tr>
      <tr>
        <td height="54" colspan="2"><div align="center"><b>PROYECTO RESIDENCIAL</b></div></td>
      </tr>
      <tr>
      <td colspan="4"><strong class="aa">Empresa: <br />
        ARQUITECTURA CONSTRUCTIVA SAENZ S.A. DE C.V.</strong></td>
      </tr>
      <tr>
        <td colspan="4" ><b> Nombre: <?= $r_array["nombre"]  ?></b></td>
        
      </tr>
       <tr>
        <td colspan="4" ><b>Puesto: <?= $r_array["puesto"]  ?></b></td>
        
      </tr>
      <tr>
        <td colspan="3"><b>No. IMSS y/o GM:</b> <br />
        <?= $r_array["imss"]  ?>
        <b></b>
        </td>
       
        <td width="112">&nbsp;</td>
      </tr>
    </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>

<div>
    <table width="228" border="0">
  <tr>
    <td colspan="6"><div align="center" style="font-size:8px;"><b>AUTORIZACION PARA TRABAJOS ESPECIFICOS</b></div></td>
    
  </tr>
  <tr>
    
    <td colspan="2" align="right"><img src="img/cuadro.png" width="30" height="18" /></td>
    <td colspan="3">Maquinaria Pesada</td>
  </tr>
  <tr>
    
    <td colspan="2" align="right"><img src="img/cuadro.png" alt="" width="30" height="18" /></td>
    <td colspan="3">Espacios Confinados</td>
  </tr>
  <tr>
    
    <td colspan="2" align="right"><img src="img/cuadro.png" alt="" width="30" height="18" /></td>
    <td colspan="3">Trabajos en Altura</td>
  </tr>
  <tr>
    
    <td colspan="2" align="right"><img src="img/cuadro.png" alt="" width="30" height="18" /></td>
    <td colspan="3">Trabajos de Chispa y Flama</td>
  </tr>
  <tr>
    <td colspan="3">Tipo Sangre:</td>
     
    <td colspan="2"><?= $r_array["t_sangre"]  ?></td><!-- t_sangre-->
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
    
  </tr>
  <tr>
    <td colspan="2">Alergia:</td>
    
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"><?= $r_array["alergia"]  ?></td>
    
  </tr>
  <tr>
    <td colspan="6">LLamar en emergencias a:</td>
    
  </tr>
  <tr>
    <td colspan="6" align="left"><?= $r_array["tel_eme"]  ?></td><!--tel-->
    
  </tr>
  <tr>
    <td colspan="6" align="center"><b>FIRMAS DE AUTORIZACION:</b></td>
    
  </tr>
  <tr>
    <td width="38">&nbsp;</td>
    <td width="25">1.-</td>
    <td colspan="3">_____________________</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>2.-</td>
    <td colspan="3">_____________________</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3.-</td>
    <td colspan="3">_____________________</td>
  </tr>
  <tr>
    <td colspan="6" align="center"><b>Amonestaciones Recibidas</b></td>
  </tr>
  <tr>
    <td align="right"><img src="img/1.png" width="28" height="33" /></td>
    <td>&nbsp;</td>
    <td width="61" align="center"><img src="img/2.png" width="34" height="40" /></td>
    <td width="24">&nbsp;</td>
    <td width="58"><img src="img/3.png" width="34" height="40" /></td>
  </tr>
</table>

</div>
</body>
</html>
