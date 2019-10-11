<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Sección de Nuevo</h1>
        <div class="col-sm-6 offset-sm-3">
        <form action="<?php echo constant('URL'); ?>nuevo/crear" method="POST">
            <div class="form-group">
                <label for="identificacion">Identificación</label>
                <input type="text" class="form-control" name="frm_identificacion" id="identificacion">
                <small id="identificacionHelp" class="form-text text-muted">Ingrese su número de identificación</small>
            </div>

            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" class="form-control" name="frm_nombres" id="nombres">
                <small id="nombresHelp" class="form-text text-muted">Diligencie sus nombres</small>
            </div>
            <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" name="frm_apellidos" id="apellidos">
            <small id="nombresHelp" class="form-text text-muted">Diligencie sus apellidos</small>
            </div>
        	<div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="number" class="form-control" name="frm_telefono" id="telefono">
            <small id="nombresHelp" class="form-text text-muted">Diligencie número de teléfono</small>
            </div>
            <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="frm_email" id="email">
            <small id="nombresHelp" class="form-text text-muted">Ingrese su dirección de correo electrónico</small>
            </div>

            <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" class="form-control" name="frm_contrasena" id="constrasena" required>
            <small id="nombresHelp" class="form-text text-muted">Ingrese su contraseña</small>
            </div>
            <div class="form-group">
            
            <label for="con_contrasena">Confirme Contraseña</label>
            <input type="password" class="form-control" name="frm_con-contrasena" id="con_constrasena" required onblur="validatePassword()">
            <small id="con_constrasenaHelp" class="form-text text-muted">Confirme su contraseña</small>
            </div>
            <input type="submit" class="btn btn-primary" value="Crear nuevo alumno" id="btn_crear">
        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
    
</body>
</html>