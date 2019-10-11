<?php



class NuevoModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar

         $sentenceSQL="INSERT INTO alumnos (identificacion, nombres, apellidos, telefono, email, clave) VALUES(:db_identificacion, :db_nombres, :db_apellidos, :db_telefono, :db_email, :db_contrasena)";
        $connexionDB=$this->db->connect();
        $query = $connexionDB->prepare($sentenceSQL);
        
        try{
            $query->execute([
                            'db_identificacion' => $datos['frm_identificacion'],
                            'db_nombres' => $datos['frm_nombres'],
                            'db_apellidos' => $datos['frm_apellidos'],
                            'db_telefono' => $datos['frm_telefono'],
                            'db_email' => $datos['frm_email'],
                            'db_contrasena' => $datos['frm_contrasena']
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