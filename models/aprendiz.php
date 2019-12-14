<?php

class Aprendiz{
    public $dao_documento;
    public $dao_ficha_nroficha;
    public $dao_nombres;
    public $dao_apellidos;
    public $dao_email;
    public $dao_fecha_exp_documento;
    public $dao_lugar_exp_documento;
    public $dao_fecha_nacimiento;
    public $dao_lugar_nacimiento;
    public $dao_direccion;
    public $dao_celular;
    public $dao_whatsapp;
    public $dao_eps;
    public $dao_rh;
    public $dao_acudiente;
    public $dao_celular_acudiente;
    public $dao_tipo_documento_id;
    public $dao_estilos_aprendizaje;

    public function get_numero_ficha()
    {
        $fichaModelo = new FichaModel();
        $fichaModelo = $fichaModelo->readById($this->dao_ficha_nroficha);

        if (empty($fichaModelo))
            return "No asignado";
        
        return $fichaModelo->nroficha . " - " . $fichaModelo->programa;
    }
}

?>