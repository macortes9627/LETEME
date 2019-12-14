<!--Mario alberto cortes
version_001
fecha: 06-11-2019
desarrollo: PHP Y HTML
-->

<?php
include_once 'models/aprendiz.php'; //informacion aprendiz
include_once 'models/instructor.php'; //informacion de ficha
class Control_asistenciaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar

        $sentenceSQL= "INSERT INTO control_asistencia (aprendiz_documento,instructor_documento,fecha,excusa,asistio)
         VALUES (:db_aprendiz_documento,:db_instructor_documento,:db_fecha,:db_excusa,:db_asistio)";
        $connexionDB=$this->db->connect();
        $query = $connexionDB->prepare($sentenceSQL);
        
        try{
            $query->execute([
                            'db_aprendiz_documento' => $datos['frm_aprendiz_documento'],
                            'db_instructor_documento' => $datos['frm_instructor_documento'],
                            'db_fecha' => $datos['frm_fecha'],
                            'db_excusa' => $datos['frm_excusa'],
                            'db_asistio'=> $datos['frm_asistio']
                            
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
            $query = $this->db->connect()->query('SELECT * FROM control_asistencia');
            
            while($row = $query->fetch()){
                $item = new control_asistencia();
                $item->dao_aprendiz_documento = $row['aprendiz_documento'];
                $item->dao_instructor_documento = $row['instructor_documento'];
                $item->dao_fecha = $row['fecha'];
                $item->dao_excusa = $row['excusa'];
                $item->dao_asistio = $row['asistio'];
                
              
                
                
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

    //informacion alumno
    public function getaprendi(){
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
                $item->dao_celular = $row['celular'];
                $item->dao_whatsapp= $row['whatsapp']; 
                $item->dao_eps= $row['eps']; 
                $item->dao_rh= $row['rh']; 
                $item->dao_acudiente= $row['acudiente']; 
                $item->dao_celular_acudiente= $row['celular_acudiente']; 
                $item->dao_estilos_aprendizaje= $row['estilos_aprendizaje']; 
                $item->dao_estilos_aprendizaje= $row['ficha_nroficha']; 
              
                
                
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


//selecciona las instructor
public function getinstruc(){
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






}




?>