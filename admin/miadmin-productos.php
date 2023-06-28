<?php include ('../conexion.php')?>
<!DOCTYPE html >
<html >
    <head>
        <title>Sistema Ecommerce</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <script type="text/javascript" src="../js\jquery-3.6.4.js"></script>
        <script type="text/javascript" src="../js\bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../fontawesome-free-6.3.0-web\css\all.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Raleway:wght@500&family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body class="panelcontrol" >
            <?php
            //require_once('../header.php');
            ?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>

        <div style=" margin:10px;"> 
        <span class="text-center"><h3 >MODO ADMINISTRADOR</h3></span>
                
            <div class="col-sm-4">
                <h1 >Productos</h1>
                <hr class="lineazul">
            </div>
            <div id="sidebar"class="container-fluid">
                <div class="row">
                    <div class="col-sm-4" style="background-color:#141414; padding: 0px">
                        <ul class="nav flex-column navbarleftside">
                            <li class="nav-item">
                                <a class="nav-link " href="miadmin.php"><i class="fa-solid fa-desktop"></i>  Escritorio</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="miadmin-productos.php"><i class="fa-solid fa-box-open"></i> Productos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="miadmin-usuarios.php"><i class="fa-solid fa-users"></i> Usuarios</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="miadmin-facturas.php"> <i class="fa-solid fa-book"></i> Facturas</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="miadmin-pedidos.php"> <i class="fa-solid fa-truck"></i> Pedidos</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-8" style="padding-left: 25px !important;">
                    
                    <div class="text-center">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo de producto</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql="SELECT * FROM producto";
                                        $resultado=mysqli_query($conexion,$sql);
                                        while($row=mysqli_fetch_array($resultado)){
                                        $tipoProducto = $row['tipoProducto'];
                                        $textoTipoProducto = '';
                                        switch ($tipoProducto) {
                                            case 1:
                                                $textoTipoProducto = 'Impresoras';
                                                break;
                                            case 2:
                                                $textoTipoProducto = 'Computadoras';
                                                break;
                                            case 3:
                                                $textoTipoProducto = 'Tabletas';
                                                break;
                                            case 4:
                                                $textoTipoProducto = 'Escaneres';
                                                break;
                                            case 5:
                                                $textoTipoProducto = 'Etiquetas';
                                                break;
                                            case 6:
                                                $textoTipoProducto = 'Software';
                                                break;
                                            case 7:
                                                $textoTipoProducto = 'Cintas';
                                                break;
                                            default:
                                                $textoTipoProducto = 'Tipo desconocido';
                                                
                                        }
                                            echo 
                                            '<tr>
                                            <th scope="row">'.$row['idProducto'].'</th>
                                                <td>'.$row['nomProducto'].'</td>
                                                <td>'.$textoTipoProducto.'</td>
                                                <td>'.$row['desProducto'].'</td>
                                                <td>'.$row['preProducto'].'</td>
                                                
                                                <td> <button type="button"  
                                                data-nomb ="'.$row['nomProducto'].'" data-id="'.$row['idProducto'].'" 
                                                data-tipo="'.$row['tipoProducto'].'" 
                                                data-des="'.$row['desProducto'].'" data-precio="'.$row['preProducto'].'"
                                                data-estado="'.$row['estado'].'" 
                                                data-toggle="modal" data-target="#editmodal" style="cursor:pointer;"><i class="fa-solid fa-pen"></i></button>  <button onclick="DeleteProduct('.$row['idProducto'].')"style="cursor:pointer;"><i class="fa-solid fa-trash"></i> </button> </td>
                                            </tr>';
                                        }
                                    ?>
                            
             
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Producto nuevo</button>
                              <!-- The Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Añadir producto</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div> 
                                    <div class="modal-body">
                                        <input type="text" class="form-control" id="codigo" style="display:none;"></input>
                                        <div class="form-group set" style="background-color:white">
                                            <input type="text" placeholder="Nombre del producto" class="form-control" id="name"></input>
                                        </div>
                                        <div class="form-group set">
                                            <select id="tipoprod" class="custom-select colorselect">
                                                <option selected>Tipo de producto</option>
                                                <option value="1">Impresoras </option>
                                                <option value="2">Computadoras </option>
                                                <option value="3">Tabletas </option>
                                                <option value="4">Escaneres </option>
                                                <option value="5">Etiquetas </option>
                                                <option value="6">Software </option>
                                                <option value="7">Cintas </option>
                                            </select>
                                        </div>
                                        <div class="form-group set ">
                                            <input type="text" placeholder="Descripción" class="form-control" id="description"></input>
                                        </div>
                                        <div class="form-group set ">
                                            <input type="text" placeholder="Precio" class="form-control" id="price"></input>
                                        </div>
                                        <div class="form-group set">
                                            <select id="estado" class="custom-select colorselect">
                                                <option selected>Selecciona un estado</option>
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <div class="form-group">
                                                <input name="imagen" type="file" class="form-control-file" id="imagen">
                                            </div>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="save_producto()">Insertar producto</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal para editar-->
                        <div class="modal fade" id="editmodal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Editar producto</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div> 
                                    <div class="modal-body">
                                        <input type="text" class="form-control" id="idProducto-e" style="display:none;"></input>
                                        <div class="form-group set" style="background-color:white">
                                            <input type="text" placeholder="Nombre del producto" class="form-control" id="nombProducto-e"></input>
                                        </div>
                                        <div class="form-group set">
                                            <select id="tipoprod-e" class="custom-select colorselect">
                                                <option >Tipo de producto</option>
                                                <option value="1">Impresoras </option>
                                                <option value="2">Computadoras </option>
                                                <option value="3">Tabletas </option>
                                                <option value="4">Escaneres </option>
                                                <option value="5">Etiquetas </option>
                                                <option value="6">Software </option>
                                                <option value="7">Cintas </option>
                                            </select>
                                        </div>
                                        <div class="form-group set ">
                                            <input type="text" placeholder="Descripción" class="form-control" id="description-e"></input>
                                        </div>
                                        <div class="form-group set ">
                                            <input type="text" placeholder="Precio" class="form-control" id="price-e"></input>
                                        </div>
                                        <div class="form-group set">
                                            <select id="estado-e" class="custom-select colorselect">
                                                <option >Selecciona un estado</option>
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                        </div>
                                        <div class="form-group ">

                                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updatePro()">Editar producto</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function save_producto(){
                
                let fd=new FormData();
                fd.append('codigo',document.getElementById('codigo').value);
                fd.append('name',document.getElementById('name').value);
                fd.append('tipoprod',document.getElementById('tipoprod').value);
                fd.append('description',document.getElementById('description').value);
                fd.append('price',document.getElementById('price').value);
                fd.append('estado',document.getElementById('estado').value);
                fd.append('imagen',document.getElementById('imagen').files[0]);
                let request=new XMLHttpRequest();
                request.open('POST','api/producto-save.php',true);
                request.onload=function(){
                    if(request.readyState==4 && request.status==200){
                        let response=JSON.parse(request.responseText);
                        console.log(response);
                        if(response.state==true){
                            alert("correcto");
                            window.location.reload();

                        }else{
                            alert(response.detail);
                        }
                    }
                }
                request.send(fd);

            }

            function updatePro() {
                var idProducto = document.getElementById('idProducto-e').value;
                var nombProducto = document.getElementById('nombProducto-e').value;
                var tipoprod = document.getElementById('tipoprod-e').value;
                var description = document.getElementById('description-e').value;
                var price = document.getElementById('price-e').value;
                var estado = document.getElementById('estado-e').value;

                var data = {
                    idProducto: idProducto,
                    nombProducto: nombProducto,
                    tipoprod: tipoprod,
                    description: description,
                    price: price,
                    estado: estado
                };

                // Realizar la solicitud PUT utilizando AJAX
                var xhr = new XMLHttpRequest();
                xhr.open('PUT', 'api/edit-product.php', true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // La solicitud se completó correctamente
                        console.log(xhr.responseText);
                        alert(xhr.responseText);
                        location.reload(); // Recargar la página
                    } else {
                        // La solicitud no se completó correctamente
                        console.error('Error en la solicitud: ' + xhr.status);
                    }
                    }
                };
                xhr.send(JSON.stringify(data));
            }



            function DeleteProduct(idProducto){
                $.ajax({
                    url: "api/Eliminar_producto.php",
                    method: "POST",
                    data: { idProducto: idProducto },
                    success: function(response) {

                        alert("Producto eliminado de forma exitosa");
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                    // Manejar errores en la petición AJAX
                    console.error(error);
                    }
                });
            }

            $(document).ready(function() {
            $('#editmodal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Botón que activó el modal
                var id = button.data('id'); // Obtener el valor del atributo data-id
                var nomb = button.data('nomb'); 
                var tipo = button.data('tipo'); 
                var des = button.data('des'); 
                var precio = button.data('precio'); 
                var estado = button.data('estado'); 


                var modal = $(this);
                modal.find('#idProducto-e').val(id);
                modal.find('#nombProducto-e').val(nomb);
                modal.find('#tipoprod-e').val(tipo); 
                modal.find('#description-e').val(des); 
                modal.find('#price-e').val(precio); 
                modal.find('#estado-e').val(estado); 

            });
            });

        </script>
        </div>

            <?php
            
                require_once('../footer.php');
            ?>
    </body>
</html>
