<?php
require_once("../conexion/Conexion.php");
$conexion   = getConnSec();

//generamos la consulta
$sql = "SELECT * FROM registro  ORDER BY id_registro DESC";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$clientes = array(); //creamos un array

while($f2 = mysqli_fetch_array($result)) 
{ 
            $area_genereadora = $f2['area_genereadora'];
            $descripcion = $f2['descripcion'];
            $comentarios = $f2['comentarios'];
            $fecha = $f2['fecha'];
            $nombreAreaActual = $f2['nombreAreaActual'];
            $estado = $f2['estado'];
            $id_año = $f2['id_año'];
            $num_extra = $f2['num_extra'];


            
       
    
         
   
    $clientes[] = array( 
    'area_genereadora' => $area_genereadora,
    'descripcion' => $descripcion,
    'comentarios' => $comentarios,
    'fecha' => $fecha,
    'nombreAreaActual' => $nombreAreaActual,
    'estado' => $estado,
    'id_año' => $id_año,
    'num_extra' => $num_extra);

}
    
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($clientes);
echo $json_string;


?>