<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Actualizacion Aprendiz</title>
</head>
<body style="background-color:#ffd25b">

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        
        <h1 class="center"><?php echo strtoupper($this->aprendiz->dao_nombres)." ".strtoupper($this->aprendiz->dao_apellidos); ?></h1>
        <div><?php echo $this->mensaje; ?></div>
        <form action="<?php echo constant('URL'); ?>consulta/actualizaraprendiz/" method="POST">
         <label for="tipo_documento_id">Tipo de documento</label><br>
        <input type="text" value="<?php echo $this->aprendiz->dao_tipo_documento_id; ?>" name="frm_tipo_documento_id" id="tipo_documento_id"><br> -->
<!--<select name="frm_tipo_documento_id" id="tipo_documento_id"><br>
  <option value="C.c.">C.c.</option>
  <option value="Pasaporte">Pasaporte</option>
  <option value="T.I.">T.I.</option>
</select>-->
                <?= $this->aprendiz->dao_ficha_nroficha ?>
                    <label for="documento">Documento</label><br>
            <input style="background: #dddddd; font-size:16px;" type="text" value="<?php echo $this->aprendiz->dao_documento; ?>" name="frm_documento" id="documento" readonly><br>
            <label for="ficha_nroficha">Ficha_nroficha</label><br>
            <select class= "form-control" name="frm_ficha_nroficha" id ="ficha_nroficha" >
                    <?php
                    include_once 'models/ficha.php';
                    foreach ($this->fichas as $row){
                        $options = new FichaDAO();
                        $options = $row;

                        $selected = ($this->aprendiz->dao_ficha_nroficha == $options->nroficha ? 'selected' : 'k');
                    
                    ?>
                    
                    <option value="<?php echo $options->nroficha;?>" <?= $selected; ?>><?php echo $options->nroficha ."-" .  $options->programa?></option>
                <?php 
                }
                ?>
                </select>
                <?= $this->aprendiz->dao_ficha_nroficha ?>
            <label for="nombres">Nombres</label><br>
            <input type="text" value="<?php echo $this->aprendiz->dao_nombres; ?>" name="frm_nombres" id="nombres"><br>
            <label for="apellidos">Apellidos</label><br>
            <input type="text"  value="<?php echo $this->aprendiz->dao_apellidos; ?>" name="frm_apellidos" id="apellidos"><br>
            <label for="email">Email</label><br>
            <input type="email" value="<?php echo $this->aprendiz->dao_email; ?>" name="frm_email" id="email"><br>
            <label for="fecha_exp_documento">Fecha_exp_documento</label><br>
            <input type="date" value="<?php echo $this->aprendiz->dao_fecha_exp_documento; ?>" name="frm_fecha_exp_documento" id="fecha_exp_documento"><br>
            <label for="lugar_exp_documento">Lugar_exp_documento</label><br>
            <input type="text" value="<?php echo $this->aprendiz->dao_lugar_exp_documento; ?>" name="frm_lugar_exp_documento" id="lugar_exp_documento"><br>
            <label for="fecha_nacimiento">Fecha_nacimiento</label><br>
            <input type="date" value="<?php echo $this->aprendiz->dao_fecha_nacimiento; ?>" name="frm_fecha_nacimiento" id="fecha_nacimiento"><br>
            <label for="lugar_nacimiento">Lugar_nacimiento</label><br>
            <input type="text" value="<?php echo $this->aprendiz->dao_lugar_nacimiento; ?>" name="frm_lugar_nacimiento" id="lugar_nacimiento"><br>
            <label for="lugar_nacimiento">Lugar_nacimiento</label><br>
            <input type="text" value="<?php echo $this->aprendiz->dao_direccion; ?>" name="frm_direccion" id="direccion"><br>
            <label for="direccion">Direccion</label><br>
            <input type="text" value="<?php echo $this->aprendiz->dao_celular; ?>" name="frm_celular" id="celular"><br>
            <label for="celular">Celular</label><br>
            <input type="radio" value="1" name="frm_whatsapp" id="whatsapp">Sí<br>
            <input type="radio" value="0" name="frm_whatsapp" id="whatsapp">No<br>
            <label for="whatsapp">Whatsapp</label><br>
            <input type="text" value="<?php echo $this->aprendiz->dao_eps; ?>" name="frm_eps" id="eps"><br>                 
            <label for="Eps">Eps</label><br>
            <input type="text" value="<?php echo $this->aprendiz->dao_rh; ?>" name="frm_rh" id="rh"><br>
            <label for="rh">Rh</label><br>
            <input type="text" value="<?php echo $this->aprendiz->dao_acudiente; ?>" name="frm_acudiente" id="acudiente"><br>
            <label for="acudiente">Acudiente</label><br>
            <input type="text" value="<?php echo $this->aprendiz->dao_celular_acudiente; ?>" name="frm_celular_acudiente" id="celular_acudiente"><br>
            <label for="celular_acudiente">Celular_acudiente</label><br>
            <input type="text" value="<?php echo $this->aprendiz->dao_estilos_aprendizaje; ?>" name="frm_estilos_aprendizaje" id="estilos_aprendizaje"><br>
            <label for="estilos_aprendizaje">Estilos_aprendizaje</label><br><br>
            <input type="submit" value="Actualizar aprendiz" >
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>