<?php

class Nuevo extends Controller{


    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        
    }

    function render(){
        $this->view->render('nuevo/index');
    }

    function crear(){
        $campo0 = $_POST['frm_identificacion'];
        $campo1    = $_POST['frm_nombres'];
        $campo2  = $_POST['frm_apellidos'];
        $campo3  = $_POST['frm_telefono'];
        $campo4  = $_POST['frm_email'];
        $campo5  = $_POST['frm_contrasena'];
        

        if($this->model->insert($_POST)){
            //header('location: '.constant('URL').'nuevo/alumnoCreado');
            $this->view->mensaje = "Alumno creado correctamente";
            $this->view->render('nuevo/index');
        }else{
            $this->view->mensaje = "La matrícula ya está registrada";
            $this->view->render('nuevo/index');
        }
    }

}

?>