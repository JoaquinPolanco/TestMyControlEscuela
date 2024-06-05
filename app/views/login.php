<!DOCTYPE html>
<html class=''>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo URL;?>public_html/css/login.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="shortcut icon" href="<?php echo URL;?>public_html/images/school.jpg" type="image/x-icon">
<title>Sistema de escuelas</title>
</head>
<body>
<div class="wrapper1">
    <div class="container1">
        <h1>Sistema de Escuelas</h1>
        <form action="login.php" id="formlogin">
            <input type="text" class="form-control" id="floatingInput" placeholder="Usuario" name="usuario">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" name="password">

                <div class="alert alert-danger mt-5 d-none" role="alert" id="mensaje">
                    Feliz Dia, Sonrie es gratis :D
                </div>
            <button class="btn btn-success" type="submit">Iniciar Sesión</button> 
        </form>
        <p class="text-muted text-center mt-5">
            Copyright &copy; 2024
        </p>
    </div>
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<script src="<?php echo URL; ?>public_html/customjs/api.js"></script>
<script src="<?php echo URL; ?>public_html/customjs/login.js"></script>
</body>
</html>

