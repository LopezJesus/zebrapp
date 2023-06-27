<?php
include("../../conexion.php");

$response =new stdClass();

$idUsuario = $_POST['idUsuario'];
$sql = "DELETE FROM usuariosl WHERE idUsuarios = $idUsuario";

$result=mysqli_query($conexion,$sql);
if($result==true){
    $response->state=true;
}else{
    $response->state=false;

}
echo json_encode($response);