<?php

require 'models/aprendiz.php';

class ConsultaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM aprendiz');
            
            while($row = $query->fetch()){
                $item = new Aprendiz();
                $item->dao_documento = $row['documento'];
                $item->dao_ficha_nroficha = $row['ficha_nroficha'];
                $item->dao_nombres    = $row['nombres'];
                $item->dao_apellidos  = $row['apellidos'];
                $item->dao_email = $row['email'];
                $item->dao_fecha_exp_documento= $row['fecha_exp_documento'];
                $item->dao_lugar_exp_documento = $row['lugar_exp_documento'];
                $item->dao_fecha_nacimiento = $row['fecha_nacimiento'];
                $item->dao_lugar_nacimiento = $row['lugar_nacimiento'];
                $item->dao_direccion = $row['direccion'];
                $item->dao_celular = $row['celular'];
                $item->dao_whatsapp = $row['whatsapp'];
                $item->dao_eps = $row['eps'];
                $item->dao_rh = $row['rh'];
                $item->dao_acudiente = $row['acudiente'];
                $item->dao_celular_acudiente = $row['celular_acudiente'];
                $item->dao_tipo_documento_id = $row['tipo_documento_id'];
                $item->dao_estilos_aprendizaje = $row['estilos_aprendizaje'];

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

    public function getById($id){
        $item = new aprendiz();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM aprendiz WHERE documento = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                
            
                $item->dao_documento = $row['documento'];
                $item->dao_ficha_nroficha = $row['ficha_nroficha'];
                $item->dao_nombres    = $row['nombres'];
                $item->dao_apellidos  = $row['apellidos'];
                $item->dao_email = $row['email'];
                $item->dao_fecha_exp_documento = $row['fecha_exp_documento'];
                $item->dao_lugar_exp_documento = $row['lugar_exp_documento'];
                $item->dao_fecha_nacimiento = $row['fecha_nacimiento'];
                $item->dao_lugar_nacimiento = $row['lugar_nacimiento'];
                $item->dao_direccion = $row['direccion'];
                $item->dao_celular = $row['celular'];
                $item->dao_whatsapp = $row['whatsapp'];
                $item->dao_eps = $row['eps'];
                $item->dao_rh = $row['rh'];
                $item->dao_acudiente = $row['acudiente'];
                $item->dao_celular_acudiente = $row['celular_acudiente'];
                $item->dao_tipo_documento_id= $row['tipo_documento_id'];
                $item->dao_estilos_aprendizaje = $row['estilos_aprendizaje'];                
            }
            return $item;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return null;
        }
    }

    public function update($item){
        $query = $this->db->connect()->prepare('UPDATE aprendiz SET ficha_nroficha = :ficha_nroficha, nombres = :nombres, apellidos = :apellidos, email = :email, fecha_exp_documento = :fecha_exp_documento,lugar_exp_documento = :lugar_exp_documento,fecha_nacimiento = :fecha_nacimiento,lugar_nacimiento = :lugar_nacimiento,direccion = :direccion,celular = :celular,whatsapp = :whatsapp,eps = :eps,rh= :rh,acudiente = :acudiente,celular_acudiente = :celular_acudiente,tipo_documento_id = :tipo_documento_id,estilos_aprendizaje = :estilos_aprendizaje WHERE documento = :documento');
       
        try{
            $query->execute([
                'documento' => $item['frm_documento'], 
                'ficha_nroficha' => $item['frm_ficha_nroficha'],
                'nombres' => $item['frm_nombres'],
                'apellidos' => $item['frm_apellidos'],
                'email' => $item['frm_email'],
                'fecha_exp_documento' => $item['frm_fecha_exp_documento'],
                'lugar_exp_documento' => $item['frm_lugar_exp_documento'],
                'fecha_nacimiento' => $item['frm_fecha_nacimiento'],
                'lugar_nacimiento' => $item['frm_lugar_nacimiento'],
                'direccion' => $item['frm_direccion'],
                'celular' => $item['frm_celular'],
                'whatsapp' => $item['frm_whatsapp'],
                'eps' => $item['frm_eps'],
                'rh' => $item['frm_rh'],
                'acudiente' => $item['frm_acudiente'],
                'celular_acudiente' => $item['frm_celular_acudiente'],
                'tipo_documento_id' => $item['frm_tipo_documento_id'],
                'estilos_aprendizaje' => $item['frm_estilos_aprendizaje'],
            ]);
            return true;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare('DELETE FROM aprendiz WHERE documento = :id');
        try{
            $query->execute([
                'id' => $id
            ]);
            return true;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return false;
        }
    }
}
?>