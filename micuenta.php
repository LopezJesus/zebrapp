<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Ecommerce</title>
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
    <body class="panelcontrol" >
      <?php include ("conexion.php"); 
      $nombreUsuario = $_SESSION['userUsuario'];
      $sql = "SELECT * FROM usuariosl WHERE userUsuario = '$nombreUsuario'";


      $resultado=mysqli_query($conexion,$sql);
      ?>
            <?php
            require_once('header.php');
            ?>
            <?php
              while($filas=mysqli_fetch_assoc($resultado)){
                
            ?>
        <div style=" margin:10px;">        
            <div class="col-sm-4">
                <h1 >Escritorio</h1>
                <hr class="lineazul">
            </div>
            <div id="sidebar"class="container-fluid">
                <div class="row">
                    <div class="col-sm-4" style="background-color:#141414; padding: 0px">
                        <ul class="nav flex-column navbarleftside">
                            <li class="nav-item">
                                <a class="nav-link active" href="micuenta.php"><i class="fa-solid fa-desktop"></i>  Escritorio</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="pedido.php"><i class="fa-solid fa-truck"></i>  Mis pedidos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="micuenta_historial.php"><i class="fa-solid fa-book"></i>  Historial de pedidos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="micuenta_ajustes.php"> <i class="fa-solid fa-gear"></i>  Ajustes</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>  Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-8" style="padding-left: 25px !important;">
                        <span class="icon-grande center"><i class="fa-solid fa-user"></i></span>
                        <p>Hola <span class="highlight"><?php echo $filas['userUsuario'] ?></span>, desde aquí puedes modificar tus datos, ver tus pedidos, facturas y cerrar sesión.</p>
                        <h4>Tus datos</h4>
                        <li>Nombre(s): <span class="highlight"><?php echo $filas['NombreUsuario'] ?></span></li> 
                        <li>Apellidos: <span class="highlight"><?php echo $filas['ApellidoUsuario'] ?></span></li> 
                        <li>Correo electrónico: <span class="highlight"><?php echo $filas['emailUsuario'] ?></span></li> 
                        <li>Teléfono: <span class="highlight"><?php echo $filas['telefonoUsuario'] ?></span></li> 
                        <li>Dirección de envio: <span class="highlight"><?php echo $filas['ciudadUsuario']," ", $filas['codposUsuario'] ," ", $filas['Dirección']?></span></li> 

                      <?php } ?>
                      
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <?php
                require_once('footer.php');
            ?>
            </footer>
    </body>
</html>
