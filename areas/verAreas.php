<?php
require_once("../conexion/Conexion.php");
$conexion   = getConnSec();

//generamos la consulta
$sql = "SELECT * FROM areas  ORDER BY id_area DESC";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$clientes = array(); //creamos un array

while($f2 = mysqli_fetch_array($result)) 
{ 
            $id_area = $f2['id_area'];
            $area = $f2['area'];
            $estado = $f2['estado'];
            $jerarquia = $f2['jerarquia'];
       
    
         
   
    $clientes[] = array( 'Id_Folio' => $Id_Folio,
    'id_area' => $id_area,
    'area' => $area,
    'estado' => $estado,
    'jerarquia' => $jerarquia);

}
    
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($clientes);
echo $json_string;


?>