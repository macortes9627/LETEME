<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha</title>
</head>
<body style="background-color:#ffd25b";>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Listado de Fichas</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th  scope="col">No ficha</th>
                    <th  scope="col">Programa</th>
                    <th  scope="col" >Fecha de Ingreso</th>
                    <th  scope="col" >Fecha Fin Lectiva</th>
                    <th  scope="col" >Fecha Fin Practica</th>
                    <th  scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody id="tbody-data">
            
        <?php
            include_once 'models/ficha.php';
            if(count($this->fichas)>0){
                foreach ($this->fichas as $row) {
                    $ficha = new FichaDAO();
                    $ficha = $row;
        ?>
                    <tr id="fila-<?php echo $ficha->nroficha; ?>">
                        <td><?php echo $ficha->nroficha; ?>
                        <td><?php echo $ficha->programa; ?>
                        <td><?php echo $ficha->fecha_ingreso; ?>
                        <td><?php echo $ficha->fecha_fin_lectiva; ?>
                        <td><?php echo $ficha->fecha_fin_practica; ?>
                        <td><a href="<?php echo constant('URL') . 'ficha/leer/'.$ficha->nroficha; ?>">Actualizar</a></td>
                        <td><button class="bEliminar" data-controlador="ficha" data-accion="eliminar" data-id="<?php echo $ficha->nroficha; ?>">Eliminar</button></td> 
                    </tr>
        <?php   
                } 
            }else{
        ?>
            <tr><td colspan="6" class="text-center">NO HAY FICHAS DISPONIBLES</td></tr>
        <?php    
            }
        ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" onClick='window.location.assign("<?php echo constant('URL'); ?>/ficha/crear")'>Crear Nueva Ficha</button>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>