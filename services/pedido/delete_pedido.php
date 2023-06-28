<?php
        include_once('../conexionbd.php');

    $response= new stdClass();        
    $idPedido=$_POST['idPedido'];
    $sql="DELETE FROM pedidos WHERE idPedido=$idPedido";
    $result=mysqli_query($con,$sql);
if ($result){
    $response->state=true;
}else{
    $response->state=true;
    $response->detail="No se pudo eliminar el pedido";

}
mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);