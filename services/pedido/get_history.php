<?php
include('../conexionbd.php');
$response= new stdClass();
$userId=$_POST['userId'];
function textoestado($estado){
    switch($estado){
        case '1':
            return 'Por procesar';
            break;
        case '2':
            return 'Por pagar';
            break;

        case '3':
            return 'Pagado';
        default:
            break;
    }
}
$datos=[];
$i=0;

$sql="select *,ped.estado estadoped from pedidos ped 
inner join producto pro on ped.idProducto=pro.idProducto 
where ped.estado =3 and idUsuario=$userId";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
    $obj=new stdClass();
    $obj->idPedido=$row['idPedido'];
    $obj->idProducto=$row['idProducto'];
    $obj->idUsuario=$row['idUsuario'];

    $obj->nomProducto=utf8_encode($row['nomProducto']);
    $obj->FechaPedido=$row['FechaPedido'];
    $obj->dirPedido=utf8_encode($row['dirPedido']);
    $obj->telPedido=$row['telPedido'];
    $obj->imgProducto=$row['imgProducto'];
    $obj->preProducto=$row['preProducto'];
    $obj->estado=textoestado($row['estadoped']);
    $datos[$i]=$obj;
    
    $i++;
}

$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);
?>  