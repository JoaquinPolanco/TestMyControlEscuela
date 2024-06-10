<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "app/views/sections/css.php"; ?>
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/menulateral.css">
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/menuprincipal.css">
    <link rel="shortcut icon" href="<?php echo URL;?>public_html/images/school.jpg" type="image/x-icon">
    <title>Dashboard</title>
</head>
<body>
    <section id="menu">
        <?php
            if ($_SESSION["tipo"]=="Administrador") {
                include_once "app/views/sections/menulateral.php";
            } else {
                include_once "app/views/sections/menulateraluser.php";
            } 
        ?>
    </section>
    <div class="content">
        
    <section id="contenido">
        <div>
            <h4 class="welcomestext text-end">Bienvenido/a: <?php echo $_SESSION["nuser"]; ?> </h4>
        </div>
        <div class="cards-list">
            <a href="<?php echo URL;?>escuela" class="card">
                <div class="card_image">
                    <img src="public_html/images/escuela.jpg" />
                </div>
                <div class="card_content">
                    <div class="card_title title-black">
                        <p>Escuela</p>
                    </div>
                </div>
            </a>
            </div>    
        </section>
 
        <section id="pie">
            <?php include_once "app/views/sections/footer.php"; ?>
        </section>
    </div>
    <?php include_once "app/views/sections/scripts.php"; ?>
   
</body>
</html>

      
