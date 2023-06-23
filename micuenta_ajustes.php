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
        <header>
            <?php
            require_once('header.php');
            ?>
        </header>
        <?php
              while($filas=mysqli_fetch_assoc($resultado)){
                
            ?>
        <div style=" margin:10px;">        
            <div class="col-sm-4">
                <h1 >Ajustes</h1>
                <hr class="lineazul">
            </div>
            <div id="sidebar"class="container-fluid">
                <div class="row">
                    <div class="col-sm-4" style="background-color:#141414; padding: 0px">
                        <ul class="nav flex-column navbarleftside">
                            <li class="nav-item">
                                <a class="nav-link" href="micuenta.php"><i class="fa-solid fa-desktop"></i>  Escritorio</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="micuenta_pedidos.php"><i class="fa-solid fa-truck"></i>  Mis pedidos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="micuenta_facturas.php"><i class="fa-solid fa-book"></i>  Facturas</a>
                            </li>
                            <li class="nav-item  ">
                                <a class="nav-link active" href="micuenta_ajustes.php"> <i class="fa-solid fa-gear"></i>  Ajustes</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>  Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-8 setUser" style="padding-left: 25px !important; ">
                        <p> Ajusta tus datos personales si es necesario, a su vez se cuentan con las opciones de cambiar la dirección de los pedidos y tu contraseña.</p>
                        <div class="text-left">
                        <form action="" id="user_form" class="col-12">
                            <div class="form-group">
                                <h3> Datos personales </h3>
                                <label >Nombre(s): </label>
                                <input type="text" placeholder="Nombre(s)" class="form-control" id="names" value="<?php echo $filas['NombreUsuario'] ?>"> </input>
                            </div>
                            <div class="form-group ">
                                <label >Nombre a mostrar: </label>
                                <input type="text" placeholder="Nombre a mostrar" class="form-control" id="usu" value="<?php echo $filas['userUsuario'] ?>"></input>
                            </div>
                            <div class="form-group ">
                                <label >Dirección de correo electrónico: </label>
                                <input type="text" placeholder="Dirección de correo electrónico" class="form-control" id="email" value="<?php echo $filas['emailUsuario'] ?>"></input>
                            </div>
                            <div class="form-group ">
                                <label >Teléfono: </label>
                                <input type="text" placeholder="Teléfono" class="form-control" id="phone" value="<?php echo $filas['telefonoUsuario'] ?>"></input>
                                <button id="actualizarUsuario" style="margin-top:33px" class="btn buttonColor" type="button" onclick="updateUser()"><i class="fa-solid fa-pen"></i>  Actualizar datos personales</button>
                            </div> <?php } ?>
                        </form>

                        <form action="" method="post" class="col-12">
                            <div class="form-group text-center">
                                <h3>  Datos de pedidos </h3>
                                <input type="text" placeholder="Ciudad" class="form-control" name="names"></input>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Codigo postal" class="form-control" name="phone"></input>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Dirección" class="form-control" name="phone"></input>
                                <button name="enviar" style="margin-top:33px" class="btn buttonColor" type="button"><i class="fa-solid fa-pen"></i>  Actualizar datos de pedido</button>

                            </div>
                        </form>
                        
                        <form action="" method="post" class="col-12">
                            <div class="form-group">
                                <h3> Cambio de contraseña </h3>
                                <input type="password" placeholder="Contraseña actual" class="form-control" name="pswrd"> </input>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Nueva contraseña" class="form-control" name="pswrdnew"></input>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Confirmar nueva contraseña" class="form-control" name="pswrdnew-confirm"></input>
                                <button name="enviar" style="margin-top:33px" class="btn buttonColor" type="submit"><i class="fa-solid fa-pen"></i> Cambiar contraseña</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <script type="text/javascript">
            function updateUser()
            {
                var name = document.getElementById('names').value;
                var username = document.getElementById('usu').value;
                var email = document.getElementById('email').value;
                var phone = document.getElementById('phone').value;

                console.log(name);
                console.log(username);
                console.log(name);
                console.log(email);
                console.log(phone);
                
                var data = {
                    name: name,
                    username: username,
                    email: email,
                    phone: phone
                };
                
                // Realizar la solicitud PUT utilizando AJAX
                var xhr = new XMLHttpRequest();
                xhr.open('PUT', 'services/usuario/actualizar_usuario_datageneral.php', true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // La solicitud se completó correctamente
                        console.log(xhr.responseText);
                    }
                };
                xhr.send(JSON.stringify(data));
            }
        </script>
        <footer>
            <?php
                require_once('footer.php');
            ?>
            </footer>
    </body>
</html>
