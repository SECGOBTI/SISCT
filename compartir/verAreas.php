<?php
require_once("../conexion/Conexion.php");
$conexion   = getConnSec();

//generamos la consulta
$sql = "SELECT * FROM compartir  ORDER BY Id_compartir DESC";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$clientes = array(); //creamos un array

while($f2 = mysqli_fetch_array($result)) 
{           
            $Id_compartir = $f2['Id_compartir'];
            $id_registro = $f2['id_registro'];
            $user_origA = $f2['user_origA'];
            $user_compartir = $f2['user_compartir'];
            $turn_local = $f2['turn_local'];
       
    
         
   
    $clientes[] = array( 'Id_compartir' => $Id_compartir,
    'id_registro' => $id_registro,
    'user_origA' => $user_origA,
    'user_compartir' => $user_compartir,
    'turn_local' => $turn_local);

}
    
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($clientes);
echo $json_string;


?>