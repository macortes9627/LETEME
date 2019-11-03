<?php

class Aprendiz extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
            
            
        }
            function render(){
                $aprendi = $this->view->datos = $this->model->get();
                $this->view->aprendi = $aprendi;
                $this->view->tipo_documen=$this->model->gettipo_documen();//LLAMADO DE APRENDIZ
                $this->view->render('aprendiz/index');
               
            }

            function crear(){
                $campo0 = $_POST['frm_tipo_documento_id'];
                $campo1 = $_POST['frm_documento'];
                $campo2 = $_POST['frm_nombres'];
                $campo3 = $_POST['frm_apellidos'];
                $campo4 = $_POST['frm_email'];
                $campo5 = $_POST['frm_fecha_exp_documento'];
                $campo6 = $_POST['frm_lugar_exp_documento'];
                $campo7 = $_POST['frm_fecha_nacimiento'];
                $campo8 = $_POST['frm_lugar_nacimiento'];
                $campo9 = $_POST['frm_direccion'];
                $campo10 = $_POST['frm_whatsapp'];
                $campo11 = $_POST['frm_eps'];
                $campo12 = $_POST['frm_rh'];
                $campo13 = $_POST['frm_acudiente'];
                $campo14 = $_POST['frm_celular_acudiente'];
                $campo15 = $_POST['frm_estilos_aprendizaje'];

              
            
                
                if($this->model->insert($_POST)){
                    //header('location: '.constant('URL').'nuevo/alumnoCreado');
                    $this->view->mensaje = "El aprendiz fue creado correctamente ";
                    //$this->view->render('ficha/index');
                    $this->render();
                }else{
                    $this->view->mensaje = "El aprendiz  no se creo correctamente";
                    //$this->view->render('ficha/index');
                    $this->render();
                }
        }

        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->delete($id)){
                $mensaje ="se elimino el aprendiz";
                
            }else{
                $mensaje = "No puedo eliminar el aprendiz";
                
            }
            echo $mensaje;
        }
    
        
                
                    
}

?>