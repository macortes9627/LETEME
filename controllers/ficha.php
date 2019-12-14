<?php
    class Ficha extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $fichas = $this->view->datos = $this->model->read();//get ficha
        $this->view->fichas = $fichas;
            $this->view->render('ficha/index');
        }
        function verFicha($param = null){
            $idFicha = $param[0];
            $ficha = $this->model->readById($idFicha);
    
            session_start();
            $_SESSION["id_verFicha"] = $ficha->nroficha;
    
            $this->view->ficha = $ficha;
            $this->view->render('ficha/form');
        }
        function crear(){
            if(isset($_POST["nroficha"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "Ficha creada correctamente";
                    $fichas = $this->view->datos = $this->model->read();
                    $this->view->fichas = $fichas;
                    $this->view->render('ficha/index');
                }else{
                    
                    $this->view->mensaje = "La ficha ya existe 1";
                    $this->view->render('ficha/form');
                }
            }else{
                $this->view->render('ficha/form');
            }
        }
        function leer($param = null){
            $nroficha = $param[0];
            $ficha = $this->model->readById($nroficha);
    
            session_start();
            $_SESSION["id_verFicha"] = $ficha->nroficha;
    
            $this->view->ficha = $ficha;
            $this->view->render('ficha/editar');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["id_verFicha"];
            unset($_SESSION['id_verFicha']);
    
            if($this->model->update($_POST)){
                $ficha = new FichaDAO(); 
                $ficha->nroficha = $id;
                //$ficha->nroficha = $_POST['nroficha'];
                $ficha->programa = $_POST['programa'];
                $ficha->fecha_ingreso = $_POST['fecha_ingreso'];
                $ficha->fecha_fin_lectiva = $_POST['fecha_fin_lectiva'];
                $ficha->fecha_fin_practica = $_POST['fecha_fin_practica'];
    
    
                $this->view->ficha = $ficha;
                $this->view->mensaje = "Ficha actualizada correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar la ficha";
            }
            
            $fichas = $this->view->datos = $this->model->read();
            $this->view->fichas = $fichas;
            $this->view->render('ficha/index');
        }
        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->delete($id)){
                $mensaje ="Ficha eliminada correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar la ficha";
                //$this->view->mensaje = "No se pudo eliminar al alumno";
            }
    
            //$this->render();
    
            echo $mensaje;
        }
    }
?>