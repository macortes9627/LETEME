<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Registro Aprendiz</title>
</head>
<body style="background-color:#ffd25b";>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Registro Aprendiz  </h1>
        <div class="col-sm-6 offset-sm-3">
        <form action="<?php echo constant('URL'); ?>nuevoaprendiz/crear" method="POST">
        <div class="form-group">
                <label for="tipo_documento_id">Tipo de Documento</label>
                <small id="tipo_documento_idHelp" class="form-text text-muted">Seleccione su tipo de documento</small>
                <select name="frm_tipo_documento_id" >
                <option value="C.c.">C.c</option>
                <option value="T.I.">T.I.</option>
                <option value="Pasaporte">Pasaporte</option>
            </select>
            </div>
            <div class="form-group">
                <label for="documento">Documento</label>
                <input type="text" class="form-control" name="frm_documento" id="documento" required>
                <small id="documentoHelp" class="form-text text-muted">Ingrese su número de documento</small>
            </div>
            <div class="form-group">
                
            <label for="nroficha">No. Ficha </label>
                <select class= "form-control" name="frm_ficha_nroficha" id ="ficha_nroficha" >
                    <?php
                    include_once 'models/ficha.php';
                    foreach ($this->fichas as $row){
                        $options = new FichaDAO();
                        $options = $row;
                    
                    ?>
                    
                    <option value="<?php echo $options->nroficha;?>"><?php echo $options->nroficha ."-" .  $options->programa?></option>
                <?php 
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" class="form-control" name="frm_nombres" id="nombres">
                <small id="nombresHelp" class="form-text text-muted">Ingrese sus nombres</small>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" name="frm_apellidos" id="apellidos">
                <small id="apellidosHelp" class="form-text text-muted">Ingrese sus apellidos</small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="frm_email" id="email">
                <small id="emailHelp" class="form-text text-muted">Ingrese su email</small>
            </div>
            <div class="form-group">
                <label for="fecha_exp_documento">Fecha_exp_Documento</label>
                <input type="date" class="form-control" name="frm_fecha_exp_documento" id="fecha_exp_documento">
                <small id="fecha_exp_documentoHelp" class="form-text text-muted">Ingrese su número fecha exp documento</small>
            </div>
            <div class="form-group">
                <label for="lugar_exp_documento">Lugar_exp_documento</label>
                <input type="text" class="form-control" name="frm_lugar_exp_documento" id="lugar_exp_documento">
                <small id="lugar_exp_documentoHelp" class="form-text text-muted">Ingrese su lugar exp documento</small>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha_Nacimiento</label>
                <input type="date" class="form-control" name="frm_fecha_nacimiento" id="fecha_nacimiento">
                <small id="fecha_nacimientoHelp" class="form-text text-muted">Ingrese su fecha nacimiento</small>
            </div>
            <div class="form-group">
                <label for="lugar_nacimiento">Lugar_nacimiento</label>
                <input type="text" class="form-control" name="frm_lugar_nacimiento" id="lugar_nacimiento">
                <small id="lugar_nacimientoHelp" class="form-text text-muted">Ingrese su lugar nacimiento</small>
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control" name="frm_direccion" id="direccion">
                <small id="direccionoHelp" class="form-text text-muted">Ingrese su direccion</small>
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" name="frm_celular" id="celular">
                <small id="celularHelp" class="form-text text-muted">Ingrese su número de celular</small>
            </div>

            <div class="form-group">
                 <label for="whatsapp">Whatsapp</label>
                 <small id="whatsappHelp" class="form-text text-muted">Indique si tiene whatsapp</small>
                 <input type="radio" name="frm_whatsapp" id="frm_whatsapp"value="si">Si 
                 <input type="radio" name="frm_whatsapp" id="frm_whatsapp"value="no" checked>No
                  </div>
            <div class="form-group">
                <label for="eps">Eps</label>
                <small id="epsHelp" class="form-text text-muted">Ingrese su eps</small>
                <select name="frm_eps">
                <option value="cafam">Cafam</option>
                <option value="famisanar">Famisanar</option>
                <option value="comfacor">Comfacor</option>
                <option value="coosalud">Coosalud</option>
                <option value="saludcoop">Saludcoop</option>
                <option value="saludvida">Saludvida</option>
                <option value="coomeva">Coomeva</option>
                <option value="nueva_eps">Nueva Eps</option>
                <option value="compensar">Compensar</option>
                </select>
            </div>
           <div> 
           <label for="rh">Rh</label>
           <small id="rhHelp" class="form-text text-muted">Ingrese su rh</small>
           <select name="frm_rh">
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                </select>

           </div>
            <div class="form-group">
                <label for="acudiente">Acudiente</label>
                <input type="text" class="form-control" name="frm_acudiente" id="acudiente">
                <small id="acudienteHelp" class="form-text text-muted">Ingrese el nombre de su acudiente</small>
            </div>
            <div class="form-group">
                <label for="celular_acudiente">Celular Acudiente</label>
                <input type="text" class="form-control" name="frm_celular_acudiente" id="celular_acudiente">
                <small id="celular_acudienteHelp" class="form-text text-muted">Ingrese el numero celular de su acudiente</small>
            </div>
            <div class="form-group">
                <label for="estilos_aprendizaje">Estilos Aprendizaje</label>
                <small id="estilos_aprendizajeHelp" class="form-text text-muted">Ingrese su estilo de aprendizaje</small>
                <select name=frm_estilos_aprendizaje>
                <option value="acomodador">Acomodador</option>
                <option value="divergente">Divergente</option>
                <option value="convergente">Convergente</option>
                <option value="asimilador">Asimilador</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Crear nuevo alumno" id="btn_crear">
        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
    
</body>
</html>