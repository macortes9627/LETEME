<?php

include_once 'models/tipo_documento.php';
class AprendizModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar

        $sentenceSQL= "INSERT INTO aprendiz (tipo_documento_id,documento,nombres,apellidos,email,fecha_exp_documento,lugar_exp_documento,fecha_nacimiento,lugar_nacimiento, direccion, whatsapp, eps,rh,acudiente, celular_acudiente,estilos_aprendizaje)
         VALUES (:db_tipo_documento_id,:db_documento,:db_nombres,:db_apellidos,:db_email,:db_fecha_exp_documento,:db_lugar_exp_documento,:db_fecha_nacimiento,:db_lugar_nacimiento,:db_direccion, :db_whatsapp,:db_eps,:db_rh,:db_acudiente,:db_celular_acudiente,:db_estilos_aprendizaje)";
        $connexionDB=$this->db->connect();
        $query = $connexionDB->prepare($sentenceSQL);
        
        try{
            $query->execute([
                            'db_tipo_documento_id' => $datos['frm_tipo_documento_id'],
                            'db_documento' => $datos['frm_documento'],
                            'db_nombres' => $datos['frm_nombres'],
                            'db_apellidos' => $datos['frm_apellidos'],
                            'db_email'=> $datos['frm_email'],
                            'db_fecha_exp_documento'=> $datos['frm_fecha_exp_documento'],
                            'db_lugar_exp_documento'=> $datos['frm_lugar_exp_documento'],
                            'db_fecha_nacimiento'=> $datos['frm_fecha_nacimiento'],
                            'db_lugar_nacimiento'=> $datos['frm_lugar_nacimiento'],
                            'db_direccion'=> $datos['frm_direccion'],
                            'db_whatsapp'=> $datos['frm_whatsapp'],
                            'db_eps'=> $datos['frm_eps'],
                            'db_rh'=> $datos['frm_rh'],
                            'db_acudiente'=> $datos['frm_acudiente'],
                            'db_celular_acudiente'=> $datos['frm_celular_acudiente'],
                            'db_estilos_aprendizaje'=> $datos['frm_estilos_aprendizaje'],

            ]);
            return true;
        }catch(PDOException $e){
           if(constant("DEBUG")){
                echo $e->getMessage();
           }
            
            return false;
        }
        
        
    }
    public function get(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM aprendiz');
            
            while($row = $query->fetch()){
                $item = new aprendiz();
                $item->dao_tipo_documento_id = $row['tipo_documento_id'];
                $item->dao_documento = $row['documento'];
                $item->dao_nombres = $row['nombres'];
                $item->dao_apellidos = $row['apellidos'];
                $item->dao_email = $row['email'];
                $item->dao_fecha_exp_documento = $row['fecha_exp_documento'];
                $item->dao_lugar_exp_documento = $row['lugar_exp_documento'];
                $item->dao_fecha_nacimiento = $row['fecha_nacimiento'];
                $item->dao_lugar_nacimiento = $row['lugar_nacimiento'];
                $item->dao_direccion = $row['direccion'];
                $item->dao_whatsapp= $row['whatsapp']; 
                $item->dao_eps= $row['eps']; 
                $item->dao_rh= $row['rh']; 
                $item->dao_acudiente= $row['acudiente']; 
                $item->dao_celular_acudiente= $row['celular_acudiente']; 
                $item->dao_estilos_aprendizaje= $row['estilos_aprendizaje']; 
              
                
                
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
    public function gettipo_documen(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM tipo_documento');
            
            while($row = $query->fetch()){
                $item = new tipo_documento();
                $item->dao_id = $row['id'];
                $item->dao_descripcion = $row['descripcion'];
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
    

    public function delete($id){
        //echo "eliminar";
        $query = $this->db->connect()->prepare('DELETE FROM aprendiz WHERE tipo_documento_id = :id');
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