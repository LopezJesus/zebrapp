
<header>
<nav class="navbar navbar-expand-xl headerino navbar-dark sticky-top ">
    <ul class="navbar-nav mr-auto ">
        <!-- Logotipo -->
        <li class="nav-item">
            <a class="navbar-brand navba" href="index.php">ZebrApp.</a>
        </li>
        <!-- Catalogo -->                   
        <li class="nav-item " style="padding-top:10px;">
            <a href="tienda.php"><button class="btn buttonColor" type="submit"></i>Ver catalogo</button></a>
        </li>
    </ul>
    <ul class="navbar-nav justify-content-end">
        <!-- Buscador -->
        <li class="nav-item">
            <a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar..."value ="<?php if(isset($_GET['text'])){echo $_GET['text'];}else{echo '';}?>" id="idbusqueda">
                            <div class="input-group-prepend">
                                <button class="btn buttonColor" type="submit" onclick="search_producto()"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                    </div>    
            </a>
        </li>
        <?php if(isset($_SESSION['userUsuario'])){ ?>
            <li class="nav-item">
            <a class="nav-link" href="micuenta.php"><i class="fa-solid fa-user item-option"></i></a>
        </li>
    
        <li class="nav-item">
            <a class="nav-link" href="carrito.php"><i class="fa-solid fa-cart-shopping item-option"></i></a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fa-solid fa-right-to-bracket item-option"></i></a>
        </li>
        <?php }else{?>
            <li class="nav-item">
            <a class="nav-link" href="loginuser.php"><i class="fa-solid fa-user item-option"></i></a>
        </li>
        <?php }?>
    </ul>
</nav>
<script type="text/javascript" src="js/mainscript.js"></script>

</header>