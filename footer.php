<footer>
<div class="container-fluid footerino">
    <div class="row" >
        <div class="col-sm-6" >
            <h3 class="navba"style="color:white">ZebrApp.</h3>
            <div class="infoFoot" style="color:white";>
                <p>664-123-2800</p>
                <p>zebrapp.info@gmail.com</p>   
                <p>Tijuana, B.C, México</p>   
            </div>
        </div>
        <?php if(isset($_SESSION['userUsuario'])){ ?>
        <div class="col-sm-3" >
            <h5 style="color:white">Usuario </h5> 
            <div style="color:white; margin-left:25px" ;>
                <a style="color:white;" href="http://localhost/zebrapp/micuenta.php"><p>Cuenta</p></a>
                <a style="color:white;" href="http://localhost/zebrapp/pedido.php"><p>Pedidos</p></a>
                <a style="color:white;" href="http://localhost/zebrapp/micuenta_historial.php"><p>Historial de pedidos</p></a>
                <a style="color:white;" href="http://localhost/zebrapp/micuenta_ajustes.php"><p>Ajustes</p></a>

            </div>
        </div>
        <?php
        }
        ?>
        <div class="col-sm-3">
            <h5 style="color:white">Catalogo </h5>
            <div style="color:white; margin-left:25px" ;>
                <a style="color:white;" href="http://localhost/zebrapp/tipoProducto.php?p=1"><p>Impresoras</p></a>
                <a style="color:white;" href="http://localhost/zebrapp/tipoProducto.php?p=2"><p>Computadoras</p></a>
                <a style="color:white;" href="http://localhost/zebrapp/tipoProducto.php?p=3"><p>Tabletas</p></a>
                <a style="color:white;" href="http://localhost/zebrapp/tipoProducto.php?p=4"><p>Escaneres</p></a>
                <a style="color:white;" href="http://localhost/zebrapp/tipoProducto.php?p=5"><p>Etiquetas</p></a>
                <a style="color:white;" href="http://localhost/zebrapp/tipoProducto.php?p=6"><p>Software</p></a>
                <a style="color:white;" href="http://localhost/zebrapp/tipoProducto.php?p=7"><p>Cintas</p></a>

            </div>
        </div>


    </div>
    <div class="row" style="background-color:#141414; padding-top:18px; margin-bottom:-18px; ">
        <div class="col-sm-6 text-right ">
            <p style="color:white"> Politicas de privacidad </p>
        </div>
        <div class="col-sm-6 text-right ">
            <p style="color:white">Cophyright © 2023 Todos los derechos reservados.</p>
        </div> 
    </div>
</div>  
</footer>
