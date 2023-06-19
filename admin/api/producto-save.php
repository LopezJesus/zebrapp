<?php
include("../../conexion.php");

$response =new stdClass();

$codigo=$_POST['codigo'];
$nombre=$_POST['name'];
$descripcion=$_POST['description'];
$precio=$_POST['price'];
$estado=$_POST['estado'];



if($nombre==""){
    $response->state=false;
    $response->detail="Falta el nombre";
}else{
    if($descripcion==""){
        $response->state=false;
        $response->detail="Falta la descripcion";
    }else{
        if(isset($_FILES['imagen'])){
            $nombre_imagen = date("YmdHis").".jpg";  
            $sql="INSERT INTO producto (nomProducto,desProducto,preProducto,estado,imgProducto)
            VALUES ('$nombre','$descripcion',$precio,$estado,'$nombre_imagen')";


            $result=mysqli_query($conexion,$sql);
            if($result){
                if(move_uploaded_file($_FILES['imagen']['tmp_name'],"../../assets/Productos/".$nombre_imagen)){
                    
                    $response->state=true;
                }else{
                    $response->state=false;
                    $response->detail="Error al cargar la imagen";
                }
            }
            else{
                $response->state=false;
                $response->detail="No se pudo guardar el producto";
            }


        }else{
            $response->state=false;
            $response->detail="Falta la imagen";
        }
        
    }

}
echo json_encode($response);