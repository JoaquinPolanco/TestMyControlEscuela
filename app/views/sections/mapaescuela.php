<?php
$id_school = $_GET['id_school'];
$conexion = new mysqli("localhost","school","Prueba17@","school");
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