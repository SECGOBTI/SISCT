<?php
require_once("../conexion/Conexion.php");
$mysqli    = getConnSec();
$Id        = $_POST['Id_compartir'];
$query     = "DELETE FROM compartir WHERE Id_compartir = '$Id'";
$resultado = $mysqli->query($query);
if($resultado){
    $jsonObj = array(
        "Valor" => 1,
        "Mensaje" => "Registro eliminado exitosamente."
    );
}else{
    $jsonObj = array(
        "Valor" => 0,
        "Mensaje" => "Ocurrio un error inesperado, vuelva a intentar."
    );
}
mysqli_close($mysqli);
echo json_encode($jsonObj);?>