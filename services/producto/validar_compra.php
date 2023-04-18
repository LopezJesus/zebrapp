<?php
    session_start();
    $response= new stdClass();
    if(!isset($_SESSION['idUsuarios'])){
        $response->state=false;
        $response->detail="No estas logeado";
        $response->open_login=true;
    }
    else{
        include_once('../conexionbd.php');
        $idUsuarios=$_SESSION['idUsuarios'];
        $idProducto=$_POST['idProducto'];

        $sql="INSERT INTO pedidos (idUsuario,idProducto,FechaPedido,estado,dirPedido,telPedido) 
        VALUES($idUsuarios,$idProducto,now(),1,'','')";
        $result=mysqli_query($con,$sql);
        if($result){
            $response->state=true;
            $response->detail="Producto agregado";
        }else{
            $response->state=false;
            $response->detail="No se pudo agregar el producto, intentalo más tarde";

        }
        mysqli_close($con);
    }

    header('Content-Type: application/json');
    echo json_encode($response);

?>