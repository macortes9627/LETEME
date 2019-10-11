<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Crear Programa</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Nuevo Programa</h1>
        <div class="col-sm-6 offset-sm-3">
        <form action="<?php echo constant('URL'); ?>programa/crear" method="POST">
            <!-- <div class="form-group">
                <label for="nroprograma">Nro Programa</label>
                <input type="text" class="form-control" name="nroprograma" id="nroprograma">
                <small id="nroprogramaHelp" class="form-text text-muted">Ingrese el número del programa</small>
            </div> -->

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
                <small id="nombreHelp" class="form-text text-muted">Diligencie el nombre del programa</small>
            </div>
            <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea rows="4" cols="80" class="form-control" name="descripcion" id="descripcion">
            
            </textarea>
            <!-- <input type="text" class="form-control" name="descripcion" id="descripcion"> -->
            <small id="descripcionHelp" class="form-text text-muted">Ingrese la descripción del programa</small>
            </div>
        	<div class="form-group">
            <label for="totalhoras">Horas</label>
            <input type="number" class="form-control" name="totalhoras" id="totalhoras">
            <small id="totalhorasHelp" class="form-text text-muted">Ingrese el total de horas del programa</small>
            </div>
            <input type="submit" class="btn btn-primary" value="Crear programa">
        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>