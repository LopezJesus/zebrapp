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
    <body>
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
                    <img class="d-block w-100" src="assets\BannerTest2.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <!--<h5>My Caption Title (1st Image)</h5>
                        <p>The whole caption will only show up if the screen is at least medium size.</p>-->
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets\BannerTest.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets\Banner3.png" alt="Third slide">
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

          <div class="container   ">
            <div class="row bg-white text-center">
              <div class="col-sm-4  "> <h3>Impresoras   </h3>               

                <img class="d-block w-100" src="assets\Productos\impresora1.webp">
                <div><button class="btn buttonColorin ">Ver detalles</button> </div>

              </div>
              <div class="col-sm-3"> <h3>Computadoras </h3>                

                <img class="d-block w-100" src="assets\computadoras.jpg">
                <div><button class="btn buttonColorin ">Ver detalles</button> </div>

              </div>
              
              <div class="col-sm-3 "> <h3>Tabletas </h3>                

                <img class="d-block w-100" src="assets\tabletas.jpg" >
                <div><button class="btn buttonColorin ">Ver detalles</button> </div>

              </div>
              <div class="col-sm-2  "> <h3>Escaneres   </h3>              

                <img class="d-block w-100" src="assets\escaneres.jpg">
                <div><button class="btn buttonColorin ">Ver detalles</button> </div>

              </div>
       

            </div>
            <div class="text-center">
              <h4>Productos destacados</h4>
              <div class="row" id="space-list"> 
            
              </div>
            </div>
          </div>

            <?php
              /*while($filas=mysqli_fetch_assoc($resultado)){

              
            ?>
            <p> ID de usuario: <?php echo $filas['idUsuarios'] ?></p>
            <p> Nombre de usuario: <?php echo $filas['NombreUsuario'] ?>  </p>
            <p> Contraseña: <?php echo $filas['passwordUsuario'] ?>  </p>
            <?php }*/ ?>
          </div>
        <footer>  

        <?php
            require_once('footer.php');
        ?>
        </footer>
        <script type="text/javascript" src="js/mainscript.js"></script>

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
                            html+='<div class="col-sm-3 cardProducto" >'+
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
                        document.getElementById("space-list").innerHTML=html;
                    }
                });
            })();
      </script>
    </body>
</html>
