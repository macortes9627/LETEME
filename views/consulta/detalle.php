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

    <div id="main" class="container">
        
        <h1 class="center"><?php echo strtoupper($this->alumno->dao_nombres)." ".strtoupper($this->alumno->dao_apellidos); ?></h1>
        <div><?php echo $this->mensaje; ?></div>
        <form action="<?php echo constant('URL'); ?>consulta/actualizarAlumno/" method="POST">
        <label for="identificacion">Identificación</label><br>
            <input style="background: #dddddd; font-size:16px;" type="text" value="<?php echo $this->alumno->dao_identificacion; ?>" name="frm_identificacion" id="identificacion" readonly><br>
            <label for="nombres">Nombres</label><br>
            <input type="text" value="<?php echo $this->alumno->dao_nombres; ?>" name="frm_nombres" id="nombres"><br>
            <label for="apellidos">Apellidos</label><br>
            <input type="text"  value="<?php echo $this->alumno->dao_apellidos; ?>" name="frm_apellidos" id="apellidos"><br>
            <label for="telefono">Teléfono</label><br>
            <input type="number" value="<?php echo $this->alumno->dao_telefono; ?>" name="frm_telefono" id="telefono"><br>
            <label for="email">Email</label><br>
            <input type="email" value="<?php echo $this->alumno->dao_email; ?>" name="frm_email" id="email"><br><br>
            <input type="submit" value="Actualizar Alumno" >
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>