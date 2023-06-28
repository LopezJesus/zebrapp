<?php session_start();   
?>
<!DOCTYPE html>
<html>
    <head>
      <link rel="shortcut icon" href="favicon.png">
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
    <body class="black">
      <?php include ("conexion.php"); 
      $sql="select * from usuariosl";
      $resultado=mysqli_query($conexion,$sql);
      ?>

    
            <?php
            require_once('header.php');
            ?>
        

          <!--Carrusel-->
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" style="max-height:60vh;"src="assets\BannerTest2.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <!--<h5>My Caption Title (1st Image)</h5>
                        <p>The whole caption will only show up if the screen is at least medium size.</p>-->
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="max-height:60vh;" src="assets\BannerTest.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="max-height:60vh;"src="assets\Banner3.png" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="container  black ">
            <div class="row text-center">
              <div class="col-sm-4 cool"> <h3>Impresoras   </h3>      
                <img class="d-block w-100" src="assets\impresoraIndex.png">
                <div><button class="btn buttonColorin"><a style="color:white;text-decoration: none;" href="tipoProducto.php?p=1">Ver detalles</a> </button> </div>

              </div>
              
              <div class="col-sm-4 cool"> <h3>Computadoras </h3>                

                <img class="d-block w-100" src="assets\computadoras.jpg">
                <div><button class="btn buttonColorin " ><a style="color:white;text-decoration: none;" href="tipoProducto.php?p=2">Ver detalles</a></button> </div>

              </div>
              
              <div class="col-sm-4 cool"> <h3>Tabletas </h3>                

                <img class="d-block w-100" src="assets\tabletas.jpg" >
                <div><button class="btn buttonColorin "><a style="color:white;text-decoration: none;" href="tipoProducto.php?p=3">Ver detalles</a></button> </div>

              </div>
            </div>

            <div class="row text-center">
              <div class="col-sm-3 cool "> <h3>Escaneres   </h3>              

                <img class="d-block w-100" src="assets\escanerIndex.jpg">
                <div><button class="btn buttonColorin " ><a style="color:white;text-decoration: none;" href="tipoProducto.php?p=4">Ver detalles</a></button> </div>

              </div>

              <div class="col-sm-3 cool"> <h3>Etiquetas </h3>                

                <img class="d-block w-100" src="assets\labelsIndex.jpg">
                <div><button class="btn buttonColorin " ><a style="color:white;text-decoration: none;" href="tipoProducto.php?p=5">Ver detalles</a></button> </div>

              </div>
             
              <div class="col-sm-3 cool "> <h3>Software </h3>                

                <img class="d-block w-100" src="assets\SoftwareIndex.png" >
                <div><button class="btn buttonColorin " ><a style="color:white;text-decoration: none;" href="tipoProducto.php?p=6">Ver detalles</a></button> </div>

              </div>
              <div class="col-sm-3 cool "> <h3>Cintas   </h3>              

                <img class="d-block w-100" src="assets\CintasIndex.jpg">
                <div><button class="btn buttonColorin " ><a style="color:white;text-decoration: none;" href="tipoProducto.php?p=7">Ver detalles</a></button> </div>

              </div>              
            
            </div>
            </div>

            <div class="container-fluid white paddington">
            <div class="text-center">
              <h4>Productos destacados</h4>
              <div class="row" id="space-list"> 
            
              </div>
            </div>
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
                    url:'services/producto/todosproductos.php',
                    type:'POST',
                    data:{},
                    success:function(data){
                        console.log(data);

                        let html='';
                        for(var i=0; i<data.datos.length;i++){
                          if(data.datos[i].featured==1){
                            html+='<div class="col-sm-3  cardProducto" >'+
                                    '<h5 >'+data.datos[i].nomProducto+'</h5>'+
                                    '<div class="imgProd"><img src="assets/Productos/'+data.datos[i].imgProducto+'" > </div>'+
                                    '<div class="colorPrecio"><h4>$'+data.datos[i].preProducto+' MXN</h4></div>'+
                                    '<div class="details"><p>'+data.datos[i].desProducto+' </p></div>'+
                                    '<div class="btn-group" ">'+
                                        '<button type="button" class="btn btn-primary " >Agregar al carrito  <i class="fa-solid fa-plus"></i></button>'+
                                        '<button type="button" class="btn btn-primary"><a style="color:white;text-decoration: none;" href="producto.php?p='+data.datos[i].idProducto+'">Detalles</a> </button>'+
                                    '</div>'+
                                '</div>';
                            ;
                          }


                        }
                        document.getElementById("space-list").innerHTML=html;
                    }
                });
            })();
      </script>
    </body>
</html>
