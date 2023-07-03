<?php
include_once("../../conexion.php");

// Obtener los datos enviados por la solicitud PUT
$data = json_decode(file_get_contents('php://input'), true);
$idUsuario = $data['idUsuario'];

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Actualizar los valores en la tabla de productos
$sql = "UPDATE usuariosl SET userUsuario = ?, passwordUsuario = ?, NombreUsuario = ?, ApellidoUsuario = ?, emailUsuario = ?, tipoUsuario=? WHERE idUsuarios = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssssi", $data['usuUsuario'], $data['tempPswrd'], $data['nombreUsuario'], $data['apellidoUsuario'], $data['emailUsuario'],  $data['tipoUsuario'],$idUsuario);

if ($stmt->execute()) {
    echo "Usuario actualizado correctamente";
} else {
    echo "Error al actualizar el usuario: " . $conexion->error;
}

$stmt->close();
$conexion->close();
?>