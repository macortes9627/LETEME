<?php

class Instructor extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
            
            
        }
            function render(){
                $instruc = $this->view->datos = $this->model->get();
                $this->view->instruc = $instruc;
                $this->view->render('instructor/index');
               
            }

            function crear(){
                
                $campo0 = $_POST['frm_documento'];
                $campo1 = $_POST['frm_nombres'];
                $campo2 = $_POST['frm_apellidos'];
                $campo3 = $_POST['frm_email'];
                $campo4 = $_POST['frm_celular'];
                $campo5 = $_POST['frm_whatsapp'];
                

              
            
                
                if($this->model->insert($_POST)){
                    //header('location: '.constant('URL').'nuevo/alumnoCreado');
                    $this->view->mensaje = "El instructor fue creado correctamente ";
                    //$this->view->render('ficha/index');
                    $this->render();
                }else{
                    $this->view->mensaje = "El instructor  no se creo correctamente";
                    //$this->view->render('ficha/index');
                    $this->render();
                }
        }

        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->delete($id)){
                $mensaje ="instructor fue eliminado";
                
            }else{
                $mensaje = "No puedo eliminar el instructor";
                
            }
            echo $mensaje;
        }
    
        
                
                    
}

?>