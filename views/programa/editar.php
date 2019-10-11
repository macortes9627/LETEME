<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Editar Programa</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        
        <h1 class="center"><?php echo strtoupper($this->programa->nombre); ?></h1>
        <div><?php echo $this->mensaje; ?></div>
        <div class="col-sm-6 offset-sm-3">
            <form action="<?php echo constant('URL'); ?>programa/editar" method="POST">
            <div class="form-group">
                <label for="nroprograma">Nro Programa</label>
                <input style="background: #dddddd; font-size:16px;" type="text" class="form-control" value="<?php echo $this->programa->nroprograma; ?>" name="nroprograma" id="nroprograma" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" value="<?php echo $this->programa->nombre; ?>" name="nombre" id="nombre">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea cols="80" class="form-control" rows="4" name="descripcion" id="descripcion"><?php echo $this->programa->descripcion; ?></textarea>
            </div>
            <div class="form-group">
                <label for="totalhoras">Total Horas</label>
                <input type="number" class="form-control" value="<?php echo $this->programa->totalhoras; ?>" name="totalhoras" id="totalhoras">
            </div>
                <input type="submit" class="btn btn-primary btn-sm btn-block" value="Actualizar Programa" >
                <input type="button" class="btn btn-danger btn-sm btn-block" onClick='window.location.assign("<?php echo constant('URL'); ?>/programa")' value="Cancelar">
            </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>