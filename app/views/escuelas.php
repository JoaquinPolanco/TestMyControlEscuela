<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "app/views/sections/css.php"; ?>
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/menulateral.css">
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/menuprincipal.css">
    <link rel="shortcut icon" href="<?php echo URL;?>public_html/images/school.jpg" type="image/x-icon">
    <title>Escuelas</title>
</head>
<body>
    <section id="menu">
        <?php
            if ($_SESSION["usuario"]=="admin") {
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
            <div id="contentList" class="mt-3">
                <h4>
                   <i class="bi bi-pencil-fill"></i>
                    Escuelas
                    <button type="button" class="btn btn-dark btncolor float-end" id="btnAgregar">
                        <i class="bi bi-plus-circle"></i>
                        Agregar escuelas
                    </button>
                </h4>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control"  aria-describedby="basic-addon2" id="txtSearch">
                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
                        </div>
                    </div>
                </div>
                    <div id="contentTable">
                        <table class="table">
                            <thead class="table-dark">
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>direccion</th>
                                <th>email</th>
                                <th>latitud</th>
                                <th>longitud</th>
                                <th>Fecha</th>
                                <th>usuario</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                <td>1</td>
                                <td>Tinte KUUL</td>
                                <td>El salvador-santa ana</td>
                                <td>amigosdeisrael@gmail.com</td>
                                <td>40º 42' 46'</td>
                                <td>74º 0' 21''</td>
                                <td>Administrador</td>
                                <td>
                                    <button type="button" class="btn btn-dark btncolor"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger btncolor"><i class="bi bi-trash"></i></button>
                                </td>
                            </tbody>
                        </table>
                    </div>
                <div class="row">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div id="contentForm" class="mt-3 d-none">
                <h4>
                <i class="bi bi-cart-fill"></i>
                    Escuelas
                </h4>
                <hr>
                <form id="formEscuela" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="foto" class="col-sm-2 col-form-label">Foto:</label>
                        <div class="col-sm-10">
                            <div class="img-thumbnail" id="divfoto" style="width:200px; height:200px">

                            </div>
                            <span>
                                Haga click para seleccionar la foto.
                            </span>
                            <input type="file" name="foto" id="foto" class="d-none">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nombre" class="col-sm-2 col-form-label">Escuela:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                            <input type="hidden" name="id_school" id="id_school" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="direccion" class="col-sm-2 col-form-label">direccion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">email:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_usr" class="col-sm-2 col-form-label">usuario:</label>
                        <div class="col-sm-10">
                            <select name="id_usr" id="id_usr" class="form-select">
                            </select>
                        </div>
                    </div> 
                    <div class="row mb-3">
                        <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                    </div>          
                    <div class="row mb-3">
                        <label for="latitud" class="col-sm-2 col-form-label">latitud:</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="latitud" name="latitud" required>
                        </div>
                    </div> 
                    <div class="row mb-3">
                        <label for="longitud" class="col-sm-2 col-form-label">longitud:</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="longitud" name="longitud" required>
                        </div>
                    </div> 
                    <div id="map" style="height: 400px; max-width: 600px; margin: 0 auto;"></div>
                    <br>
                    <button type="button" class="btn btn-secondary" id="btnCancelar"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-hdd"></i> Guardar</button>
                </form>
            </div>
        </section>
        <section id="pie">
            <?php include_once "app/views/sections/footer.php"; ?>
        </section>
    </div>
    <?php include_once "app/views/sections/scripts.php"; ?>
    <script src="<?php echo URL;?>public_html/customjs/escuela.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPKvPHu2qiRwMbrwzolMEjzLP7RIRnU0I&callback=initMap" async defer></script>
    <script>
        var mapa;
        var marcador;

        function initMap() {
            mapa = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 0, lng: 0 },
                zoom: 8
            });

            // Agregar un marcador al hacer clic en el mapa
            marcador = new google.maps.Marker({
                position: { lat: 0, lng: 0 },
                map: mapa,
                draggable: true
            });

            // Actualizar la posición del marcador cuando se arrastra
            marcador.addListener('dragend', function (event) {
                actualizarPosicion(event.latLng.lat(), event.latLng.lng());
            });
        }

        function actualizarPosicion(latitud, longitud) {
            document.getElementById('latitud').value = latitud;
            document.getElementById('longitud').value = longitud;
        }

        function guardarCoordenadas() {
            var latitud = marcador.getPosition().lat();
            var longitud = marcador.getPosition().lng();
            // Aquí puedes hacer lo que quieras con las coordenadas, como enviarlas a tu servidor
            console.log("Latitud:", latitud);
            console.log("Longitud:", longitud);
        }

    </script>
</body>
</html>