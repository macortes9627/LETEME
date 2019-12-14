<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Editar resultado</title>
</head>
<body style="background-color:#ffd25b";>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        
        <h1 class="center"><?php echo strtoupper($this->resultado->instructor_documento); ?></h1>
        <div><?php echo $this->mensaje; ?></div>
        <div class="col-sm-6 offset-sm-3">
            <form action="<?php echo constant('URL'); ?>resultado/editar" method="POST">
            <div class="form-group">
                <label for="instructor_documento">No. documento Instructor</label>
                <input style="background: #dddddd; font-size:16px;" type="text" class="form-control" value="<?php echo $this->resultado->instructor_documento; ?>" name="instructor_documento" id="instructor_documento" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre del Resultado</label>
                <input type="text" class="form-control" value="<?php echo $this->resultado->nombre; ?>" name="nombre" id="nombre">
            </div>
            <div class="form-group">
                <label for="horas_directas">Horas Directas</label>
                <input type="numb" class="form-control" value= "<?php echo $this->resultado->horas_directas; ?>" name="horas_directas" id="horas_directas">
            </div>
                <input type="submit" class="btn btn-primary btn-sm btn-block" value="Actualizar Resultado" >
                <input type="button" class="btn btn-danger btn-sm btn-block" onClick='window.location.assign("<?php echo constant('URL'); ?>/resultado")' value="Cancelar">
            </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>