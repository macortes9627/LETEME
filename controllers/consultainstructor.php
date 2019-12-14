<?php



class Consultainstructor extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $instructor = $this->view->datos = $this->model->get();
        $this->view->instructor = $instructor;
        $this->view->render('consultainstructor/index');
    }

    function verInstructor($param = null){
        $idInstructor = $param[0];
        $instructor = $this->model->getById($idInstructor);

        session_start();
        $_SESSION["id_verInstructor"] = $instructor->dao_documento;

        $this->view->instructor = $instructor;
        $this->view->render('consultainstructor/detalle');
    }

    function actualizarInstructor($param = null){
        session_start();
        $id = $_SESSION["id_verInstructor"];
        unset($_SESSION['id_verInstructor']);

        if($this->model->update($_POST)){
            $instructor = new Instructor();
            $instructor->dao_documento = $id;
            $instructor->dao_inombres = $_POST['frm_inombres'];
            $instructor->dao_iapellidos = $_POST['frm_iapellidos'];
            $instructor->dao_iemail = $_POST['frm_iemail'];
            $instructor->dao_whatsapp = $_POST['frm_whatsapp'];
            $instructor->dao_itelefono = $_POST['frm_itelefono'];
        
            $this->view->instructor = $instructor;
            $this->view->mensaje = "Instructor actualizado correctamente";
        }else{
            $this->view->mensaje = "No se pudo actualizar el instructor";
        }
        $this->view->render('consultainstructor/detalle');
    }

    function eliminarInstructor($param = null){
        $id = $param[0];

        if($this->model->delete($id)){
            $mensaje ="Instructor eliminado correctamente";
            //$this->view->mensaje = "Alumno eliminado correctamente";
        }else{
            $mensaje = "No se pudo eliminar el instructor";
            //$this->view->mensaje = "No se pudo eliminar al alumno";
        }

        //$this->render();

        echo $mensaje;
    }

    
}

?>