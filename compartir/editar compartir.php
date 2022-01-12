<?php
require_once("../conexion/Conexion.php");
$mysqli    = getConnSec();

$Id_compartir = $_POST['Id_compartir'];
$id_registro = $_POST['id_registro'];
$user_origA = $_POST['user_origA'];
$user_compartir = $_POST['user_compartir'];
$turn_local = $_POST['turn_local'];

$query     = "UPDATE compartir SET 
id_registro = '$id_registro',
user_origA ='$user_origA',
user_compartir ='$user_compartir',
turn_local='$turn_local' 

WHERE Id_compartir = '$Id_compartir'";
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