<?php

class Control_asistencia extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
            
            
        }
            function render(){
                $control = $this->view->datos = $this->model->get();
                $this->view->control = $control;
                $this->view->aprendi=$this->model->getaprendi();  //informacion alumno
                $this->view->instruc=$this->model->getinstruc();//informacion instructor
                $this->view->render('control_asistencia/index');
               
            }

            function crear(){
                $campo0 = $_POST['frm_aprendiz_documento'];
                $campo1 = $_POST['frm_instructor_documento'];
                $campo2 = $_POST['frm_fecha'];
                $campo3 = $_POST['frm_excusa'];
                $campo4 = $_POST['frm_asistio'];
              
              
            
                
                if($this->model->insert($_POST)){
                    //header('location: '.constant('URL').'nuevo/alumnoCreado');
                    $this->view->mensaje = "Se actualizo correctamente el control de asistencia";
                    //$this->view->render('ficha/index');
                    $this->render();
                }else{
                    $this->view->mensaje = "No se actualizo correctamente el control de asistencia";
                    //$this->view->render('ficha/index');
                    $this->render();
                }
        }

        
        
                
                    
}

?>