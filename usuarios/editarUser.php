<?php
require_once("../conexion/Conexion.php");
$mysqli    = getConnSec();

$id_nombre = $_POST['id_nombre'];
$nombre = $_POST['nombre'];
$area = $_POST['area'];
$password = $_POST['password'];
$tipo_user = $_POST['tipo_user'];

$query     = "UPDATE usuario SET nombre = '$nombre',area ='$area', password='$password',tipo_user='$tipo_user',estado='$estado'  WHERE id_nombre = '$id_nombre'";
$resultado = $mysqli->query($query);
if($resultado){
    $jsonObj = array(
        "Valor" => 1,
        "Mensaje" => $query
    );
}else{
    $jsonObj = array(
        "Valor" => 0,
        "Mensaje" => "Ocurrio un error inesperado, vuelva a intentar."
    );
}
mysqli_close($mysqli);
echo json_encode($jsonObj);?>