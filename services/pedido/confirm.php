<?php
    session_start();
    $response= new stdClass();

        include_once('../conexionbd.php');
        $idUsuarios=$_SESSION['idUsuarios'];
        $dirusu=$_POST['dirusu'];
        $telusu=$_POST['telusu'];

        $sql="UPDATE pedidos SET dirPedido='$dirusu', telPedido='$telusu',estado=2 where estado=1";
        $result=mysqli_query($con,$sql);
        if($result){
            $response->state=true;
            $response->detail="Producto agregado";
        }else{
            $response->state=false;
            $response->detail="No se pudo actualizar el pedido, intentalo más tarde";

        }
        mysqli_close($con);
    

    header('Content-Type: application/json');
    echo json_encode($response);

?>