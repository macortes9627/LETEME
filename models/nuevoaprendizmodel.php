<?php

include_once 'models/ficha.php';

class NuevoaprendizModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){

        // insertar

        $sentenceSQL="INSERT INTO aprendiz (documento,ficha_nroficha,nombres,apellidos,email,fecha_exp_documento,lugar_exp_documento,fecha_nacimiento,lugar_nacimiento,direccion,celular,whatsapp,eps,rh,acudiente,celular_acudiente,tipo_documento_id,estilos_aprendizaje) VALUES(:db_documento,:db_ficha_nroficha, :db_nombres,:db_apellidos,:db_email,:db_fecha_exp_documento,:db_lugar_exp_documento,:db_fecha_nacimiento,:db_lugar_nacimiento,:db_direccion,:db_celular,:db_whatsapp,:db_eps,:db_rh,:db_acudiente,:db_celular_acudiente,:db_tipo_documento_id,:db_estilos_aprendizaje)";
        $connexionDB=$this->db->connect();
        $query = $connexionDB->prepare($sentenceSQL);


        
        try{
            $query->execute([
                'db_documento'=>$datos['frm_documento'],
                'db_ficha_nroficha'=>$datos['frm_ficha_nroficha'],
                'db_nombres'=>$datos['frm_nombres'],
                'db_apellidos'=>$datos['frm_apellidos'],
                'db_email'=>$datos['frm_email'],
                'db_fecha_exp_documento'=>$datos['frm_fecha_exp_documento'],
                'db_lugar_exp_documento'=>$datos['frm_lugar_exp_documento'],
                'db_fecha_nacimiento'=>$datos['frm_fecha_nacimiento'],
                'db_lugar_nacimiento'=>$datos['frm_lugar_nacimiento'],
                'db_direccion'=>$datos['frm_direccion'],
                'db_celular'=>$datos['frm_celular'],
                'db_whatsapp'=>$datos['frm_whatsapp'],
                'db_eps'=>$datos['frm_eps'],
                'db_rh'=>$datos['frm_rh'],
                'db_acudiente'=>$datos['frm_acudiente'],
                'db_celular_acudiente'=>$datos['frm_celular_acudiente'],
                'db_tipo_documento_id'=>$datos['frm_tipo_documento_id'],
                'db_estilos_aprendizaje'=>$datos['frm_estilos_aprendizaje']
            ]);
            return true;
        }catch(PDOException $e){
           if(constant("DEBUG")){
                echo $e->getMessage();
           }
            
            return false;
        }
        
        
    }

    public function read(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM ficha');
            
            while($row = $query->fetch()){
                $item = new FichaDAO();
                $item->nroficha = $row['nroficha'];
                $item->programa    = $row['programa'];
                $item->fecha_ingreso  = $row['fecha_ingreso'];
                $item->fecha_fin_lectiva  = $row['fecha_fin_lectiva'];
                $item->fecha_fin_practica  = $row['fecha_fin_practica'];
              
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
           if(constant("DEBUG")){
               echo $e->getMessage();
           }
            return [];
        }
    }

}

?>