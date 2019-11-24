<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Editar Usuario</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        
        <h1 class="center"><?php echo strtoupper($this->usuario->dao_username); ?></h1>
        <div><?php echo $this->mensaje; ?></div>
        <div class="col-sm-6 offset-sm-3">
            <form action="<?php echo constant('URL'); ?>usuario/editar" method="POST">
            <div class="form-group">
                <label for="username">Nombre de usuario</label>
                <input style="background: #dddddd; font-size:16px;" type="text" class="form-control" value="<?php echo $this->usuario->dao_username; ?>" name="frm_username" id="username" readonly>
            </div>
            <div class="form-group">
                <label for="email">Correo Electronico</label>
                <input type="email" class="form-control" value="<?php echo $this->usuario->dao_email; ?>" name="frm_email" id="email">
            </div>
            <div class="form-group">
                <label for="passwordd">Contraseña</label>
                <input type="text" class="form-control" value="<?php echo $this->usuario->dao_passwordd; ?>" name="frm_passwordd" id="passwordd">
            </div>
            <div class="form-group">
                <label for="create_time">Fecha de creacion</label>
                <input type="date" class="form-control" value="<?php echo $this->usuario->dao_create_time; ?>" name="frm_create_time" id="create_time">
            </div>
                <input type="submit" class="btn btn-primary btn-sm btn-block" value="Actualizar Usuario" >
                <input type="button" class="btn btn-danger btn-sm btn-block" onClick='window.location.assign("<?php echo constant('URL'); ?>/usuario")' value="Cancelar">
            </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>