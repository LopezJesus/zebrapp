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
      ?>
        <header>
            <?php
            require_once('header.php');
            ?>
        </header>
        <div class="container-fluid text-left canvas" style="background-color:#e1e1e1 ">
            <h3> Mi carrito </h3>
            <div class="lineazul" style="width:300px; margin-bottom:35px;"></div>
            <div class="margenescarrito" style="background-color:white" id="space-list">


            </div>
            <div class="text-center">
                <button class="btn buttonColor">Procesar compra</button>
            </div>
        </div>
        <footer>  

        <?php
            require_once('footer.php');
        ?>
        </footer>


        <script type="text/javascript">
            (function(){
                $.ajax({
                    url:'services/producto/todospedidos.php',
                    type:'POST',
                    data:{},
                    success:function(data){
                        console.log(data);

                        let html='';
                        for(var i=0; i<data.datos.length;i++){
                            html+='<div class="row sepp">'+
                                    '<div class="pedido-img col-sm-2">'+
                                        '<img src="assets/Productos/'+data.datos[i].imgProducto+'" >'+
                                    '</div>'+   
                                    '<div class="pedido-detalle col-sm-5">'+
                                        '<h5>'+data.datos[i].nomProducto+'</h5>'+
                                        '<h6><b>Precio:</b>$ '+data.datos[i].preProducto+'MXN</h6>'+
                                        '<h5>Fecha: '+data.datos[i].FechaPedido+ '</h5>'+
                                        '<h5>Estado: ' +data.datos[i].estado+'</h5>'+
                                        /*<h5>Dirección: Calle por defecto 1</h5>
                                        <h5>Telefono: 664 111 2505</h5>*/
                                    '</div>'+    
                                    '<div class="col-sm-2  ">'+
                                        '<h5>Cantidad</h5>'+
                                        //<div class="flexor"><i class="fa-solid fa-minus item-option elementCart"></i>
                                        '<input type="text" placeholder="" class="form-control " style="width:33%;" name="userUsuario" required></input>'+
                                        //<i class="fa-solid fa-plus item-option elementCart"></i></div>
                                    '</div>'+   
                                    '<div class="col-sm-2">'+
                                        '<h5>Acciones</h5>'+
                                        '<i class="fa-solid fa-xmark item-option elementCart"></i>'+
                                        '<i class="fa-solid fa-eye item-option elementCart"></i>'+
                                    '</div>'+   
                                '</div>';

                            ;
                        }
                        document.getElementById("space-list").innerHTML=html;
                    }
                });
            })();
               
        </script>    
    </body>
</html>
