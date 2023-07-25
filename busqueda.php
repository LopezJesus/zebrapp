<?php session_start(); ?>

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

        <header>
            <?php
            require_once('header.php');
            ?>
        </header>
            <div class="container fluid text-center">
              <h4>Resultados de la busqueda de <strong>"<?php echo $_GET['text'];?>"</strong></h4>
              <div class="row" id="space-list"> 
            
              </div>
            </div>
          </div>
          </div>
        <footer>  

        <?php
            require_once('footer.php');
        ?>
        </footer>
        <script type="text/javascript" src="js/mainscript.js"></script>

        <script type="text/javascript">
            (function(){
                var text="<?php echo $_GET['text'];?>";
                $.ajax({
                    url:'services/producto/get_resultados.php',
                    type:'POST',
                    data:{
                        text:text
                    },
                    success:function(data){
                        console.log(data);

                        let html='';
                        for(var i=0; i<data.datos.length;i++){
                            html+='<div class="col-sm-3 cardProducto" >'+
                                    '<h5 >'+data.datos[i].nomProducto+'</h5>'+
                                    '<div class="imgProd"><img src="assets/Productos/'+data.datos[i].imgProducto+'" > </div>'+
                                    '<div class="colorPrecio"><h4>$'+data.datos[i].preProducto+' MXN</h4></div>'+
                                    '<div class="details"><p>'+data.datos[i].desProducto+' </p></div>'+
                                    '<a style="color:white;text-decoration: none;" href="producto.php?p='+data.datos[i].idProducto+'"><button type="button" class="btn btn-primary btn-block"><i class="fa-solid fa-plus"></i> Detalles </button></a>'+
                                '</div>';
                            ;
                        }
                        if (html==''){
                            document.getElementById("space-list").innerHTML="<p>No hay resultados</p>";

                        }else{
                            document.getElementById("space-list").innerHTML=html;

                        }
                    }
                });
            })();
      </script>
    </body>
</html>
