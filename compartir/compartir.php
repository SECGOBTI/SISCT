<?php
require_once("../conexion/Conexion.php");

$mysqli     = getConnSec();
$id_registro = $_POST['id_registro'];
$user_origA = $_POST['user_origA'];
$user_compartir = $_POST['user_compartir'];
$turn_local = $_POST['turn_local'];


$jerarquia = $_POST['jerarquia'];
$query      = "INSERT INTO compartir (id_registro,user_origA,user_compartir,turn_local)VALUES ( '$id_registro','$user_origA','$user_compartir','$turn_local' )";
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