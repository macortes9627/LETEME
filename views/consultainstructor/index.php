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
        <h1 class="center">Consulta Instructor</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th  scope="col">Documento</th>
                    <th  scope="col">Nombres</th>
                    <th  scope="col">Apellidos</th>
                    <th  scope="col">Email</th>
                    <th  scope="col">Whatsapp</th>
                    <th  scope="col">Telefono</th>
                    <th  scope="col" colspan="2">Acciones</th>     
                </tr>
            </thead>

            <tbody id="tbody-instructor">
            
        <?php
            include_once 'models/instructor.php';
            foreach ($this->instructor as $row) {
                $instructor = new Instructor();
                $instructor = $row;
        ?>
                <tr id="fila-<?php echo $instructor->dao_documento; ?>">
                    <td><?php echo $instructor->dao_documento; ?></td>
                    <td><?php echo $instructor->dao_inombres; ?></td>
                    <td><?php echo $instructor->dao_iapellidos; ?></td>
                    <td><?php echo $instructor->dao_iemail; ?></td>
                    <td><?php echo $instructor->dao_whatsapp; ?></td>
                    <td><?php echo $instructor->dao_itelefono; ?></td>
                    <td><a href="<?php echo constant('URL') . 'consultainstructor/verInstructor/' . $instructor->dao_documento; ?>">Actualizar</a></td>
                    <td><button class="bEliminar" data-controlador="consultainstructor" data-accion="eliminarInstructor" data-id="<?php echo $instructor->dao_documento; ?>">Eliminar</button></td> 
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>