<?php
include ("./sisBib.php");
//parte de la imagen
$target_dir = "uploads/"; //<--directorio destino
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
/*
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
//termina parte de la imagen

//$_Post['nombre'],$_Post['folio'],$_Post['puesto'],$_Post['imss'],$_Post['tel_eme'],$_Post['t_sangre'],$_Post['alergia']
	$nombreCampo=array("nombre","folio","puesto","imss","tel_eme","t_sangre","alergia","foto");
	$valorCampo=array($_POST['nombre'],$_POST['folio'],$_POST['puesto'],$_POST['imss'],$_POST['tel_eme'],$_POST['t_sangre'],$_POST['alergia'],$target_file);
	
	//aqui hago el update
	function sisBibUpdate($nomTabla,
    $nombreCampo,
    $valorCampo,$_POST['id']);
	
	header("Location: ./index.php");

	
?>