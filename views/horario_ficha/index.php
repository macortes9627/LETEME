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

    <main id="container" class="container">
        <div class="row">
        <div class="col-md-12 "   >
            <div class="col-md-4"><h1 class="text-warning">Horario Ficha </h1>
            
            <form action="<?php echo constant('URL'); ?>horario_ficha/crear" method="POST">
                            <div class="form-group">
                            <label for="Ficha">Numero de ficha</label>
                                    <select class="form-control" name="frm_ficha_nroficha" id="ficha_nroficha">
                                    <?php
                                        include_once 'models/ficha.php';
                                        //var_dump($this->fichas);
                                        foreach ($this->fichas as $row){
                                            $options = new Ficha();
                                            $options = $row;
                                    ?>
                                    <option value="<?php echo $options->dao_nroficha; ?>"><?php echo $options->dao_nroficha; ?></option>
                                    <?php
                                        }
                                    ?>
                                    <small id="ficha_nrofichaHelp" class="form-text text-muted"> </small>
                                    </select>
                                        </div>

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
                            
                                
                            <label for="sesion_jornada">Jornada</label>
                                <select class="form-control" name="frm_sesion_jornada" id="sesion_jornada">
                                <?php
                                    include_once 'models/jornada.php';
                                    //var_dump($this->fichas);
                                    foreach ($this->jornad as $row){
                                        $options = new Jornada();
                                        $options = $row;
                                ?>
                                <option value="<?php echo $options->dao_jornada; ?>"><?php echo $options->dao_jornada; ?></option>
                                <?php
                                    }
                                ?>
                                <small id="instructor_documentoHelp" class="form-text text-muted"> </small>
                            </select>

                            <label for="dia" name="frm_dia">Dia</label >
                            <br>
                            
                            <label><input type="checkbox" id="dia" name="frm_dia" value="Lunes"> Lunes</label><br>
                            <label><input type="checkbox" id="dia"  name="frm_dia" value="Martes"> Martes</label><br>
                            <label><input type="checkbox" id="dia" name="frm_dia" value="Miercoles"> Miercoles</label><br>
                            <label><input type="checkbox" id="dia"  name="frm_dia" value="Jueves"> Jueves</label><br>
                            <label><input type="checkbox" id="dia"  name="frm_dia" value="Viernes"> Viernes</label><br>
                            <label><input type="checkbox" id="dia" name="frm_dia"  value="Sabado"> Sabado</label><br>
                            <label><input type="checkbox" id="dia" name="frm_dia" value="Domingo"> Domingo</label><br>
                            <small id="diapHelp" class="form-text text-muted"> </small>
                                

                            <label for="hora_inicio">hora_inicio</label>
                                <input type="time" class="form-control" name="frm_hora_inicio" id="hora_inicio">
                                <small id="hora_inicioHelp" class="form-text text-muted">Seleccione hora_inicio</small>

                            <label for="hora_fin">hora_fin</label>
                                <input type="time" class="form-control" name="frm_hora_fin" id="hora_fin">
                                <small id="hora_finHelp" class="form-text text-muted">Seleccione hora_fin</small>

                            <label for="ambiente">Ambiente</label>
                                <input type="text" class="form-control" name="frm_ambiente" id="ambiente">
                                <small id="ambienteHelp" class="form-text text-muted">Ingrese nuemero ambiente</small>

                            <label for="fecha_inicio">fecha_inicio</label>
                                <input type="date" class="form-control" name="frm_fecha_inicio" id="fecha_inicio">
                                <small id="fecha_inicioHelp" class="form-text text-muted">Seleccione fecha_inicio</small>
                            
                            <label for="fecha_fin">fecha_fin</label>
                                <input type="date" class="form-control" name="frm_fecha_fin" id="fecha_fin">
                                <small id="fecha_finHelp" class="form-text text-muted">Seleccione fecha_fin</small>
                        
                            <input type="submit" class="btn btn-primary" value="Actualizar" id="btn_crear">
                        </form>
                    <span><?php echo $this->mensaje; ?></span>
            </div>
            </div>
            </div>
        </div>
        <br>
       
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-6"><!-- Consulta -->
                <table id="tabla"  class="table table-secondary"  >
                <thead class="thead-dark">
                    <tr>
                        <th  class="text-warning">Numero de ficha</th>
                        <th  class="text-warning">instructor_documento</th>
                        <th  class="text-warning">Sesion_jornada</th>
                        <th  class="text-warning">dia</th>
                        <th  class="text-warning">hora_inicio</th>
                        <th  class="text-warning">hora_fin</th>
                        <th  class="text-warning">ambiente</th>
                        <th  class="text-warning">fecha_inicio</th>
                        <th  class="text-warning">fecha_fin</th>

                        <th  scope="col" colspan="2">Acciones</th>
                        
                    </tr>
                </thead>

                <tbody id="tbody-hora">
                
                    <?php
                        //include_once 'models/ficha_aprendiz.php';
                        foreach ($this->hora as $row) {
                            $hora = new horario_ficha ();
                            $hora = $row;
                    ?>
                            <tr id="fila-<?php echo $hora->dao_ficha_nroficha; ?>">
                            <td><?php echo $hora->dao_ficha_nroficha; ?></td>
                            <td><?php echo $hora->dao_instructor_documento; ?></td>
                            <td><?php echo $hora->dao_sesion_jornada; ?></td>
                            <td><?php echo $hora->dao_dia; ?></td>
                            <td><?php echo $hora->dao_hora_inicio; ?></td>
                            <td><?php echo $hora->dao_hora_fin; ?></td>
                            <td><?php echo $hora->dao_ambiente; ?></td>
                            <td><?php echo $hora->dao_fecha_inicio; ?></td>
                            <td><?php echo $hora->dao_fecha_fin; ?></td>

                            
                            

                               
                                
                                <td><a href="<?php echo constant('URL') . 'actividades/leer.php' . $hora->dao_ficha_nroficha; ?>">Actualizar</a></td>
                                <td><button class="bEliminar" data-controlador="consultas" data-accion="eliminarAlumno" data-id="<?php echo $hora->dao_ficha_nroficha; ?>">Eliminar</button></td> 
                                
                            </tr>
                    <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
                        </div>
        <?php require 'views/footer.php'; ?>
        <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
    </main>
</body>
</html>