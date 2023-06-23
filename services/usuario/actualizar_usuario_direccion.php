<?php session_start();
        include_once ("../conexionbd.php"); 
      $nombreUsuario = $_SESSION['userUsuario'];
      //$sql = "SELECT * FROM usuariosl ";

  
      // Obtener los datos enviados por la solicitud PUT
      $data = json_decode(file_get_contents('php://input'), true);
      
      // Verificar la conexión
      if ($con->connect_error) {
          die("Error de conexión: " . $con->connect_error);
      }
      // Actualizar los valores en la tabla de usuarios
      $sql = "UPDATE usuariosl SET ciudadUsuario = ?, codposUsuario = ?, Dirección = ? WHERE userUsuario = '$nombreUsuario'"; 
      $stmt = $con->prepare($sql);
      $stmt->bind_param("sss", $data['ciudad'], $data['codigopostal'], $data['direccion']);
      if ($stmt->execute()) {
          echo "Usuario actualizado correctamente";
      } else {
          echo "Error al actualizar el usuario: " . $con->error;
      }
      
      $stmt->close();
      $con->close();
      
?>

