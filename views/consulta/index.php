<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Consulta Aprendiz</title>
</head>
<body style="background-color:#ffd25b">

    <?php require 'views/header.php'; ?>


    <div id="main" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Sección de consulta</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th  scope="col">Tipo_documento</th>
                    <th  scope="col">Documento</th>
                    <th  scope="col">Nro.Ficha</th>
                    <th  scope="col">Nombres</th>
                    <th  scope="col">Apellidos</th>
                    <th  scope="col">Email</th>
                    <!-- <th  scope="col">Fecha_exp_documento</th>
                    <th  scope="col">Lugar_exp_documento</th>
                    <th  scope="col">Fecha_nacimiento</th>
                    <th  scope="col">Lugar_nacimiento</th>
                    <th  scope="col">Direccion</th> -->
                    <th  scope="col">Celular</th>
                    <th  scope="col">Whatsapp</th>
                    <!-- <th  scope="col">Eps</th>
                    <th  scope="col">Rh</th>
                    <th  scope="col">Acudiente</th>
                    <th  scope="col">Celular_acudiente</th> -->
                    <!-- <th  scope="col">Estilos_aprendizaje</th> -->
                    <th  scope="col" colspan="2">Acciones</th>
                    
                </tr>
            </thead>

            <tbody id="tbody-data">
            
        <?php
            include_once 'models/aprendiz.php';
            foreach ($this->aprendiz as $row) {
                $aprendiz = new Aprendiz();
                $aprendiz = $row;
        ?>
                <tr id="fila-<?php echo $aprendiz->dao_documento; ?>">
                    <td><?php echo $aprendiz->dao_tipo_documento_id; ?></td>
                    <td><?php echo $aprendiz->dao_documento; ?></td>
                    <td><?php echo $aprendiz->get_numero_ficha(); ?></td>
                    <td><?php echo $aprendiz->dao_nombres; ?></td>
                    <td><?php echo $aprendiz->dao_apellidos; ?>
                    <td><?php echo $aprendiz->dao_email; ?></td>
                    <!-- <td><?php echo $aprendiz->dao_fecha_exp_documento; ?></td>
                    <td><?php echo $aprendiz->dao_lugar_exp_documento; ?></td>
                    <td><?php echo $aprendiz->dao_fecha_nacimiento; ?></td>
                    <td><?php echo $aprendiz->dao_lugar_nacimiento; ?></td>
                    <td><?php echo $aprendiz->dao_direccion; ?></td> -->
                    <td><?php echo $aprendiz->dao_celular; ?></td>
                    <td><?php echo ($aprendiz->dao_whatsapp == 0 ? 'No' : 'Sí'); ?></td>
                    <!-- <td><?php echo $aprendiz->dao_eps; ?></td>
                    <td><?php echo $aprendiz->dao_rh; ?></td>
                    <td><?php echo $aprendiz->dao_acudiente; ?></td>
                    <td><?php echo $aprendiz->dao_celular_acudiente; ?></td> -->
                    <!-- <td><?php echo $aprendiz->dao_estilos_aprendizaje; ?></td> -->

                    <td><a href="<?php echo constant('URL') . 'consulta/verAprendiz/' . $aprendiz->dao_documento; ?>">Actualizar</a></td>
                    <td><button class="bEliminar" data-controlador="consulta" data-accion="eliminar" data-id="<?php echo $aprendiz->dao_documento; ?>">Eliminar</button></td> 
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>