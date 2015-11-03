<?php 
include ("./sisBib.php");
$query="SELECT * FROM `usuarios` WHERE id=".$_GET["id"];
$resultado=sisBibEjecutaSql($query);
$r_array=mysql_fetch_array($resultado);
?>
<!DOCTYPE html>
<html>
<body>

<form action="upload2.php" method="post" enctype="multipart/form-data">
	<table>
    <tr>
        <td>Nombre:</td>
        <td><input type="text" name="nombre" id="nombre" value="<?= $r_array["nombre"]?>"></td>
    </tr>
    <tr>
        <td>Folio:</td>
        <td><input type="text" name="folio" id="folio" value="<?= $r_array["folio"]?>"></td>
    </tr>
    <tr>
        <td>Puesto:</td>
        <td><input type="text" name="puesto" id="puesto" value="<?= $r_array["puesto"]?>"></td>
    </tr>
    <tr>
        <td>imss:</td>
        <td><input type="text" name="imss" id="imss" value="<?= $r_array["imss"]?>"></td>
    </tr>
    <tr>
        <td>Telefono de emergencias:</td>
        <td><input type="text" name="tel_eme" id="tel_eme" value="<?= $r_array["tel_eme"]?>"></td>
    </tr>
    <tr>
        <td>Tipo de sangre:</td>
        <td><input type="text" name="t_sangre" id="t_sangre" value="<?= $r_array["t_sangre"]?>"></td>
    </tr>
    <tr>
    	<td>Alergia:</td>
    	<td><input type="text" name="alergia" id="alergia" value="<?= $r_array["alergia"]?>"></td>
    </tr>
    <tr>
    	<td>Foto:</td>
    	<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
    </tr>
    </table>
    <input type="hidden" value="<?= $r_array["id"]?>" name="id" id="id">
    <input type="submit" value="Enviar" name="submit">
</form>

</body>
</html>