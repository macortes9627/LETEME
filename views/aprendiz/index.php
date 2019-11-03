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
            <div class="col-md-4"><h1 class="text-warning">Registro Aprendiz </h1>
            
            <form action="<?php echo constant('URL'); ?>aprendiz/crear" method="POST">
            <div class="form-group">
                            <select class="form-control" name="frm_tipo_documento_id" id="tipo_documento_id">
                            <?php
                                include_once 'models/tipo_documento.php';
                                //var_dump($this->fichas);
                                foreach ($this->tipo_documen as $row){
                                    $options = new Tipo_documento();
                                    $options = $row;
                            ?>
                            <option value="<?php echo $options->dao_id; ?>"><?php echo $options->dao_id; ?></option>
                            <?php
                                }
                            ?>
                            <small id="ficha_nrofichaHelp" class="form-text text-muted">Seleccione la ficha</small>
                            </select>

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

                            <label for="fecha_exp_documento">Fecha_exp_documento</label>
                                <input type="date" class="form-control" name="frm_fecha_exp_documento" id="fecha_exp_documento">
                                <small id="fecha_exp_documentoHelp" class="form-text text-muted">Ingrese la fecha_exp_documento</small>
                            
                            <label for="lugar_exp_documento">Lugar_exp_documento</label>
                                <input type="text" class="form-control" name="frm_lugar_exp_documento" id="lugar_exp_documento">
                                <small id="lugar_exp_documentoHelp" class="form-text text-muted">Ingrese lugar_exp_documento</small>

                            <label for="fecha_nacimiento">fecha_nacimiento</label>
                                <input type="date" class="form-control" name="frm_fecha_nacimiento" id="fecha_nacimiento">
                                <small id="fecha_nacimientoHelp" class="form-text text-muted">Ingrese la fecha_nacimiento</small>

                            <label for="lugar_nacimiento">lugar_nacimiento</label>
                                <input type="text" class="form-control" name="frm_lugar_nacimiento" id="lugar_nacimiento">
                                <small id="lugar_nacimientoHelp" class="form-text text-muted">Ingrese lugar_nacimiento</small>


                            <label for="direccion">Direccion</label>
                                <input type="text" class="form-control" name="frm_direccion" id="direccion">
                                <small id="direccionHelp" class="form-text text-muted">Ingrese su direccion</small>

                
                            <label for="whatsapp">Whatsapp</label>
                            <input type="radio" id="whatsapp"name="frm_whatsapp" value="0">
                            <label for="whatsapp">SI</label>
                            <input type="radio" id="whatsapp"name="frm_whatsapp" value="1">
                            <label for="whatsapp">NO</label>
                            <small id="whatsappHelp" class="form-text text-muted"> </small>

                            <label for="eps">Eps</label>
                                <input type="text" class="form-control" name="frm_eps" id="eps">
                                <small id="epsHelp" class="form-text text-muted">Ingrese su eps</small>

                            <label for="rh">Rh</label>
                            <select name="frm_rh" id="rh">
                                <option value="O+">O+</option> 
                                <option value="O-" >O-</option>
                                <option value="A+">A+</option>
                                <option value="AB+">AB+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                </select>
                                <small id="rhHelp" class="form-text text-muted"> </small>

                            <label for="acudiente">Acudiente</label>
                                <input type="text" class="form-control" name="frm_acudiente" id="acudiente">
                                <small id="acudienteHelp" class="form-text text-muted">Ingrese nombre acudiente</small>
                            
                            <label for="celular_acudiente">Celular_acudiente</label>
                                <input type="text" class="form-control" name="frm_celular_acudiente" id="celular_acudiente">
                                <small id="celular_acudienteHelp" class="form-text text-muted">Ingrese celular_acudiente</small>


                            <label for="estilos_aprendizaje">Estilos_aprendizaje</label>
                            <select name="frm_estilos_aprendizaje" id="estilos_aprendizaje">
                                <option value="ACOMODADOR">ACOMODADOR</option> 
                                <option value="DIVERGENTE" >DIVERGENTE</option>
                                <option value="CONVERGENTE">CONVERGENTE</option>
                                <option value="ASIMILADOR">ASIMILADOR</option>
                                </select>
                                <small id="estilos_aprendizajeHelp" class="form-text text-muted"> </small>
                            
                        
                            <input type="submit" class="btn btn-primary" value="Crear Aprendiz" id="btn_crear">
                        </form>
                    <span><?php echo $this->mensaje; ?></span>
            </div>
            </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-6"><!-- Consulta -->
                <table id="tabla" class="table table-secondary">
                <thead class="thead-dark">
                    <tr>
                        <th  class="text-warning">Tipo_documento_id</th>
                        <th  class="text-warning">Documento</th>
                        <th  class="text-warning">Nombres</th>
                        <th  class="text-warning">Apellidos</th>
                        <th  class="text-warning">Email</th>
                        <th  class="text-warning">Fecha_exp_documento</th>
                        <th  class="text-warning">Lugar_exp_documento</th>
                        <th  class="text-warning">Fecha_nacimiento</th>
                        <th  class="text-warning">Lugar_nacimiento</th>
                        <th  class="text-warning">Direccion</th>
                        <th  class="text-warning">Whatsapp</th>
                        <th  class="text-warning">Eps</th>
                        <th  class="text-warning">Rh</th>
                        <th  class="text-warning">Acudiente</th>
                        <th  class="text-warning">Celular_acudiente</th>
                        <th  class="text-warning">Estilos_aprendizaje</th>
                        
                        <th  class="text-warning" colspan="2">Acciones</th>
                        
                    </tr>
                </thead>

                <tbody id="tbody-dato">
                
                    <?php
                        //include_once 'models/ficha_aprendiz.php';
                        foreach ($this->aprendi as $row) {
                            $aprendi = new aprendiz ();
                            $aprendi = $row;
                    ?>
                            <tr id="fila-<?php echo $aprendi->dao_tipo_documento_id; ?>">
                            <td><?php echo $aprendi->dao_tipo_documento_id; ?></td>
                            <td><?php echo $aprendi->dao_documento; ?></td>
                            <td><?php echo $aprendi->dao_nombres; ?></td>
                            <td><?php echo $aprendi->dao_apellidos; ?></td>
                            <td><?php echo $aprendi->dao_email; ?></td>
                            <td><?php echo $aprendi->dao_fecha_exp_documento; ?></td>
                            <td><?php echo $aprendi->dao_lugar_exp_documento; ?></td>
                            <td><?php echo $aprendi->dao_fecha_nacimiento; ?></td>
                            <td><?php echo $aprendi->dao_lugar_nacimiento; ?></td>
                            <td><?php echo $aprendi->dao_direccion; ?></td>
                            <td><?php echo $aprendi->dao_whatsapp; ?></td>
                            <td><?php echo $aprendi->dao_eps; ?></td>
                            <td><?php echo $aprendi->dao_rh; ?></td>
                            <td><?php echo $aprendi->dao_acudiente; ?></td>
                            <td><?php echo $aprendi->dao_celular_acudiente; ?></td>
                            <td><?php echo $aprendi->dao_estilos_aprendizaje; ?></td>


                               
                                
                                <td><a href="<?php echo constant('URL') . 'aprendiz/leer.php' . $aprendi->dao_tipo_documento_id; ?>">Actualizar</a></td>
                                <td><button class="bEliminar" data-controlador="aprendiz" data-accion="eliminar" data-id="<?php echo $aprendi->dao_tipo_documento_id; ?>">Eliminar</button></td> 
                                
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