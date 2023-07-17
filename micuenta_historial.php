<?php
session_start();
if(!isset($_SESSION['idUsuarios'])){
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Ecommerce</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script type="text/javascript" src="js\jquery-3.6.4.js"></script>
        <script type="text/javascript" src="js\bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="fontawesome-free-6.3.0-web\css\all.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Raleway:wght@500&family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
      <?php include ("conexion.php"); 
      $sql="select * from usuariosl";
      $resultado=mysqli_query($conexion,$sql);
      $idUsu= $_SESSION['idUsuarios'];

      ?>
            <?php
            require_once('header.php');
            ?>
        <div style=" margin:10px;">        
            <div class="col-sm-4">
                <h1 >Mis Pedidos</h1>
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
                                <a class="nav-link " href="pedido.php"><i class="fa-solid fa-truck"></i>  Mis pedidos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="micuenta_historial.php"><i class="fa-solid fa-book"></i>  Historial de pedidos</a>
                            </li>
                            <li class="nav-item  ">
                                <a class="nav-link " href="micuenta_ajustes.php"> <i class="fa-solid fa-gear"></i>  Ajustes</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>  Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-8 text-left">
                        <div class="container-fluid-sm" style="background-color:white" id="space-list"></div>
                        </div>
                </div>
            </div>
        </div>

        <?php
            require_once('footer.php');
        ?>
  

        <script type="text/javascript">

            var userId = <?php echo json_encode($idUsu); ?>; // Obtén el ID de usuario desde PHP

            (function(){
                $.ajax({
                    url:'services/pedido/get_history.php',
                    type:'POST',
                    data:{
                        userId:userId
                    },
                    success:function(data){
                        console.log(data);
                        let html='';
                        for(var i=0; i<data.datos.length;i++){
                            html+='<div class="row sepp">'+
                                    '<div class="pedido-img col-sm-3">'+
                                        '<img src="assets/Productos/'+data.datos[i].imgProducto+'" >'+
                                    '</div>'+   
                                    '<div class="pedido-detalle col-sm-5">'+
                                        '<h5>'+data.datos[i].nomProducto+'</h5>'+
                                        '<h6><b>Precio: </b>$ '+data.datos[i].preProducto+'MXN</h6>'+
                                        '<h6><b>Fecha: </b> '+data.datos[i].FechaPedido+ '</h5>'+
                                        '<h6><b>Estado: </b> ' +data.datos[i].estado+'</h5>'+
                                        '<h6><b>Dirección: </b>' +data.datos[i].dirPedido+'</h5>'+
                                        '<h6><b>Telefono: </b>' +data.datos[i].telPedido+'</h5>'+
                                        '<h6><b>IdUsu: </b>' +data.datos[i].idUsuario+'</h5>'+

                                    '</div>'+    
                                '</div>';
                                
                            
                        }
                        document.getElementById("space-list").innerHTML=html;


                    }
                });
            })();
               
        </script>    
    </body>
</html>
