<?php
$id_school = $_GET['id_school'];
$conexion = new mysqli("localhost", "school", "Prueba17@", "school");
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}
$sql_escuela = "SELECT 
                    e.foto AS foto_escuela,
                    e.latitud AS latitud_escuela,
                    e.longitud AS longitud_escuela
                FROM 
                    escuelas e
                WHERE
                    e.id_school = $id_school";

$resultado_escuela = $conexion->query($sql_escuela);

if ($resultado_escuela->num_rows > 0) {
    $fila_escuela = $resultado_escuela->fetch_assoc();
    $url_imagen = $fila_escuela['foto_escuela'];
    $latitud_escuela = $fila_escuela['latitud_escuela'];
    $longitud_escuela = $fila_escuela['longitud_escuela'];

    $alumnos = array();
    $sql_alumnos = "SELECT 
                        a.nombre_completo AS nombre_alumno,
                        a.latitud AS latitud_alumno,
                        a.longitud AS longitud_alumno
                    FROM 
                        alumnos a
                    WHERE
                        a.id_school = $id_school";

    $resultado_alumnos = $conexion->query($sql_alumnos);
    while ($fila_alumno = $resultado_alumnos->fetch_assoc()) {
        $alumnos[] = array(
            'nombre' => $fila_alumno['nombre_alumno'],
            'latitud' => $fila_alumno['latitud_alumno'],
            'longitud' => $fila_alumno['longitud_alumno']
        );
    }
} else {
    $url_imagen = 'public_html/images/school.jpg"';
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "app/views/sections/css.php"; ?>
    <link rel="stylesheet" href="<?php echo URL; ?>public_html/css/menulateral.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public_html/css/menuprincipal.css">
    <link rel="shortcut icon" href="<?php echo URL; ?>public_html/images/school.jpg" type="image/x-icon">
    <title>Escuela-alumnos</title>
</head>

<body>
    <section id="menu">
        <?php
        if ($_SESSION["tipo"] == "Administrador") {
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
            <img src="<?php echo $url_imagen; ?>" class="img-fluid" alt="Imagen de la Escuela" width="300" style="display: block; margin: 0 auto;">
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
    <script>
        function initMap() {
            var latitud_escuela = <?php echo $latitud_escuela; ?>;
            var longitud_escuela = <?php echo $longitud_escuela; ?>;

            var schoolLocation = {
                lat: latitud_escuela,
                lng: longitud_escuela
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: schoolLocation
            });

            var marker = new google.maps.Marker({
                position: schoolLocation,
                map: map,
                title: 'Escuela',
                icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
            });
            <?php
            foreach ($alumnos as $alumno) {
            ?>
                var alumnoLocation = {
                    lat: <?php echo $alumno['latitud']; ?>,
                    lng: <?php echo $alumno['longitud']; ?>
                };

                var markerAlumno = new google.maps.Marker({
                    position: alumnoLocation,
                    map: map,
                    title: '<?php echo $alumno['nombre']; ?>',
                    icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
                });
            <?php
            }
            ?>
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPKvPHu2qiRwMbrwzolMEjzLP7RIRnU0I&callback=initMap" async defer></script>
</body>

</html>