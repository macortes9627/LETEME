<?php

class Success extends Controller{

    function __construct(){
        parent::__construct();
        
        //echo "Error al cargar el recurso";
    }

    function nuevoAprendiz(){
        $this->view->mensaje = "Nuevo aprendiz creado correctamente";
        $this->view->render('success/index');
    }
}
?>