<?php

class Nuevoaprendiz extends Controller{


    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
    }

    function render(){
        $this->view->fichas =$this->model->read(); // listado de las fichas
        $this->view->render('nuevoaprendiz/index');
    }
 
    function crear(){
        $campo0 =$_POST['frm_documento'];
        $campo1 =$_POST['frm_ficha_nroficha'];
        $campo2 =$_POST['frm_nombres'];
        $campo3 =$_POST['frm_apellidos'];
        $campo4 =$_POST['frm_email'];
        $campo5 =$_POST['frm_fecha_exp_documento'];
        $campo6 =$_POST['frm_lugar_exp_documento'];
        $campo7 =$_POST['frm_fecha_nacimiento'];
        $campo8 =$_POST['frm_lugar_nacimiento'];
        $campo9 =$_POST['frm_direccion'];
        $campo10 =$_POST['frm_celular'];
        $campo11 =$_POST['frm_whatsapp'];
        $campo12=$_POST['frm_eps'];
        $campo13 =$_POST['frm_rh'];
        $campo14 =$_POST['frm_acudiente'];
        $campo15 =$_POST['frm_celular_acudiente'];
        $campo16 =$_POST['frm_tipo_documento_id'];
        $campo17 =$_POST['frm_estilos_aprendizaje'];
       
        if($this->model->insert($_POST)){
            //header('location: '.constant('URL').'nuevo/aprendizCreado');
            $this->view->mensaje = "Aprendiz creado correctamente";
            $this->view->render('nuevoaprendiz/index');
        }else{
            $this->view->mensaje = "La matrícula ya está registrada";
            $this->view->render('nuevoaprendiz/index');
        }
    }

}

?>