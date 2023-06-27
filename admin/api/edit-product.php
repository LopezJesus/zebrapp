<?php
include_once("../../conexion.php");

$response =new stdClass();

$idProducto=$_POST['idProducto'];
$nombProducto=$_POST['nombProducto'];
$tipoprod=$_POST['tipoprod'];
$descripcion=$_POST['description'];
$precio=$_POST['price'];
$estado=$_POST['estado'];
$sql = "UPDATE producto SET nomProducto = '$nombProducto', tipoProducto = '$tipoprod', desProducto = '$descripcion', preProducto = '$precio', estado = '$estado' WHERE idProducto = '$idProducto'";

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    $response->success = true;
} else {
    $response->success = false;
}

echo json_encode($response);
?>
