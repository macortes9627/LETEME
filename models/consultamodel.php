<?php

require 'models/alumno.php';

class ConsultaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM alumnos');
            
            while($row = $query->fetch()){
                $item = new Alumno();
                $item->dao_identificacion = $row['identificacion'];
                $item->dao_nombres    = $row['nombres'];
                $item->dao_apellidos  = $row['apellidos'];
                $item->dao_telefono  = $row['telefono'];
                $item->dao_email  = $row['email'];
                $item->dao_contrasena  = $row['clave'];
                $item->dao_creacion  = $row['creacion'];
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
        $item = new Alumno();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM alumnos WHERE identificacion = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                
            
                $item->dao_identificacion = $row['identificacion'];
                $item->dao_nombres    = $row['nombres'];
                $item->dao_apellidos  = $row['apellidos'];
                $item->dao_telefono  = $row['telefono'];
                $item->dao_email  = $row['email'];
                $item->dao_contrasena  = $row['clave'];
                $item->dao_creacion  = $row['creacion'];
             
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
        $query = $this->db->connect()->prepare('UPDATE alumnos SET nombres = :nombres, apellidos = :apellidos, email = :email, telefono=:telefono WHERE identificacion = :identificacion');
        try{
            $query->execute([
                'identificacion' => $item['frm_identificacion'],
                'nombres' => $item['frm_nombres'],
                'apellidos' => $item['frm_apellidos'],
                'telefono' => $item['frm_telefono'],
                'email' => $item['frm_email']
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
        $query = $this->db->connect()->prepare('DELETE FROM alumnos WHERE identificacion = :id');
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