<?php
    include('conexionbd.php');
    $userUsuario=$_POST['userUsuario'];

    $sql="SELECT * FROM usuariosl WHERE userUsuario='$userUsuario'";

    $result=mysqli_query($con,$sql);
    if($result){
        $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        if($count!=0){
            $passwordUsuario=$_POST['passwordUsuario'];
            if($row['passwordUsuario']!=$passwordUsuario){
                //error 3. mala contraseña
                header('Location: ../index.php?e=3');
            }else{
                session_start();
                $_SESSION['idUsuarios']=$row['idUsuarios'];
                $_SESSION['userUsuario']=$row['userUsuario'];
                $_SESSION['passwordUsuario']=$row['passwordUsuario'];
                header('Location: ../index.php');
            }
        }else{
            //error 2. user no existe 
            header('Location: ../index.php?e=2');

        }
    }else{
        //error 1. Conexion
        header('Location: ../index.php?e=1');
    }
?>