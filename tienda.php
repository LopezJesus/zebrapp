<!DOCTYPE html>
<?php session_start();?>
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
        <div class="container-fluid text-center">
            <div class="row" > 
                <div class="col-2 sidebar" style="background-color: #141414;">
                <ul class="nav ">
                        <h4 style="color:white; padding-top:15px;"> Categorias</h4>
                            <li class="nav-item new">
                                <a class="nav-link active" href="tipoProducto.php?p=1"><i class="fa-solid fa-print"></i>  Impresoras</a>
                            </li>
                            <li class="nav-item new">
                                <a class="nav-link" href="tipoProducto.php?p=2"><i class="fa-solid fa-computer"></i> Computadoras</a>
                            </li>
                            <li class="nav-item new">
                                <a class="nav-link " href="tipoProducto.php?p=3"><i class="fa-solid fa-tablet"></i>  Tabletas</a>
                            </li>
                            <li class="nav-item new">
                                <a class="nav-link " href="tipoProducto.php?p=4"><i class="fa-solid fa-solid fa-qrcode"></i> Escaneres</a>
                            </li>
                            <li class="nav-item new">
                                <a class="nav-link " href="tipoProducto.php?p=5"><i class="fa-solid fa-tag"></i> Etiquetas</a>
                            </li>
                            <li class="nav-item new">
                                <a class="nav-link " href="tipoProducto.php?p=6"><i class="fa-solid fa-microchip"></i> Software</a>
                            </li>                            
                            <li class="nav-item new">
                                <a class="nav-link " href="tipoProducto.php?p=7"><i class="fa-solid fa-tape"></i>  Cintas</a>
                            </li>
                            <h4 style="color:white; padding-top:15px;">Filtrar por precio</h4>

                        </ul>   

                </div>
                <div class="col-10 row you" id="space-list"></div>
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

            (function(){
                $.ajax({
                    url:'services/producto/todosproductos.php',
                    type:'POST',
                    data:{},
                    success:function(data){
                        console.log(data);

                        let html='';
                        data.datos.sort(function() { return Math.random() - 0.5 });

                        
                        for(var i=0; i<data.datos.length;i++){

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

                            html+='<div class="col-sm-3 cardProducto" >'+
                                    '<h5 >'+data.datos[i].nomProducto+'</h5>'+
                                    '<div class="imgProd"><img src="assets/Productos/'+data.datos[i].imgProducto+'" > </div>'+
                                    '<div class="colorPrecio"><h4>$'+data.datos[i].preProducto+' MXN</h4></div>'+
                                    '<div class="details"><p>'+data.datos[i].desProducto+' </p></div>'+
                                    '<div class=" colorPrecio typepro"><p>'+textoTipoProducto+' </p></div>'+
                                    '<div class="btn-group" ">'+
                                        '<button type="button" class="btn btn-primary " >Agregar al carrito  <i class="fa-solid fa-plus"></i></button>'+
                                        '<button type="button" onclick="iniciar_compra()" class="btn btn-primary"><a style="color:white;text-decoration: none;" href="producto.php?p='+data.datos[i].idProducto+'">Detalles</a> </button>'+
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

        </script>

        
    </body>
</html>
