<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require 'views/header.php'; ?>
</head>
<body>

<?php require 'views/menu.php'; ?>
<br>
    <main id="container" class="container">
        <div class="row">
        <div class="col-md-6">
            <div class="col-md-12"><h1 class="text-warning">Registro Instructores</h1>
            <form action="<?php echo constant('URL'); ?>instructor/crear" method="POST">
                            <div class="form-group">

                            
                            <label for="documento">Numero Documento</label>
                                <input type="text" class="form-control" name="frm_documento" id="documento">
                                <small id="documentoHelp" class="form-text text-muted">Ingrese la nuemero documento</small>
                            
                            
                            <label for="nombres">Nombres</label>
                                <input type="text" class="form-control" name="frm_nombres" id="nombres">
                                <small id="nombresHelp" class="form-text text-muted">Ingrese los nombres</small>

                            <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" name="frm_apellidos" id="apellidos">
                                <small id="apellidosHelp" class="form-text text-muted">Ingrese los apellidos</small>
                           
                            <label for="email">Email</label>
                                <input type="text" class="form-control" name="frm_email" id="email">
                                <small id="emailHelp" class="form-text text-muted">Ingrese email</small>

                            <label for="celular">Celular</label>
                                <input type="text" class="form-control" name="frm_celular" id="celular">
                                <small id="celularHelp" class="form-text text-muted">Ingrese nuemro celular</small>
                            
                            
                            <label for="whatsapp">Whatsapp</label>
                                <input type="radio" id="whatsapp"name="frm_whatsapp" value="0">
                                <label for="whatsapp">SI</label>
                                <input type="radio" id="whatsapp"name="frm_whatsapp" value="1">
                                <label for="whatsapp">NO</label>
                                <small id="whatsappHelp" class="form-text text-muted"> </small>
                        
                        
                            <input type="submit" class="btn btn-primary" value="Crear Aprendiz" id="btn_crear">
                        </form>
                    <span><?php echo $this->mensaje; ?></span>
            </div>
            </div>
            </div>
        
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-12"><!-- Consulta -->
       
                <table id="tabla" class="table table-secondary" >
                <thead class="thead-dark">
                    <tr>
                        <th  class="text-warning">Documento</th>
                        <th  class="text-warning">Nombres</th>
                        <th  class="text-warning">Apellidos</th>
                        <th  class="text-warning">Email</th>
                        <th  class="text-warning">Celular</th>
                        <th  class="text-warning">Whatsapp</th>
                        <th  class="text-warning" colspan="2">Acciones</th>
                        
                    </tr>
                </thead>

                <tbody id="tbody-dato">
                
                    <?php
                        //include_once 'models/ficha_aprendiz.php';
                        foreach ($this->instruc as $row) {
                            $instruc = new instructor ();
                            $instruc = $row;
                    ?>
                            <tr id="fila-<?php echo $instruc->dao_documento; ?>">
                            
                            <td><?php echo $instruc->dao_documento; ?></td>
                            <td><?php echo $instruc->dao_nombres; ?></td>
                            <td><?php echo $instruc->dao_apellidos; ?></td>
                            <td><?php echo $instruc->dao_email; ?></td>
                            <td><?php echo $instruc->dao_celular; ?></td>
                            <td><?php echo $instruc->dao_whatsapp; ?></td>
                
                                <td><a href="<?php echo constant('URL') . 'instructor/leer.php' . $instruc->dao_documento; ?>">Actualizar</a></td>
                                <td><button class="bEliminar" data-controlador="instructor" data-accion="eliminar" data-id="<?php echo $instruc->dao_documento; ?>">Eliminar</button></td> 
                                
                            </tr>
                    <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
                        </div>
                        </div>
                        </div>
        <?php require 'views/footer.php'; ?>
        <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
    </main>
</body>
</html>