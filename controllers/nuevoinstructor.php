<?php

class Nuevoinstructor extends Controller{


    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        
    }

    function render(){
        $this->view->render('nuevoinstructor/index');
    }

    function crear(){
        $campo0 = $_POST['frm_documento'];
        $campo1    = $_POST['frm_inombres'];
        $campo2  = $_POST['frm_iapellidos'];
        $campo3  = $_POST['frm_itelefono'];
        $campo4  = $_POST['frm_iemail'];
        $campo5  = $_POST['frm_whatsapp'];
        

        if($this->model->insert($_POST)){
            //header('location: '.constant('URL').'nuevo/alumnoCreado');
            $this->view->mensaje = "Instructor creado correctamente";
            $this->view->render('nuevoinstructor/index');
        }else{
            $this->view->mensaje = "El documento ya está registrada";
            $this->view->render('nuevoinstructor/index');
        }
    }

}

?>