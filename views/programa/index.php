<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Programas</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Listado de Programas</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th  scope="col">Nro Programa</th>
                    <th  scope="col">Nombre</th>
                    <th  scope="col">Descripcion</th>
                    <th  scope="col">Total Horas</th>
                    <th  scope="col" colspan="2">Acciones</th>
                    
                </tr>
            </thead>

            <tbody id="tbody-programas">
            
        <?php
            include_once 'models/programa.php';
            if(count($this->programas)>0){
                foreach ($this->programas as $row) {
                    $programa = new ProgramaDAO();
                    $programa = $row;
        ?>
                    <tr id="fila-<?php echo $programa->nroprograma; ?>">
                        <td><?php echo $programa->nroprograma; ?></td>
                        <td><?php echo $programa->nombre; ?></td>
                        <td><?php echo $programa->descripcion; ?>
                        <td><?php echo $programa->totalhoras; ?>
                        <td><a href="<?php echo constant('URL') . 'programa/leer/' . $programa->nroprograma; ?>">Actualizar</a></td>
                        <td><button class="bEliminar" data-controlador="programa" data-accion="eliminar" data-id="<?php echo $programa->nroprograma; ?>">Eliminar</button></td> 
                    </tr>
        <?php   
                } 
            }else{
        ?>
            <tr><td colspan="6" class="text-center">NO HAY PROGRAMAS DISPONIBLES</td></tr>
        <?php    
            }
        ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" onClick='window.location.assign("<?php echo constant('URL'); ?>/programa/crear")'>Crear Programa</button>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>