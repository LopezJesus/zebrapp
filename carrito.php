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
      $nombreUsuario = $_SESSION['userUsuario'];
      $sql = "SELECT * FROM usuariosl WHERE userUsuario = '$nombreUsuario'";
      $resultado=mysqli_query($conexion,$sql);
      ?>
        <header>
            <?php
            require_once('header.php');
            ?>
            <?php
              while($filas=mysqli_fetch_assoc($resultado)){
                
            ?>
        </header>
        <div class="container text-left" style="background-color:#d0d0d0; margin 30px;">
            <h1> Mi carrito </h1>
            <div class="lineazul" style="width:300px; margin-bottom:35px;"></div>
            <div class="container-fluid-sm" style="background-color:white" id="space-list">
            </div>
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-4 text-left"><h3> Total: </h3> <h4> $<span id="montotal"></span> MXN </h4></div>
                    <div class="col-sm-8 text-center">
                            <div class="form-group text-left">
                            <label>Dirección:</label>

                                <input type="text" placeholder="Dirección" class="form-control" id="dirusu" value="<?php echo $filas['Dirección'] ?>"></input>
                            </div>
                            <div class="form-group text-left">
                                <label>Teléfono:</label>
                                <input type="text" placeholder="Teléfono" class="form-control" id="telusu" value=<?php echo $filas['telefonoUsuario'] ?>></input>
                            </div>
                            <button style="margin-bottom:35px;" class="btn buttonColor" type="submit" onclick="procesar_compra()">Procesar compra</button>
                    </div>
                </div>
            </div>
        </div>
        <footer>  
        <?php } ?>
        <?php
            require_once('footer.php');
        ?>
        </footer>


        <script type="text/javascript">
            (function(){
                $.ajax({
                    url:'services/pedido/todospedidos.php',
                    type:'POST',
                    data:{},
                    success:function(data){
                        console.log(data);
                        let monto=0;

                        let html='';
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
                                    '</div>'+   
                                    '<div class="col-sm-2">'+
                                        '<h5>Acciones</h5>'+
                                        '<button class="btn" onclick="delete_producto('+data.datos[i].idPedido+')"><i class="fa-solid fa-xmark item-option elementCart"></i> </button>'+
                                    '</div>'+   
                                '</div>';
                                monto=monto+parseFloat(data.datos[i].preProducto );

                            ;
                        }
                        document.getElementById("space-list").innerHTML=html;
                        document.getElementById("montotal").innerHTML=monto;

                    }
                });
            })();

            function procesar_compra(){
                let dirusu=document.getElementById("dirusu").value;
                let telusu=document.getElementById("telusu").value;
                if(dirusu == "" || telusu==""){
                    alert("Complete los campos");
                }else{
                    $.ajax({
                    url:'services/pedido/confirm.php',
                    type:'POST',
                    data:{
                        dirusu:dirusu,
                        telusu:telusu
                    },
                    success:function(data){
                        console.log(data);
                        if(data.state){
                            window.location.href="pedido.php";
                        }else
                        {
                            alert(data.detail)  ;
                        }
                    },
                    error:function(err){
                        console.error(err);
                    }
                });
                }

            }

            function delete_producto(idPedido){
                $.ajax({
                    url:'services/pedido/delete_pedido.php',
                    type:'POST',
                    data:{
                        idPedido:idPedido,
                    },
                    success:function(data){
                        console.log(data);
                        if(data.state){
                            alert("Producto eliminado del carrito");
                            window.location.reload();
                        }else
                        {
                            alert(data.detail)  ;
                        }
                    },
                    error:function(err){
                        console.error(err);
                    }
                });

            }
               
        </script>    
    </body>
</html>
