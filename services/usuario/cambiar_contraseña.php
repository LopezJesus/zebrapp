<?php session_start();
        include_once ("../conexionbd.php"); 
      $nombreUsuario = $_SESSION['userUsuario'];

      $sql = "SELECT passwordUsuario FROM usuariosl WHERE userUsuario = '$nombreUsuario'"; // Ajusta la consulta según tu estructura de tabla y condiciones

      // Ejecutar la consulta
      $result = $con->query($sql);
    
      // Obtener los datos enviados por la solicitud PUT
      $data = json_decode(file_get_contents('php://input'), true);
      $currentPassword = $data['currentPassword'];
      $newPassword = $data['newPassword'];
      $row = $result->fetch_assoc();
      $storedPassword = $row["passwordUsuario"];

      // Verificar la conexión
      if ($con->connect_error) {
          die("Error de conexión: " . $con->connect_error);
      }
      // Actualizar los valores en la tabla de usuarios
      if($currentPassword==$storedPassword){
        $sql = "UPDATE usuariosl SET passwordUsuario = ? WHERE userUsuario = '$nombreUsuario'"; 
      $stmt = $con->prepare($sql);

      $stmt->bind_param("s", $newPassword);
      if ($stmt->execute()) {
          echo "Usuario actualizado correctamente";
      } else {
          echo "Error al actualizar el usuario: " . $con->error;
      }
      
      $stmt->close();
      $con->close();
      }
      else{
        echo "La contraseña actual no es la establecida por el usuario " . $con->error;
        
      }
      
      
?>

