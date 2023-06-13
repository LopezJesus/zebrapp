<?php
include('../conexionbd.php');
$response= new stdClass();

$datos=[];
$i=0;
$text=$_POST['text'];
$sql="select * from producto where estado=1 and nomProducto LIKE '%$text%'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
    $obj=new stdClass();
    $obj->idProducto=$row['idProducto'];
    $obj->nomProducto=$row['nomProducto'];
    $obj->desProducto=$row['desProducto'];
    $obj->preProducto=$row['preProducto'];
    $obj->imgProducto=$row['imgProducto'];

    $datos[$i]=$obj;
    $i++;
}

$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);
?>