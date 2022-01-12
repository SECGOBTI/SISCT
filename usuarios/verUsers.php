<?php
require_once("../conexion/Conexion.php");
$conexion   = getConnSec();

//generamos la consulta
$sql = "SELECT * FROM usuario  ORDER BY id_nombre DESC";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$clientes = array(); //creamos un array

while($f2 = mysqli_fetch_array($result)) 
{ 
            $id_nombre = $f2['id_nombre'];
            $nombre = $f2['nombre'];
            $area = $f2['area'];
            $password = $f2['password'];
            $estado = $f2['estado'];
            $tipo_user = $f2['tipo_user'];


            
       
    
         
   
    $clientes[] = array( 
    'id_nombre' => $id_nombre,
    'nombre' => $nombre,
    'area' => $area,
    'password' => $password,
    'estado' => $estado,
    'tipo_user' => $tipo_user);

}
    
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($clientes);
echo $json_string;


?>