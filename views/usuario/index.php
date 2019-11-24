<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>

    <?php require 'views/header.php'; ?>
    
</head>
<body>


    <main id="container" class="container">
    <br>
        <div class="row">
        
            <div class="col-4"><h1 class="center">Usuarios </h1>
            
            <form action="<?php echo constant('URL'); ?>usuario/crear" method="POST">
                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>
                                <input type="text" class="form-control" name="frm_username" id="username">
                                <small id="usernameHelp" class="form-text text-muted">Ingrese nombre de usuario</small>

                            <label for="email">Correo Electronico</label>
                                <input type="email" class="form-control" name="frm_email" id="email">
                                <small id="emailHelp" class="form-text text-muted">Ingrese su correo electronico</small>
                            </div>
                            <div class="form-group">
                                <label for="passwordd">Contraseña</label>
                                <input type="text" class="form-control" name="frm_passwordd" id="passwordd">
                                <small id="passworddHelp" class="form-text text-muted">Dijite la contraseña</small>

                                <label for="create_time">Fecha de creacion </label>
                                <input type="date" class="form-control" name="frm_create_time" id="create_time">
                                <small id="create_timeHelp" class="form-text text-muted">Dijite la fecha de creacion</small>
                                
                            <input type="submit" class="btn btn-primary" value="Crear Usuario" id="btn_crear">
                        </form>
                    <span><?php echo $this->mensaje; ?></span>
            </div>
        </div>
        <div class="row">
        <div class="col-6" ><!-- Consulta -->
        
                <table id="tabla" class="table table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th  scope="col">Nombre de usuario</th>
                        <th  scope="col">Correo electronico</th>
                        <th  scope="col">Contraseña </th>
                        <th  scope="col">Fecha de creacion</th>
                        <th  scope="col" colspan="2" class="center">Acciones</th>
                        
                    </tr>
                </thead>

                <tbody id="tbody-instructor">
                
                    <?php
                        include_once 'models/usuario.php';
                        foreach ($this->usuario as $row) {
                            $usuario = new UsuarioDAO ();
                            $usuario = $row;
                    ?>
                            <tr id="fila-<?php echo $usuario->username; ?>">
                            <td><?php echo $usuario->username; ?></td>
                            <td><?php echo $usuario->email; ?></td>
                            <td><?php echo $usuario->passwordd; ?></td>
                            <td><?php echo $usuario->create_time; ?></td>
                                
                            <td><a href="<?php echo constant('URL') . 'usuario/leer/' . $usuario->username; ?>">Actualizar</a></td>
                            <td><button class="bEliminar" data-controlador="usuario" data-accion="eliminar" data-id="<?php echo $usuario->username; ?>">Eliminar</button></td>
                                
                            </tr>
                    <?php } ?>
                        </tbody>
                    </table>
            </div>
            </div>
        </div>
        </div>
        <?php require 'views/footer.php'; ?>
        <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
    </main>
</body>
</html>