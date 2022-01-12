<?php
require_once("../conexion/Conexion.php");
$mysqli    = getConnSec();

$id_area  = $_POST['id_area'];
$area    = $_POST['area'];
$estado    = $_POST['estado'];
$jerarquia    = $_POST['jerarquia'];

$query     = "UPDATE areas SET area = '$area',estado ='$estado', jerarquia='$jerarquia' WHERE id_area = '$id_area'";
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