<?php
    class Actividades extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $actividades = $this->view->datos['actividades'] = $this->model->read();
        $this->view->actividades = $actividades;
        $resultadoaprendizajes = $this->view->datos['ddl_resultadoaprendizajes'] = 
        $this->model->load();
        $this->view->ddl_resultadoaprendizajes = $resultadoaprendizajes;
            $this->view->render('actividades/index');
        }
        function crear(){
            if(isset($_POST["nombre"])){
                    if($this->model->create($_POST)){
                        $this->view->mensaje = "Usuario creado correctamente";
                        $usuario = $this->view->datos = $this->model->read();
                        $this->view->usuario = $usuario;
                        $this->view->render('usuario/index');
                    }else{
                    
                    $this->view->mensaje = "No se pudo crear el usuario ";
                    $this->view->render('usuario/index');
                    }
                }else{
                    $resultadoaprendizajes = $this->view->datos['ddl_resultadoaprendizajes'] = $this->model->load();
                    $this->view->ddl_resultadoaprendizajes = $resultadoaprendizajes;
                    $this->view->render('actividades/index');
                }
        }
        function leer($param = null){
            $actividad = $param[0];
            $actividad = $this->model->readById($actividad);
    
            session_start();
            $_SESSION["id_verActividad"] = $actividad->dao_username;
    
            $this->view->Actividades = $actividad;
            $this->view->render('Actividades/editar');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["id_verUsuario"];
            unset($_SESSION['id_verUsuario']);
    
            if($this->model->update($_POST)){
                $usuario = new UsuarioDAO();
                $usuario->dao_username = $id;
                $usuario->dao_email = $_POST['frm_email'];
                $usuario->dao_passwordd = $_POST['frm_passwordd'];
                $usuario->dao_create_time = $_POST['frm_create_time'];
    
    
                $this->view->usuario = $usuario;
                $this->view->mensaje = "Usuario actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar el Usuario";
            }
            $usuario = $this->view->datos = $this->model->read();
            $this->view->usuario = $usuario;
            $this->view->render('usuario/index');
        }
        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->delete($id)){
                $mensaje ="Usuario eliminado correctamente";
                //$this->view->mensaje = "Usuario eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el Usuario";
                //$this->view->mensaje = "No se pudo eliminar al usuario";
            }
    
            //$this->render();
    
            echo $mensaje;
        }
    }
?>