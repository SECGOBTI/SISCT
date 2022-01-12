<?php
require_once("../conexion/Conexion.php");
$mysqli    = getConnSec();

$id_registro = $_POST['id_registro'];

$area_genereadora = $_POST['area_genereadora'];
$descripcion = $_POST['descripcion'];
$comentarios = $_POST['comentarios'];
$fecha = $_POST['fecha'];
$nombreAreaActual = $_POST['nombreAreaActual'];
$estado = $_POST['estado'];
$id_año = $_POST['id_año'];
$num_extra = $_POST['num_extra'];

$query     = "UPDATE registro SET 
area_genereadora = '$area_genereadora'
,descripcion = '$descripcion'
,comentarios = '$comentarios'
,fecha = '$fecha'
,nombreAreaActual = '$nombreAreaActual'
,estado = '$estado'
,id_año = '$id_año'
,num_extra = '$num_extra'

WHERE id_registro = '$id_registro'";


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