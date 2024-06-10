
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "app/views/sections/css.php"; ?>
    <?php include_once "app/views/sections/mapaescuela.php"; ?>
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/menulateral.css">
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/menuprincipal.css">
    <link rel="shortcut icon" href="<?php echo URL;?>public_html/images/school.jpg" type="image/x-icon">
    <title>Escuela-alumnos</title>
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
        <div>
            <h4 class="welcomestext text-end">Bienvenido/a: <?php echo $_SESSION["nuser"]; ?> </h4>
        </div>
    <section id="contenido">
        <img src="<?php echo $url_imagen; ?>" class="img-fluid" alt="Imagen de la Escuela" width="300" style="display: block; margin: 0 auto;" >
    </section>
    <div>
        <p>El marcador de la escuela es <span style="color: blue;">azul</span>.</p>
        <p>Los marcadores de los alumnos son <span style="color: red;">rojos</span>.</p>
    </div>
        <br>
    <section id="mapa">
        <div id="map" style="height: 400px; max-width: 800px; margin: 0 auto;"></div>
    </section>
        <section id="pie">
            <?php include_once "app/views/sections/footer.php"; ?>
        </section>
    </div>
    <?php include_once "app/views/sections/scripts.php"; ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPKvPHu2qiRwMbrwzolMEjzLP7RIRnU0I&callback=initMap" async defer></script>
</body>
</html>
