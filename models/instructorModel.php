<?php

class InstructorModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar

        $sentenceSQL= "INSERT INTO instructor (documento,nombres,apellidos,email,celular,whatsapp)
         VALUES (:db_documento,:db_nombres,:db_apellidos,:db_email,:db_celular, :db_whatsapp)";
        $connexionDB=$this->db->connect();
        $query = $connexionDB->prepare($sentenceSQL);
        
        try{
            $query->execute([
                            
                            'db_documento' => $datos['frm_documento'],
                            'db_nombres' => $datos['frm_nombres'],
                            'db_apellidos' => $datos['frm_apellidos'],
                            'db_email'=> $datos['frm_email'],
                            'db_celular'=> $datos['frm_celular'],
                            'db_whatsapp'=> $datos['frm_whatsapp'],
                            

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
            $query = $this->db->connect()->query('SELECT * FROM instructor');
            
            while($row = $query->fetch()){
                $item = new instructor();
                
                $item->dao_documento = $row['documento'];
                $item->dao_nombres = $row['nombres'];
                $item->dao_apellidos = $row['apellidos'];
                $item->dao_email = $row['email'];
                $item->dao_celular = $row['celular'];
                $item->dao_whatsapp= $row['whatsapp']; 
                
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
        $query = $this->db->connect()->prepare('DELETE FROM instructor WHERE documento = :id');
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