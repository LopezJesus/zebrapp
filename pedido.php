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
        <div class="container text-left" style="background-color:#d0d0d0; margin 30px;">
            <h1> Mis pedidos </h1>
            <div class="lineazul" style="width:300px; margin-bottom:35px;"></div>
            <div class="container-fluid-sm" style="background-color:white" id="space-list">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 text-left">
                            <h3>Datos de pago</h3>
                            <h4><b>Banco:</b> BBVA</h4>
                            <h4><b>No de Cuenta:</b> xxx-xxx-125</h4>
                            <h4><b>Representante:</b> Agente vendedor #1</h4>
                           <p><b>NOTA: </b>Para confirmar la compra debe realizar el deposito por el monto total, y eviar el comprobante al siguiente correo example@digiproduct.com o al número de whatsapp 111 222 333</p>

                    </div>
                    <div class="col-sm-4 text-left"><h3> Total: </h3> <h4> $<span id="montotal"> MXN </h4></div>

                </div>
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
                    url:'services/pedido/get_procesados.php',
                    type:'POST',
                    data:{},
                    success:function(data){
                        console.log(data);
                        let html='';
                        let monto=0;
                        for(var i=0; i<data.datos.length;i++){
                            html+='<div class="row sepp">'+
                                    '<div class="pedido-img col-sm-2">'+
                                        '<img src="assets/Productos/'+data.datos[i].imgProducto+'" >'+
                                    '</div>'+   
                                    '<div class="pedido-detalle col-sm-5">'+
                                        '<h5>'+data.datos[i].nomProducto+'</h5>'+
                                        '<h6><b>Precio: </b>$ '+data.datos[i].preProducto+'MXN</h6>'+
                                        '<h6><b>Fecha: </b> '+data.datos[i].FechaPedido+ '</h5>'+
                                        '<h6><b>Estado: </b> ' +data.datos[i].estado+'</h5>'+
                                        '<h6><b>Dirección: </b>' +data.datos[i].dirPedido+'</h5>'+
                                        '<h6><b>Telefono: </b>' +data.datos[i].telPedido+'</h5>'+
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
                                
                            /*if (data.datos[i]).estado==1{
                                monto+=parseFloat(data.datos[i].preProducto);
                            }*/
                        }
                        document.getElementById("space-list").innerHTML=html;

                        //document.getElementById("montotal").innerHTML=html;

                    }
                });
            })();
               
        </script>    
    </body>
</html>
