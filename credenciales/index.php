<?php
include ("./sisBib.php");

$query="SELECT id,`nombre`,`folio`,`puesto` FROM `usuarios` WHERE 1";
$resultado=sisBibEjecutaSql($query);
$r_array=mysql_fetch_array($resultado);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inicio</title>
</head>

<body>
<a href="./add.html">Nuevo</a>

<table width="200" border="0">
  <tr>
    <th>Nombre</th>
    <th>Folio</th>
    <th>Puesto</th>
    <th>Ver</th>
    <th>Editar</th>
  </tr>
  <? if(!empty($r_array))
  	{
	  
	  while($registro = mysql_fetch_array($resultado))
	  {
		  ?>
		  <tr>
			<td><?=  $registro['nombre'];?></td>
			<td><?=  $registro['folio']; ?></td>
			<td><?=  $registro['puesto']; ?></td>
			<td><a href="/view.php?id=<?=$registro['id']?>">Ver</a></td>
			<td><a href="/edit.php?id=<?=$registro['id']?>">Editar</a></td>
            <td><a href="#">Borrar</a></td>
		  </tr>
	<?
			
		}
	  } ?>
 
</table>


</body>
</html>