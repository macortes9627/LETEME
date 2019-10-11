<?php
    class Programa extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $programas = $this->view->datos = $this->model->read();
        $this->view->programas = $programas;
            $this->view->render('programa/index');
        }
        function crear(){
            if(isset($_POST["nombre"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "Programa creado correctamente";
                    $programas = $this->view->datos = $this->model->read();
                    $this->view->programas = $programas;
                    $this->view->render('programa/index');
                }else{
                    
                    $this->view->mensaje = "El programa ya existe 1";
                    $this->view->render('programa/nuevo');
                }
            }else{
                $this->view->render('programa/nuevo');
            }
        }
        function leer($param = null){
            $nroprograma = $param[0];
            $programa = $this->model->readById($nroprograma);
    
            session_start();
            $_SESSION["id_verPrograma"] = $programa->nroprograma;
    
            $this->view->programa = $programa;
            $this->view->render('programa/editar');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["id_verPrograma"];
            unset($_SESSION['id_verPrograma']);
    
            if($this->model->update($_POST)){
                $programa = new ProgramaDAO();
                $programa->nroprograma = $id;
                $programa->nroprograma = $_POST['nroprograma'];
                $programa->nombre = $_POST['nombre'];
                $programa->descripcion = $_POST['descripcion'];
                $programa->totalhoras = $_POST['totalhoras'];
    
    
                $this->view->programa = $programa;
                $this->view->mensaje = "Programa actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar al programa";
            }
            $programas = $this->view->datos = $this->model->read();
            $this->view->programas = $programas;
            $this->view->render('programa/index');
        }
        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->delete($id)){
                $mensaje ="Programa eliminado correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el programa";
                //$this->view->mensaje = "No se pudo eliminar al alumno";
            }
    
            //$this->render();
    
            echo $mensaje;
        }
    }
?>