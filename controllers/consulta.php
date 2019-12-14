<?php

require_once 'models/fichamodel.php';

class Consulta extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $aprendiz = $this->view->datos = $this->model->get();
        $this->view->aprendiz = $aprendiz;
        $this->view->render('consulta/index');
    }

    function verAprendiz($param = null){
        $idAprendiz = $param[0];
        $aprendiz = $this->model->getById($idAprendiz);
        $modeloFichas = new FichaModel();
        $this->view->fichas =$modeloFichas->read();

        session_start();
        $_SESSION["id_verAprendiz"] = $aprendiz->dao_documento;

        $this->view->aprendiz = $aprendiz;
        $this->view->render('consulta/detalle');
    }

    function actualizarAprendiz($param = null){
        session_start();
       
        //if (isset($_SESSION["id_verAprendiz"]))
             $id = $_SESSION["id_verAprendiz"];
        unset($_SESSION['id_verAprendiz']);
     
        if($this->model->update($_POST)){
            $aprendiz = new aprendiz();
            $aprendiz->dao_documento = $id;
            $aprendiz->dao_ficha_nroficha = $_POST['frm_ficha_nroficha'];
            $aprendiz->dao_nombres = $_POST['frm_nombres'];
            $aprendiz->dao_apellidos = $_POST['frm_apellidos'];
            $aprendiz->dao_email = $_POST['frm_email'];
            $aprendiz->dao_fecha_exp_documento = $_POST['frm_fecha_exp_documento'];
            $aprendiz->dao_lugar_exp_documento = $_POST['frm_lugar_exp_documento'];
            $aprendiz->dao_fecha_nacimiento = $_POST['frm_fecha_nacimiento'];
            $aprendiz->dao_lugar_nacimiento = $_POST['frm_lugar_nacimiento'];
            $aprendiz->dao_direccion = $_POST['frm_direccion'];
            $aprendiz->dao_celular = $_POST['frm_celular'];
            $aprendiz->dao_whatsapp = $_POST['frm_whatsapp'];
            $aprendiz->dao_eps = $_POST['frm_eps'];
            $aprendiz->dao_rh = $_POST['frm_rh'];
            $aprendiz->dao_acudiente = $_POST['frm_acudiente'];
            $aprendiz->dao_celular_acudiente = $_POST['frm_celular_acudiente'];
            $aprendiz->dao_tipo_documento_id = $_POST['frm_tipo_documento_id'];
            $aprendiz->dao_estilos_aprendizaje = $_POST['frm_estilos_aprendizaje'];


            $this->view->aprendiz = $aprendiz;
            $this->view->mensaje = "Aprendiz actualizado correctamente";
        }else{
            $this->view->mensaje = "No se pudo actualizar al aprendiz";
        }
        $this->view->render('consulta/detalle');
    }

    function eliminar($param = null){
        $id = $param[0];

        if($this->model->delete($id)){
            $mensaje ="Aprendiz eliminado correctamente";
            //$this->view->mensaje = "aprendiz eliminado correctamente";
        }else{
            $mensaje = "No se pudo eliminar al aprendiz";
            //$this->view->mensaje = "No se pudo eliminar al aprendiz";
        }

        //$this->render();

        echo $mensaje;
    }

    
}

?>