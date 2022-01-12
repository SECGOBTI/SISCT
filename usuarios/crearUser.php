<?php
require_once("../conexion/Conexion.php");

$mysqli     = getConnSec();

$nombre = $_POST['nombre'];
$area = $_POST['area'];
$password = $_POST['password'];
$tipo_user = $_POST['tipo_user'];


$query      = "INSERT INTO usuario (nombre,area,password,estado,tipo_user)VALUES ( '$nombre','$area','$password',0,'$tipo_user')";
$resultado  = $mysqli->query($query);
if($resultado){
    $jsonObj = array(
        "Valor" => 1,
        "Mensaje" => "Registro guardado exitosamente."
    );
}else{
    $jsonObj = array(
        "Valor" => 0,
        "Mensaje" => "Ocurrio un error inesperado, vuelva a intentar."
    );
}
mysqli_close($mysqli);
echo json_encode($jsonObj);

?>