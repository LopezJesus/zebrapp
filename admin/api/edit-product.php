<?php
include_once("../../conexion.php");

// Obtener los datos enviados por la solicitud PUT
$data = json_decode(file_get_contents('php://input'), true);
$idProducto = $data['idProducto'];

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Actualizar los valores en la tabla de productos
$sql = "UPDATE producto SET nomProducto = ?, desProducto = ?, preProducto = ?, estado = ?, tipoProducto = ? WHERE idProducto = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssdiii", $data['nombProducto'], $data['description'], $data['price'], $data['estado'], $data['tipoprod'], $idProducto);

if ($stmt->execute()) {
    echo "Producto actualizado correctamente";
} else {
    echo "Error al actualizar el producto: " . $conexion->error;
}

$stmt->close();
$conexion->close();
?>