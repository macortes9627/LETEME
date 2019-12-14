<?php
include_once('models/resultado.php');
class ResultadoModel extends Model{
    function __construct(){
        parent::__construct();
    }

    public function create($datos = null){
        // insertar
        //if(!isset($datos)){
            $sentenceSQL="INSERT INTO resultado_aprendizaje( instructor_documento,nombre,horas_directas) VALUES( :instructor_documento, :nombre, :horas_directas)";
            $connexionDB=$this->db->connect();
            $query = $connexionDB->prepare($sentenceSQL);
            
            try{
                $query->execute([
                                'instructor_documento' => $datos['instructor_documento'],
                                'nombre' => $datos['nombre'],
                                'horas_directas' => $datos['horas_directas'],
                ]);
                return true;
            }catch(PDOException $e){
            if(constant("DEBUG")){
                    echo $e->getMessage();
            }
                
                return false;
            }
        // }else{
        //     return false;
        // }
        
        
    }
    public function read(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM resultado_aprendizaje');
            
            while($row = $query->fetch()){
                $item = new ResultadoDAO();
                $item->instructor_documento = $row['instructor_documento'];
                $item->nombre = $row['nombre'];
                $item->horas_directas = $row['horas_directas'];

              
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
    public function readById($id){
        $item = new ResultadoDAO();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM resultado_aprendizaje WHERE instructor_documento = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                $item->instructor_documento  = $row['instructor_documento'];
                $item->nombre  = $row['nombre'];
                $item->horas_directas  = $row['horas_directas'];

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
        $query = $this->db->connect()->prepare('UPDATE resultado_aprendizaje SET nombre = :nombre, horas_directas = :horas_directas WHERE instructor_documento = :instructor_documento');
        try{
            $query->execute([
                'instructor_documento' => $item['instructor_documento'],
                'nombre' => $item['nombre'],
                'horas_directas' => $item['horas_directas'],

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
        $query = $this->db->connect()->prepare('DELETE FROM resultado_aprendizaje WHERE instructor_documento = :id');
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