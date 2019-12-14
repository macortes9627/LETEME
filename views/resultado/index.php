<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultado</title>
</head>
<body style="background-color:#ffd25b";>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Listado de Resultados</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th  scope="col">Documento Instructor</th>
                    <th  scope="col">Nombre</th>
                    <th  scope="col">Horas_directas</th>
                    <th  scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody id="tbody-data">
            
        <?php
            include_once 'models/resultado.php';
            if(count($this->resultado)>0){
                foreach ($this->resultado as $row) {
                    $resultado = new ResultadoDAO();
                    $resultado = $row;
        ?>
                    <tr id="fila-<?php echo $resultado->instructor_documento; ?>">
                        <td><?php echo $resultado->instructor_documento; ?>
                        <td><?php echo $resultado->nombre; ?>
                        <td><?php echo $resultado->horas_directas; ?>

                        <td><a href="<?php echo constant('URL') . 'resultado/leer/'.$resultado->instructor_documento; ?>">Actualizar</a></td>
                        <td><button class="bEliminar" data-controlador="resultado" data-accion="eliminar" data-id="<?php echo $resultado->instructor_documento; ?>">Eliminar</button></td> 
                    </tr>
        <?php   
                } 
            }else{
        ?>
            <tr><td colspan="6" class="text-center">NO HAY RESULTADOS DISPONIBLES</td></tr>
        <?php    
            }
        ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" onClick='window.location.assign("<?php echo constant('URL'); ?>/resultado/crear")'>Crear Nueva resultado</button>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>