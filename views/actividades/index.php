<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actividades</title>

    <?php require 'views/header.php'; ?>
    
</head>
<body>


    <main id="container" class="container">
    <br>
        <div class="row">
        
            <div class="col-4"><h1 class="center">Actividades</h1>
            
            <form action="<?php echo constant('URL'); ?>usuario/crear" method="POST">
                        <div class="form-group">
                            <label for="id">Id</label>
                            <input type="number" class="form-control" name="id" id="id">
                            <small id="idHelp" class="form-text text-muted">Diligencie el Id</small>
                        </div>
                        <div class="form-group">
                            <label for="numeracion">Numeracion</label>
                            <input type="number" class="form-control" name="numeracion" id="numeracion">
                            <small id="numeracionHelp" class="form-text text-muted">Diligencie la numeracion</small>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                            <small id="nombreHelp" class="form-text text-muted">Diligencie el nombre de la actividad</small>
                        </div>
                        Tipos de evidencia
                         <br>

                        <br><div>
                             <label for="producto">Producto</label>
                             <input type="checkbox" name="producto" id="producto"><br>
                             </div>

                             <div>
                            <label for="desempenyo">Desempeño</label>
                            <input type="checkbox" name="desempenyo" id="desempenyo"><br>
                             </div>

                             <div>
                             <label for="conocimiento">Conocimiento</label>
                              <input type="checkbox" name="conocimiento" id="conocimiento"><br>
                              </div><br>

                        <div class="form-group">
                            <label for="fecha_inicio">Fecha inicio de la actividad</label>
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                            <small id="fecha_inicioHelp" class="form-text text-muted">Introdusca la fecha de inicio de la actividad</small>
                        </div>
                        <div class="form-group">
                            <label for="fecha_fin">Fecha fin de la actividad</label>
                            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                            <small id="fecha_finHelp" class="form-text text-muted">Introdusca la fecha del fin de la actividad</small>
                        </div>
                        <div class="form-group">
                            <label for="fecha_concertada">Nombre</label>
                            <input type="date" class="form-control" name="fecha_concertada" id="fecha_concertada">
                            <small id="fecha_concertadaHelp" class="form-text text-muted">Introdusca la fecha concertada</small>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                            <small id="nombreHelp" class="form-text text-muted">Diligencie el nombre del programa</small>
                        </div>
                        <div class="form-group">
                            <label for="resultado_aprendizaje_id">Resultado aprendizaje id</label>
                            <select class="custom-select" id="resultado_aprendizaje_id" name="resultado_aprendizaje_id">
                                <option selected value="">Seleccione...</option>
                            <?php
                        include_once 'models/resultadoaprendizaje.php';
                        if(count($this->ddl_resultadoaprendizajes)>0){
                        foreach ($this->ddl_resultadoaprendizajes as $resultadoaprendizajes) {
                            $ddl_resultadoaprendizaje = new ResultadoaprendizajeDAO ();
                            $ddl_resultadoaprendizaje = $resultadoaprendizajes;
                          ?>  
                            <option selected value="<?php echo $ddl_resultadoaprendizaje->id; ?>"><?php echo $ddl_resultadoaprendizaje->nombre; ?></option>
                            <?php
                              } 
                            }
                            ?>
                            </select>
                        </div>
                                
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