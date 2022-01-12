<?php
require_once("../conexion/Conexion.php");

$mysqli     = getConnSec();
$area = $_POST['area'];

$jerarquia = $_POST['jerarquia'];
$query      = "INSERT INTO areas (area,estado,jerarquia)VALUES ( '$area',1,'$jerarquia' )";
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