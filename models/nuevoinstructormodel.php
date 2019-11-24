<?php



class NuevoinstructorModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar

         $sentenceSQL="INSERT INTO instructor (documento, inombres, iapellidos, iemail, whatsapp ,itelefono ) VALUES(:db_documento, :db_inombres, :db_iapellidos, :db_iemail, :db_whatsapp,  :db_itelefono)";
        $connexionDB=$this->db->connect();
        $query = $connexionDB->prepare($sentenceSQL);
        
        try{
            $query->execute([
                            'db_documento' => $datos['frm_documento'],
                            'db_inombres' => $datos['frm_inombres'],
                            'db_iapellidos' => $datos['frm_iapellidos'],
                            'db_iemail' => $datos['frm_iemail'],
                            'db_whatsapp' => $datos['frm_whatsapp'],
                            'db_itelefono' => $datos['frm_itelefono']
                            
                            
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