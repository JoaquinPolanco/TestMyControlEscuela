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
    <title>Padres</title>
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
            <div >
                <h4 class="welcomestext text-end">Bienvenido/a: <?php echo $_SESSION["nuser"]; ?> </h4>
            </div>
            <div id="contentList" class="mt-3">
                <h4>
                    <i class="bi bi-journal"></i>
                    Padres
                    <button type="button" class="btn btn-dark btncolor float-end" id="btnAgregar">
                        <i class="bi bi-plus-circle"></i>
                        Agregar padres
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
                                <th>ID padre</th>
                                <th>Nombres</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                <td>1</td>
                                <td>Diana Iveth</td>
                                <td>Chalchuapa - Santa Ana</td>
                                <td>6024-8768</td>
                                <td>
                                    <button type="button" class="bbtn btn-dark btncolor"><i class="bi bi-pencil-square"></i></button>
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
                <i class="bi bi-journal"></i>
                    Padre
                </h4>
                <hr>
                <form id="formPadre" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                            <input type="hidden" name="id_padre" id="id_padre" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="direccion" class="col-sm-2 col-form-label">Dirección:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                    </div>
                   
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
    <script src="<?php echo URL;?>public_html/customjs/padre.js"></script>
</body>
</html>

       