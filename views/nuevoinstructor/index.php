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
        <h1 class="center">Registro Instructores</h1>
        <div class="col-sm-6 offset-sm-3">
        <form action="<?php echo constant('URL'); ?>nuevoinstructor/crear" method="POST">
            <div class="form-group">
                <label for="documento">Documento</label>
                <input type="text" class="form-control" name="frm_documento" id="documento">
                <small id="documentoHelp" class="form-text text-muted">Ingrese su Documento</small>
            </div>

            <div class="form-group">
                <label for="inombres">Nombres</label>
                <input type="text" class="form-control" name="frm_inombres" id="inombres">
                <small id="inombresHelp" class="form-text text-muted">Diligencie sus nombres</small>
            </div>
            <div class="form-group">
            <label for="iapellidos">Apellidos</label>
            <input type="text" class="form-control" name="frm_iapellidos" id="iapellidos">
            <small id="inombresHelp" class="form-text text-muted">Diligencie sus apellidos</small>
            </div>
            <div class="form-group">
            <label for="iemail">Email</label>
            <input type="email" class="form-control" name="frm_iemail" id="iemail">
            <small id="inombresHelp" class="form-text text-muted">Ingrese su dirección de correo electrónico</small>
            </div>
            <div class="form-group">
            <label for="whatsapp">Dispone de whatsapp?</label> <br>
            <input type="radio" name="frm_whatsapp" value="Si"> SI<br>
            <input type="radio" name="frm_whatsapp" value="No" checked> NO<br>
            </div>    
            <div class="form-group">
            <label for="itelefono">Teléfono</label>
            <input type="number" class="form-control" name="frm_itelefono" id="itelefono">
            <small id="inombresHelp" class="form-text text-muted">Diligencie número de teléfono</small>
            </div>
            <input type="submit" class="btn btn-primary" value="Crear nuevo instructor" id="btn_crear">
        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
    
</body>
</html>