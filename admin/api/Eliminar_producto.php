<?php
include("../../conexion.php");

$response =new stdClass();

$idProducto = $_POST['idProducto'];
$sql = "SELECT imgProducto FROM producto WHERE idProducto = $idProducto";
$resultado = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($resultado);
$imgProducto = $row['imgProducto'];
if (unlink("../../assets/Productos/".$imgProducto)) {
    // Elimina el producto y su imagen de la base de datos
    $sql = "DELETE FROM producto WHERE idProducto = $idProducto";
    $result=mysqli_query($conexion,$sql);
    if($result==true){
        $response->state=true;
    }else{
        $response->state=false;

    }
echo json_encode($response);
}else {
    echo "Error al eliminar el archivo de la imagen.";
  }
  echo json_encode($response);
  


