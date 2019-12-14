<?php
    class Resultado extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $resultado = $this->view->datos = $this->model->read();//get resultado
        $this->view->resultado = $resultado;
            $this->view->render('resultado/index');
        }
        function verResultado($param = null){
            $idResultado = $param[0];
            $resultado = $this->model->readById($idResultado);
    
            session_start();
            $_SESSION["id_verResultado"] = $resultado->instructor_documento;
    
            $this->view->resultado = $resultado;
            $this->view->render('resultado/form');
        }
        function crear(){
            if(isset($_POST["instructor_documento"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "Resultado creado correctamente";
                    $resultado = $this->view->datos = $this->model->read();
                    $this->view->resultado = $resultado;
                    $this->view->render('resultado/index');
                }else{
                    
                    $this->view->mensaje = "El resultado ya existe ";
                    $this->view->render('resultado/form');
                }
            }else{
                $this->view->render('resultado/form');
            }
        }
        function leer($param = null){
            $instructor_documento = $param[0];
            $resultado = $this->model->readById($instructor_documento);
    
            session_start();
            $_SESSION["id_verResultado"] = $resultado->instructor_documento;

            $this->view->resultado = $resultado;
            $this->view->render('resultado/editar');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["id_verResultado"];
            unset($_SESSION['id_verResultado']);
    
            if($this->model->update($_POST)){
                $resultado = new ResultadoDAO(); 
                $resultado->instructor_documento = $id;
                $resultado->nombre = $_POST['nombre'];
                $resultado->horas_directas = $_POST['horas_directas'];

                $this->view->resultado = $resultado;
                $this->view->mensaje = "El resultado ha sido actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar el resultado";
            }
            
            $resultado = $this->view->datos = $this->model->read();
            $this->view->resultado = $resultado;
            $this->view->render('resultado/index');
        }
        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->delete($id)){
                $mensaje ="Resultado eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el resultado";
            }
    
            //$this->render();
    
            echo $mensaje;
        }
    }
?>