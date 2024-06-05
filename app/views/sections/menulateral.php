<div class="sidebar">
    <div class="logo">
        <img src="public_html/images/school.jpg" alt="Imagen 1">
    </div>
    <a href="<?php echo URL;?>dashboard">Dashboard</a>
    <a href="<?php echo URL;?>usuarios">Usuarios</a>
    <div class="dropdown">
        <a href="#" class="dropdown-toggle" id="escuelasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Escuelas</a>
        <div class="dropdown-menu" aria-labelledby="escuelasDropdown">
            <a class="dropdown-item" href="<?php echo URL;?>escuela">Escuelas</a>
            <a class="dropdown-item" href="<?php echo URL;?>grado">Grados</a>
            <a class="dropdown-item" href="<?php echo URL;?>seccion">Secciones</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="#" class="dropdown-toggle" id="escuelasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Padres</a>
        <div class="dropdown-menu" aria-labelledby="escuelasDropdown">
            <a class="dropdown-item" href="<?php echo URL;?>padre">Padres</a>
            <a class="dropdown-item" href="<?php echo URL;?>padresalumno">Padres e Alumnos</a>
        </div>
    </div>    
    <a href="<?php echo URL;?>alumno">Alumnos</a>
    <div class="dropdown">
        <a href="#" class="dropdown-toggle" id="escuelasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
        <div class="dropdown-menu" aria-labelledby="escuelasDropdown">
            <a class="dropdown-item" href="<?php echo URL;?>reporteescuela">Reportes de Escuelas</a>
            <a class="dropdown-item" href="<?php echo URL;?>reportepadrealumno">Repórtes de Alumnos</a>
        </div>
    </div>  
    <a href="<?php echo URL;?>login/cerrar" class="logout" tabindex="-1" aria-disabled="true">Cerrar Sesión</a>

</div>
