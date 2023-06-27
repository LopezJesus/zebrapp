<?php
include("../../conexion.php");

$response =new stdClass();

$codigo=$_POST['codigo'];
$name=$_POST['name'];
$namecom=$_POST['namecom'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$temppaswrd=$_POST['temppaswrd'];
$tipo=$_POST['tipo'];



if($name==""){
    $response->state=false;
    $response->detail="Falta el nombre de usuario";
}else{
    if($namecom==""){
        $response->state=false;
        $response->detail="Falta el nombre completo";
    }else{
        
        $sql="INSERT INTO usuariosl (userUsuario,passwordUsuario,NombreUsuario,ApellidoUsuario,emailUsuario,tipoUsuario)
        VALUES ('$name','$temppaswrd','$namecom','$apellido','$email','$tipo')";


        $result=mysqli_query($conexion,$sql);
        $response->state=true;
    }
}
echo json_encode($response);