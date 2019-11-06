<!--Mario alberto cortes
version_001
fecha: 06-11-2019
desarrollo: PHP Y HTML
-->
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
        
            <div class="col-md-4"><h1 class="text-warning">Control Asistencia </h1>
            
            <form action="<?php echo constant('URL'); ?>control_asistencia/crear" method="POST">
                            <div class="form-group">
                            
                            <label for="aprendiz_documento">Aprendiz_documento</label>
                            <select class="form-control" name="frm_aprendiz_documento" id="aprendiz_documento">
                            <?php
                                include_once 'models/ficha.php';
                                //var_dump($this->fichas);
                                foreach ($this->aprendi as $row){
                                    $options = new Aprendiz();
                                    $options = $row;
                            ?>
                            <option value="<?php echo $options->dao_documento; ?>"><?php echo $options->dao_documento."-".$options->dao_nombres; ?></option>
                            <?php
                                }
                            ?>
                            </select>
                            
                            <label for="instructor_documento">Documento de instructor</label>
                                <select class="form-control" name="frm_instructor_documento" id="instructor_documento">
                                <?php
                                    include_once 'models/instructor.php';
                                    //var_dump($this->fichas);
                                    foreach ($this->instruc as $row){
                                        $options = new Instructor();
                                        $options = $row;
                                ?>
                                <option value="<?php echo $options->dao_documento; ?>"><?php echo $options->dao_documento; ?></option>
                                <?php
                                    }
                                ?>
                                <small id="instructor_documentoHelp" class="form-text text-muted"> </small>
                            </select>
                            
                            
                            <label for="fecha">Fecha</label>
                                <input type="date" class="form-control" name="frm_fecha" id="fecha">
                                <small id="fechaHelp" class="form-text text-muted">Ingrese la fecha</small>

                            <label for="excusa">Excusa</label>
                                <input type="text" class="form-control" name="frm_excusa" id="excusa">
                                <small id="excusaHelp" class="form-text text-muted">Ingrese la excusa</small>

                            <label for="asistio">Asistio</label>
                                <input type="text" class="form-control" name="frm_asistio" id="asistio">
                                <small id="asistioHelp" class="form-text text-muted">Seleccione asistio</small>

                            

                        
                            <input type="submit" class="btn btn-primary" value="Actualizar" id="btn_crear">
                        </form>
                    <span><?php echo $this->mensaje; ?></span>
            </div>
            </div>
          
       
        <div class="row">
      
        <div class="col-md-12"><!-- Consulta -->
                <table id="tabla" class="table table-secondary">
                <thead class="thead-dark">
                    <tr>
                        <th  class="text-warning">aprendiz_documento</th>
                        <th  class="text-warning">instructor_documento</th>
                        <th  class="text-warning">Fecha</th>
                        <th  class="text-warning">excusa</th>
                        <th  class="text-warning">Asistio</th>
                        <th  class="text-warning" colspan="2">Acciones</th>
                        
                    </tr>
                </thead>

                <tbody id="tbody-control">
                
                    <?php
                        //include_once 'models/ficha_aprendiz.php';
                        foreach ($this->control as $row) {
                            $control = new control_asistencia ();
                            $control = $row;
                    ?>
                            <tr id="fila-<?php echo $control->dao_aprendiz_documento; ?>">
                            <td><?php echo $control->dao_aprendiz_documento; ?></td>
                            <td><?php echo $control->dao_instructor_documento; ?></td>
                            <td><?php echo $control->dao_fecha; ?></td>
                            <td><?php echo $control->dao_excusa; ?></td>
                            <td><?php echo $control->dao_asistio; ?></td>
                            
                            

                               
                                
                                <td><a href="<?php echo constant('URL') . 'actividades/leer.php' . $control->dao_aprendiz_documento; ?>">Actualizar</a></td>
                                <td><button class="bEliminar" data-controlador="consultas" data-accion="eliminarAlumno" data-id="<?php echo $actividad->dao_id; ?>">Eliminar</button></td> 
                                
                            </tr>
                    <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
        </div>
        </div>
        <br>
        <?php require 'views/footer.php'; ?>
        <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
    </main>
</body>
</html>