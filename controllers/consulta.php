<?php



class Consulta extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $alumnos = $this->view->datos = $this->model->get();
        $this->view->alumnos = $alumnos;
        $this->view->render('consulta/index');
    }

    function verAlumno($param = null){
        $idAlumno = $param[0];
        $alumno = $this->model->getById($idAlumno);

        session_start();
        $_SESSION["id_verAlumno"] = $alumno->dao_identificacion;

        $this->view->alumno = $alumno;
        $this->view->render('consulta/detalle');
    }

    function actualizarAlumno($param = null){
        session_start();
        $id = $_SESSION["id_verAlumno"];
        unset($_SESSION['id_verAlumno']);

        if($this->model->update($_POST)){
            $alumno = new Alumno();
            $alumno->dao_identificacion = $id;
            $alumno->dao_nombres = $_POST['frm_nombres'];
            $alumno->dao_apellidos = $_POST['frm_apellidos'];
            $alumno->dao_telefono = $_POST['frm_telefono'];
            $alumno->dao_email = $_POST['frm_email'];


            $this->view->alumno = $alumno;
            $this->view->mensaje = "Alumno actualizado correctamente";
        }else{
            $this->view->mensaje = "No se pudo actualizar al alumno";
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarAlumno($param = null){
        $id = $param[0];

        if($this->model->delete($id)){
            $mensaje ="Alumno eliminado correctamente";
            //$this->view->mensaje = "Alumno eliminado correctamente";
        }else{
            $mensaje = "No se pudo eliminar al alumno";
            //$this->view->mensaje = "No se pudo eliminar al alumno";
        }

        //$this->render();

        echo $mensaje;
    }

    
}

?>