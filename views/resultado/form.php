<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Crear Resultado</title>
</head>
<body style="background-color:#ffd25b";>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Nuevo Resultado</h1>
        <div class="col-sm-6 offset-sm-3">
        <form action="<?php echo constant('URL'); ?>resultado/crear" method="POST">

        <div class="form-group">
                <label for="instructor_documento">Documento de Instructor</label>
                <input type="text" class="form-control" name="instructor_documento" id="instructor_documento"required>
                <small id="instructor_documentodoHelp" class="form-text text-muted">Diligencie el documento del instructor</small>
            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre"required>
                <small id="nombreHelp" class="form-text text-muted">Diligencie el nombre del resultado</small>
            </div>
            <div class="form-group">
            <label for="horas_directas">Horas Directas</label>
            <input type="numb" class="form-control" name="horas_directas" id="horas_directas">
            <small id="horas_directasHelp" class="form-text text-muted">Ingrese las horas directas del resultado</small>
            </div>
            <input type="submit" class="btn btn-primary" value="Crear Resultado">
        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>