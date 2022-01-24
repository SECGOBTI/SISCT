<?php

//PARA EVITAR apartar numeros se deben mosidficar la variable de añoo
require_once("../conexion/Conexion.php");

$mysqli = getConnSec();
ini_set('date.timezone', 'America/Mexico_City');
$anyoActual = date("Y");
$añoMesDia= date("/Y/m/d/h-i");
/// variables de entrada
$id_registro     = $_POST['id_registro'];
$tipo_archivo    = $_POST['tipo_archivo'];
$fecha           = $_POST['fecha'];
$id_nombre       = $_POST['id_nombre'];


// carpeta y documento
$Fecha_salida = date("Y-m-d");
$upload_folder  = "../adjunto";
$Ru = '../adjunto';

if ( file_exists($_FILES['Documento_digitalizado']['tmp_name'])) {
    $nombre_archivo = $_FILES['Documento_digitalizado']['name'];
    $tmp_archivo    = $_FILES['Documento_digitalizado']['tmp_name'];
}
else{
    $nombre_archivo =pathinfo('../adjunto/falta_documento.pdf', PATHINFO_BASENAME );
    $tmp_archivo    = '../adjunto/falta_documento.pdf';
}

   // echo  $nombre_archivo;
   // echo pathinfo('./adjunto/sin_titulo.pdf');
    


$rutaCarpetas = $upload_folder.$añoMesDia;
$rute = $rutaCarpetas.'/'. $nombre_archivo;

if (!file_exists($rutaCarpetas)) {
    mkdir($rutaCarpetas, 0777, true);
}

if ($nombre_archivo == 'falta_documento.pdf') {
    copy($tmp_archivo,$rute);
} 
else {
    if (!move_uploaded_file($tmp_archivo, $rute )) {
        echo "error";
        $return = Array(
            'ok' => FALSE,
            'msg' => "Ocurrio un error al subir el archivo. No pudo guardarse.",
            'status' => 'error'
        );
    }  
}


 
$query1 = "INSERT INTO archivo (id_registro,tipo_archivo,ruta,fecha,id_nombre )VALUES (
    
'$id_registro','$tipo_archivo','$rute','$añoMesDia','$id_nombre'
    
)";

$resultado = $mysqli->query($query1);

if($resultado){
        $jsonObj = array(
            "Valor" => 1,
            "Mensaje" => "exito".$query1//"SELECT Folio_Documento FROM folios WHERE year(Fecha_salida) = '$anyoActual' AND siglasSolicitud = '$siglasSolicitud' ORDER BY Folio_Documento DESC LIMIT 1"
 
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

