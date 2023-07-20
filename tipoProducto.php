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

            
        <div class="container-fluid text-center">
            <div class="row" > 
                <div class="col-2 sidebar" style="background-color: #141414;">
                    <ul class="nav flex-column  text-left ">
                        <h4 style="color:white; padding-top:15px;"> Categorias</h4>
                        <li class="nav-item new">
                            <a id="impresora" class="nav-link " href="tipoProducto.php?p=1"><i class="fa-solid fa-print"></i>  Impresoras</a>
                        </li>
                        <li class="nav-item new">
                            <a id="computadoras" class="nav-link" href="tipoProducto.php?p=2"><i class="fa-solid fa-computer"></i> Computadoras</a>
                        </li>
                        <li class="nav-item new">
                            <a id="tabletas" class="nav-link " href="tipoProducto.php?p=3"><i class="fa-solid fa-tablet"></i>  Tabletas</a>
                        </li>
                        <li class="nav-item new">
                            <a id="escaneres" class="nav-link " href    ="tipoProducto.php?p=4"><i class="fa-solid fa-solid fa-qrcode"></i> Escaneres</a>
                        </li>
                        <li class="nav-item new">
                            <a id="etiquetas" class="nav-link " href="tipoProducto.php?p=5"><i class="fa-solid fa-tag"></i> Etiquetas</a>
                        </li>
                        <li class="nav-item new">
                            <a id="software" class="nav-link " href="tipoProducto.php?p=6"><i class="fa-solid fa-microchip"></i> Software</a>
                        </li>                            
                        <li class="nav-item new">
                            <a id="cintas" class="nav-link " href="tipoProducto.php?p=7"><i class="fa-solid fa-tape"></i>  Cintas</a>
                        </li>
                        <h4 style="color:white; padding-top:15px;">Filtrar por precio</h4>

                    </ul>   

                </div>
                
                <div class="col-10 row you" id="space-list">
        
                </div>
                

    
            
            
            </div>
            
        </div>



        <?php
            require_once('footer.php');
        ?>

        <script type="text/javascript">
            var p='<?php echo $_GET["p"]; ?>';

            let impresora =document.getElementById("impresora");
            let computadoras =document.getElementById("computadoras");
            let tabletas =document.getElementById("tabletas");
            let escaneres =document.getElementById("escaneres");
            let etiquetas =document.getElementById("etiquetas");
            let software =document.getElementById("software");
            let cintas =document.getElementById("cintas");

            switch (p) {
                case '1':
                    impresora.classList.add("active");
                    break;
                case '2':
                    computadoras.classList.add("active");
                    break;
                case '3':
                    tabletas.classList.add("active");
                    break;
                case '4':
                    escaneres.classList.add("active");
                    break;
                case '5':
                    etiquetas.classList.add("active");
                    break;
                case '6':
                    software.classList.add("active");
                    break;
                case '7':
                    cintas.classList.add("active");
                    break;
                default:
                    break;         
            }
        </script>

        <script type="text/javascript">
            (function(){
                $.ajax({
                    url:'services/producto/todosproductos.php',
                    type:'POST',
                    data:{},
                    success:function(data){
                        
                        let html='';
                        for(var i=0; i<data.datos.length;i++){
                            if(data.datos[i].tipoProducto==p){
                                html+='<div class="col-sm-3 cardProducto" >'+
                                    '<h5 >'+data.datos[i].nomProducto+'</h5>'+
                                    '<div class="imgProd"><img src="assets/Productos/'+data.datos[i].imgProducto+'" > </div>'+
                                    '<div class="colorPrecio"><h4>$'+data.datos[i].preProducto+' MXN</h4></div>'+
                                    '<div class="details"><p>'+data.datos[i].desProducto+' </p></div>'+
                                    //'<div class="btn-group" ">'+
                                        /*'<button type="button" class="btn btn-primary " >Agregar al carrito  <i class="fa-solid fa-plus"></i></button>'+*/
                                        '<button type="button" class="btn btn-primary btn-block"><a style="color:white;text-decoration: none;" href="producto.php?p='+data.datos[i].idProducto+'"> <i class="fa-solid fa-plus"></i> Detalles</a> </button>'+
                                    //'</div>'+
                                '</div>';
                            ;

                            }

                            
                            
                        }
                        
                        document.getElementById("space-list").innerHTML=html;
                    }
                });
            })();


            function open_login(){
                window.location.href="loginuser.php";
            }
        </script>

    </body>
</html>
