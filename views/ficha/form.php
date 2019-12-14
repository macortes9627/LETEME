<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Crear Ficha</title>
</head>
<body style="background-color:#ffd25b";>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Nueva Ficha</h1>
        <div class="col-sm-6 offset-sm-3">
        <form action="<?php echo constant('URL'); ?>ficha/crear" method="POST">

        <div class="form-group">
                <label for="nroficha">No. de Ficha</label>
                <input type="numb" class="form-control" name="nroficha" id="nroficha" required>
                <small id="nrofichaHelp" class="form-text text-muted">Diligencie el No. de la ficha</small>
            </div>
            <div class="form-group">
                <label for="programa">Programa</label>
                <input type="text" class="form-control" name="programa" id="programa">
                <small id="programaHelp" class="form-text text-muted">Diligencie el nombre del Programa</small>
            </div>
            <div class="form-group">
            <label for="fecha_ingreso">Fecha de Ingreso</label>
            <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso">
            <small id="fecha_ingresoHelp" class="form-text text-muted">Ingrese la fecha de Ingreso</small>
            </div>
            <div class="form-group">
            <label for="fecha_fin_lectiva">Fecha de Finalizacion Etapa Electiva</label>
            <input type="date" class="form-control" name="fecha_fin_lectiva" id="fecha_fin_lectiva">
            <small id="fecha_fin_lectivaHelp" class="form-text text-muted">Ingrese la fecha de finalizacion</small>
            </div>
        	<div class="form-group">
            <label for="fecha_fin_practica">Fecha de Finalizacion Etapa Productiva</label>
            <input type="date" class="form-control" name="fecha_fin_practica" id="fecha_fin_practica">
            <small id="fecha_fin_practicaHelp" class="form-text text-muted">Ingrese la fecha de finalizacion</small>
            </div>
            <input type="submit" class="btn btn-primary" value="Crear Ficha">
        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>