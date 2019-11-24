<?php

require 'models/instructor.php';

class ConsultainstructorModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM instructor');
            
            while($row = $query->fetch()){
                $item = new Instructor();
                $item->dao_documento = $row['documento'];
                $item->dao_inombres    = $row['inombres'];
                $item->dao_iapellidos  = $row['iapellidos'];
                $item->dao_iemail  = $row['iemail'];
                $item->dao_whatsapp  = $row['whatsapp'];
                $item->dao_itelefono  = $row['itelefono'];
                
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
        $item = new Instructor();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM instructor WHERE documento = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                
            
                $item->dao_documento = $row['documento'];
                $item->dao_inombres    = $row['inombres'];
                $item->dao_iapellidos  = $row['iapellidos'];
                $item->dao_iemail  = $row['iemail'];
                $item->dao_whatsapp  = $row['whatsapp'];
                $item->dao_itelefono  = $row['itelefono'];
             
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
        $query = $this->db->connect()->prepare('UPDATE instructor SET inombres = :nombres, iapellidos = :iapellidos, iemail = :iemail, whatsapp = :whatsapp, itelefono=:itelefono WHERE documento = :documento');
        try{
            $query->execute([
                'documento' => $item['frm_documento'],
                'nombres' => $item['frm_inombres'],
                'iapellidos' => $item['frm_iapellidos'],
                'iemail' => $item['frm_iemail'],
                'whatsapp' => $item['frm_whatsapp'],
                'itelefono' => $item['frm_itelefono']
                
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