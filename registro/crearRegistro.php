<?php
require_once("../conexion/Conexion.php");

$mysqli     = getConnSec();

$Id_archivo = $_POST['area_genereadora'];
$turno = $_POST['descripcion'];
$ruta = $_POST['comentarios'];
$tipo_archivo = $_POST['fecha'];
$user = $_POST['nombreAreaActual'];


$query = "INSERT INTO registro (Id_archivo,turno,ruta,tipo_archivo,user)VALUES 
( '$Id_archivo','$turno','$ruta','$tipo_archivo','$user')";
$resultado  = $mysqli->query($query);
if($resultado){
    $jsonObj = array(
        "Valor" => 1,
        "Mensaje" => "Registro guardado exitosamente."
    );
}else{
    $jsonObj = array(
        "Valor" => 0,
        "Mensaje" =>"Ocurrio un error inesperado, vuelva a intentar."
    );
}
mysqli_close($mysqli);
echo json_encode($jsonObj);

?>