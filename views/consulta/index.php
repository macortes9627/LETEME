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
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Sección de consulta</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th  scope="col">Identificación</th>
                    <th  scope="col">Nombres</th>
                    <th  scope="col">Apellidos</th>
                    <th  scope="col">Teléfono</th>
                    <th  scope="col">Email</th>
                    <th  scope="col" colspan="2">Acciones</th>
                    
                </tr>
            </thead>

            <tbody id="tbody-alumnos">
            
        <?php
            include_once 'models/alumno.php';
            foreach ($this->alumnos as $row) {
                $alumno = new Alumno();
                $alumno = $row;
        ?>
                <tr id="fila-<?php echo $alumno->dao_identificacion; ?>">
                    <td><?php echo $alumno->dao_identificacion; ?></td>
                    <td><?php echo $alumno->dao_nombres; ?></td>
                    <td><?php echo $alumno->dao_apellidos; ?>
                    <td><?php echo $alumno->dao_telefono; ?>
                    <td><?php echo $alumno->dao_email; ?></td>
                    <td><a href="<?php echo constant('URL') . 'consulta/verAlumno/' . $alumno->dao_identificacion; ?>">Actualizar</a></td>
                    <td><button class="bEliminar" data-controlador="consulta" data-accion="eliminarAlumno" data-id="<?php echo $alumno->dao_identificacion; ?>">Eliminar</button></td> 
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>