<?php
?>

<!DOCTYPE html>
<html>
  <head>
      <title>Inicio de sesión</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script type="text/javascript" src="js\jquery-3.6.4.js"></script>
        <script type="text/javascript" src="js\bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="fontawesome-free-6.3.0-web\css\all.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Raleway:wght@500&family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body class="backgroundson">
      <?php

      ?>
      <div class="modal-dialog text-center">
        <div class="col-sm-12 paddinglogin main-section ">
          <div class="modal-content seleccion">
            <div class="col-12 user-img ">
            <img class="center" src="assets\UserIcon.png">
            </div>
            <div class="container-fluid ">
              <p> Bienvenido, por favor ingrese sus datos</p>


              <form action="services/login.php" method="post" class="col-12">
                <div class="form-group">
                  <input type="text" placeholder="Usuario" class="form-control" name="userUsuario" required></input>
                </div>

                <div class="form-group">
                  <input type="password" placeholder="Contraseña" class="form-control" name="passwordUsuario" required></input>
                </div>
                <div class="errorusu">
                <?php 
                  if(isset($_GET['e'])){
                    switch ($_GET['e']){
                      case '1':
                        echo '<p>Error de conexión</p>';
                        break;
                      case '2':
                        echo '<p>Usuario no existe</p>';
                        break;
                      case '3':
                        echo '<p>Su contraseña es incorrecta</p>';
                        break;
                      default:
                        break;
                    }
                  }
                ?>
                </div>
                <button name="enviar" style="margin-top:33px" class="btn buttonColor" type="submit"><i class="fa-solid fa-right-to-bracket"></i>   Iniciar sesión</button>
                

              </form>
              
          </div>
        </div>
  </div>
  <?php //} ?>
  </body>
</html>