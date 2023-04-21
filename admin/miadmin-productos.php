<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Ecommerce</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <script type="text/javascript" src="../js\jquery-3.6.4.js"></script>
        <script type="text/javascript" src="../js\bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../fontawesome-free-6.3.0-web\css\all.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Raleway:wght@500&family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body class="panelcontrol" >
      <?php include ("../conexion.php"); 
      $sql="select * from usuariosl";
      $resultado=mysqli_query($conexion,$sql);
      ?>
        <header>
            <?php
            require_once('../header.php');
            ?>
        </header>
        <div style=" margin:10px;"> 
        <span class="text-center"><h3 >MODO ADMINISTRADOR</h3></span>
                
            <div class="col-sm-4">
                <h1 >Productos</h1>
                <hr class="lineazul">
            </div>
            <div id="sidebar"class="container-fluid">
                <div class="row">
                    <div class="col-sm-4" style="background-color:#141414; padding: 0px">
                        <ul class="nav flex-column navbarleftside">
                            <li class="nav-item">
                                <a class="nav-link " href="miadmin.php"><i class="fa-solid fa-desktop"></i>  Escritorio</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="miadmin-productos.php"><i class="fa-solid fa-box-open"></i> Productos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="miadmin-usuarios.php"><i class="fa-solid fa-users"></i> Usuarios</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="miadmin-facturas.php"> <i class="fa-solid fa-book"></i> Facturas</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="miadmin-pedidos.php"> <i class="fa-solid fa-truck"></i> Pedidos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="miadmin-logout.php"><i class="fa-solid fa-right-from-bracket"></i>  Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-8" style="padding-left: 25px !important;">
                    <div class="text-center">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col"># Producto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Nombre de imagen</th>
                                    <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">001</th>
                                        <td>Impresora de ejemplo</td>
                                        <td>$1350.00 MXN</td>
                                        <td>impresora1.webp</td>
                                        <td> <i class="fa-solid fa-eye"></i>   <i class="fa-solid fa-pen"></i>   <i class="fa-solid fa-trash"></i> </td>
                                    </tr>
              
                                </tbody>
                            </table>
                            <a href="#"><button class="btn buttonColorin" type="submit"></i>Crear producto</button></a>

                        </div>                    
                    </div>
                </div>
            </div>
        </div>
        
        <footer>
            <?php
                require_once('../footer.php');
            ?>
            </footer>
    </body>
    
    <script type="text/javascript">
    function loginadmin() {

       
}

    </script>
</html>
