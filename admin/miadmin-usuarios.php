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
                                <a class="nav-link " href="miadmin-productos.php"><i class="fa-solid fa-box-open"></i> Productos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="miadmin-usuarios.php"><i class="fa-solid fa-users"></i> Usuarios</a>
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
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Nombre de usuario</th>
                                        <th scope="col">Nombre Completo</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Correo electrónico</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Dirección</th>
                                        <!--<th scope="col">Tipo de usuario</th>-->
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql="SELECT * FROM usuariosl";
                                        $resultado=mysqli_query($conexion,$sql);
                                        while($row=mysqli_fetch_array($resultado)){
                                            echo 
                                            '<tr>
                                            <th scope="row">'.$row['idUsuarios'].'</th>
                                                <td>'.$row['userUsuario'].'</td>
                                                <td>'.$row['NombreUsuario'].'</td>
                                                <td>'.$row['ApellidoUsuario'].'</td>
                                                <td>'.$row['emailUsuario'].'</td>
                                                <td>'.$row['telefonoUsuario'].'</td>
                                                <td>'.$row['ciudadUsuario'].','.$row['codposUsuario'].','.$row['Dirección'].'</td>
                                                <td> <button onclick="edit('.$row['idUsuarios'].')" style="cursor:pointer;"><i class="fa-solid fa-pen"></i></button>  <button onclick="Deleteuser('.$row['idUsuarios'].')"style="cursor:pointer;"><i class="fa-solid fa-trash"></i> </button> </td>
                                            </tr>';
                                            }
                                    //<td>'.$row['tipoUsuario'].'</td>?>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Crear nuevo usuario</button>
                              <!-- The Modal -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Nuevo usuario</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <input type="text" class="form-control" id="codigo" style="display:none;"></input>
                                            <div class="form-group set" style="background-color:white">
                                                <input type="text" placeholder="Nombre de usuario" class="form-control" id="name"></input>
                                            </div>
                                            <div class="form-group set ">
                                                <input type="text" placeholder="Nombre completo del usuario" class="form-control" id="namecom"></input>
                                            </div>
                                            <div class="form-group set ">
                                                <input type="text" placeholder="Apellidos del usuario" class="form-control" id="apellido"></input>
                                            </div>
                                            <div class="form-group set ">
                                                <input type="text" placeholder="Correo electronico" class="form-control" id="email"></input>
                                            </div>
                                            <div class="form-group set ">
                                                <input type="text" placeholder="Contraseña temporal" class="form-control" id="temppaswrd"></input>
                                            </div>
                                            <div class="form-group set">
                                            <select id="tipo" class="custom-select colorselect">
                                                <option selected>Selecciona un tipo de usuario</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Admin">Admin</option>
                                                </select>
                                            </div>

                                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="save_user()">Insertar usuario</button>
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
            function save_user(){
                
                let fd=new FormData();
                fd.append('codigo',document.getElementById('codigo').value);
                fd.append('name',document.getElementById('name').value);
                fd.append('namecom',document.getElementById('namecom').value);
                fd.append('apellido',document.getElementById('apellido').value);
                fd.append('email',document.getElementById('email').value);
                fd.append('temppaswrd',document.getElementById('temppaswrd').value);
                fd.append('tipo',document.getElementById('tipo').value);
                let request=new XMLHttpRequest();
                request.open('POST','api/user-save.php',true);
                request.onload=function(){
                    if(request.readyState==4 && request.status==200){
                        let response=JSON.parse(request.responseText);
                        console.log(response);
                        if(response.state==true){
                            alert("Usuario agregado de forma exitosa");
                            window.location.reload();

                        }else{
                            alert(response.detail);
                        }
                    }
                }
                request.send(fd);

            }

            function Deleteuser(idUsuario){
                console.log(idUsuario);
                $.ajax({
                    url: "api/eliminar_usuario.php",
                    method: "POST",
                    data: { idUsuario: idUsuario },
                    success: function(response) {

                        alert("Usuario eliminado de forma exitosa");
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                    // Manejar errores en la petición AJAX
                    console.error(error);
                    }
                });

            }

        </script>
                    </div>

            <?php
            require_once('../footer.php');
            ?>
    </body>
</html>
