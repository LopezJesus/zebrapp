<?php
	session_start();
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
        <div class="container-fluid text-center canvas container-md">
            <div class="row" style=";"> 
                <div class="col-sm-6 part1 text-right">
                    <img id="imgprod" src="assets/productos/impresora1.jpg"  style="padding 30px;">
                </div>
                <div class="col-sm-6 part2 text-justify">
                    <h2 id="nameprod">Nombre</h2>
                    <h2 id="precioprod">precio</h2>
                    <h3 id="tipoprod">Tipo de producto</h3>

                    <h4> Descripción del producto</h4>
                    <p id="desprod">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                    <button class="btn buttonColor" onclick="iniciar_compra()">Comprar ahora</button>
                    <h4> Descripción larga del producto</h4>
                    <p id="desprodL">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>

                </div>

            </div>
            
            <h4>Productos relacionados</h4>
            <div class="row" id="space-list"> 
            
            </div>
            
        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
        <footer>  

        <?php
            require_once('footer.php');
        ?>
        </footer>

        <script type="text/javascript">
            var p='<?php echo $_GET["p"]; ?>';
        </script>

        <script type="text/javascript">
            (function(){
                $.ajax({
                    url:'services/producto/todosproductos.php',
                    type:'POST',
                    data:{},
                    success:function(data){
                        console.log(data)

                        let html='';
                        for(var i=0; i<data.datos.length;i++){
                            if(data.datos[i].idProducto==p){

                                let eltipo = data.datos[i].tipoProducto;
                                let textoTipoProducto = '';
                                switch (eltipo) {
                                    case '1':
                                        textoTipoProducto = 'Impresoras';
                                        break;
                                    case '2':
                                        textoTipoProducto = 'Computadoras';
                                        break;
                                    case '3':
                                        textoTipoProducto = 'Tabletas';
                                        break;
                                    case '4':
                                        textoTipoProducto = 'Escaneres';
                                        break;
                                    case '5':
                                        textoTipoProducto = 'Etiquetas';
                                        break;
                                    case '6':
                                        textoTipoProducto = 'Software';
                                        break;
                                    case '7':
                                        textoTipoProducto = 'Cintas';
                                        break;
                                    default:
                                        textoTipoProducto = 'Tipo desconocido';         
                                }

                                document.getElementById("imgprod").src="assets/productos/"+data.datos[i].imgProducto;
                                document.getElementById("nameprod").innerHTML=data.datos[i].nomProducto;
                                document.getElementById("tipoprod").innerHTML=textoTipoProducto;
                                document.getElementById("precioprod").innerHTML=data.datos[i].preProducto;
                                document.getElementById("desprod").innerHTML=data.datos[i].desProducto;
                                document.getElementById("desprodL").innerHTML=data.datos[i].desLProducto;

                            }
                            html+='<div class="col-sm-3 cardProducto" >'+
                                    '<h5 >'+data.datos[i].nomProducto+'</h5>'+
                                    '<img src="assets/Productos/'+data.datos[i].imgProducto+'" class="img-fluid" width="200" >'+
                                    '<div class="colorPrecio"><h4>'+data.datos[i].preProducto+'</h4></div>'+
                                    '<div class="detaildes"><p class="">'+data.datos[i].desProducto+'</p></div>'+
                                    '<div class="btn-group" ">'+
                                        '<button type="button" class="btn btn-primary " >Agregar al carrito  <i class="fa-solid fa-plus"></i></button>'+
                                        '<button type="button" class="btn btn-primary"><a style="color:white;text-decoration: none;" href="producto.php?p='+data.datos[i].idProducto+'">Detalles</a> </button>'+
                                    '</div>'+
                                '</div>';
                            ;
                        }
                        
                        document.getElementById("space-list").innerHTML=html;
                    }
                });
            })();

            function iniciar_compra(){
                $.ajax({
                    url:'services/producto/validar_compra.php',
                    type:'POST',
                    data:{
                        idProducto:p
                    },
                    success:function(data){
                        console.log(data); 
                        if(data.state){
                            alert(data.detail);
                        }else{
                            alert(data.detail);
                            if(data.open_login){
                                open_login();

                            }
                        }       
                    }
                })
            }

            function open_login(){
                window.location.href="loginuser.php";
            }
        </script>

    </body>
</html>
