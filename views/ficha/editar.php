<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Actualizar Ficha</title>
</head>
<body style="background-color:#ffd25b";>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        
        <h1 class="center"><?php echo strtoupper($this->ficha->nroficha); ?></h1>
        <div><?php echo $this->mensaje; ?></div>
        <div class="col-sm-6 offset-sm-3">
            <form action="<?php echo constant('URL'); ?>ficha/editar" method="POST">
            <div class="form-group">
                <label for="nroficha">No. Ficha</label>
                <input style="background: #dddddd; font-size:16px;" type="numb" class="form-control" value="<?php echo $this->ficha->nroficha; ?>" name="nroficha" id="nroficha" readonly>
            </div>
            <div class="form-group">
                <label for="programa">Programa</label>
                <input type="text" class="form-control" value="<?php echo $this->ficha->programa; ?>" name="programa" id="programa">
            </div>
            <div class="form-group">
                <label for="fecha_ingreso">Fecha de Ingreso</label>
                <input type="date" class="form-control" value= "<?php echo $this->ficha->fecha_ingreso; ?>" name="fecha_ingreso" id="fecha_ingreso">
            </div>
            <div class="form-group">
                <label for="fecha_fin_lectiva">Fecha Fin Electiva</label>
                <input type="date" class="form-control" value="<?php echo $this->ficha->fecha_fin_lectiva; ?>" name="fecha_fin_lectiva" id="fecha_fin_lectiva">
            </div>
            <div class="form-group">
                <label for="fecha_fin_practica">Fecha Fin Productiva</label>
                <input type="date" class="form-control" value="<?php echo $this->ficha->fecha_fin_practica; ?>" name="fecha_fin_practica" id="fecha_fin_practica">
            </div>
                <input type="submit" class="btn btn-primary btn-sm btn-block" value="Actualizar Ficha" >
                <input type="button" class="btn btn-danger btn-sm btn-block" onClick='window.location.assign("<?php echo constant('URL'); ?>/ficha")' value="Cancelar">
            </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>