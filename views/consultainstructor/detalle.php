<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        
        <h1 class="center"><?php echo strtoupper($this->instructor->dao_inombres)." ".strtoupper($this->instructor->dao_iapellidos); ?></h1>
        <div><?php echo $this->mensaje; ?></div>
        <form action="<?php echo constant('URL'); ?>consultainstructor/actualizarInstructor/" method="POST">
        <label for="documento">Documento</label><br>
            <input style="background: #dddddd; font-size:16px;" type="text" value="<?php echo $this->instructor->dao_documento; ?>" name="frm_documento" id="documento" readonly><br>
            <label for="inombres">Nombres</label><br>
            <input type="text" value="<?php echo $this->instructor->dao_inombres; ?>" name="frm_inombres" id="inombres"><br>
            <label for="iapellidos">Apellidos</label><br>
            <input type="text"  value="<?php echo $this->instructor->dao_iapellidos; ?>" name="frm_iapellidos" id="iapellidos"><br>
            <label for="iemail">Email</label><br>
            <input type="email" value="<?php echo $this->instructor->dao_iemail; ?>" name="frm_iemail" id="iemail"><br>
            <label class="form-text text">WhatsApp
                <div class="custom-control custom radio custom-control-inline">
                    <input type="radio" id="whatsapp1" name="frm_whatsapp" value="1" <?php if($this->instructor->dao_whatsapp==1) echo 'cheked="cheked"';?>class="custom-control-input">
                    <label class="custom-control-label" for="whatsapp1">Si</label>
                </div>
                <div class="custom-control custom radio custom-control-inline">
                    <input type="radio" id="whatsapp2" name="frm_whatsapp" value="0" <?php if($this->instructor->dao_whatsapp==0)echo 'cheked="cheked"';?>class="custom-control-input">
                    <label class="custom-control-label" for="whatsapp2" >No</label>
             </div><br>
            <label for="itelefono">Telefono</label><br>
            <input type="number" value="<?php echo $this->instructor->dao_itelefono; ?>" name="frm_itelefono" id="itelefono"><br><br>
            <input type="submit" class="btn btn-primary " 
             value="Actualizar">
             <input type="button" class="btn btn-danger " onClick='window.location.assign("<?php echo constant('URL'); ?>/consultainstructor")' value="Cancelar">
            
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>