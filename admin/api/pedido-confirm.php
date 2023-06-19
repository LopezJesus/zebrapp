<?php
include("../../conexion.php");

$response =new stdClass();

$idPedido=$_POST['idPedido'];
$sql="UPDATE pedidos set estado=3
where idPedido=$idPedido";

$result=mysqli_query($conexion,$sql);
if($result==true){
    $response->state=true;
}else{
    $response->state=false;
    $response->detail="No se actualizó el estado";

}
echo json_encode($response);