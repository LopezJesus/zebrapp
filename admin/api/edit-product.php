<?php
include_once("../../conexion.php");

$response =new stdClass();

$idProducto=$_POST['idProducto'];
$nombProducto=$_POST['nombProducto'];
$tipoprod=$_POST['tipoprod'];
$description=$_POST['description'];
$price=$_POST['price'];
$estado=$_POST['estado'];
//$sql = "UPDATE producto SET nomProducto = '$nombProducto', desProducto = '$description', preProducto = '$price', tipoProducto = '$tipoprod', estado = '$estado' WHERE idProducto = '$idProducto'";
$sql = "UPDATE producto SET nomProducto = '$nombProducto', tipoProducto = '$tipoprod', desProducto = '$description', preProducto = '$price', estado = '$estado' WHERE idProducto = '$idProducto'";

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    $response->state=false;
} else {
    $response->state = false;
}

echo json_encode($response);
?>
