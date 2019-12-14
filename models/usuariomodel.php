<?php
include_once('models/usuario.php');
class UsuarioModel extends Model{
    function __construct(){
        parent::__construct();
    }

    public function create($datos = null){
        // insertar
        //if(!isset($datos)){
            $sentenceSQL="INSERT INTO usuario( username, email, passwordd, create_time) VALUES( :username, :email, :passwordd, :create_time)";
            $connexionDB=$this->db->connect();
            $query = $connexionDB->prepare($sentenceSQL);
            
            try{
                $query->execute([
                                'username' => $datos['frm_username'],
                                'email' => $datos['frm_email'],
                                'passwordd' => $datos['frm_passwordd'],
                                'create_time' => $datos['frm_create_time']
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
            $query = $this->db->connect()->query('SELECT * FROM usuario');
            
            while($row = $query->fetch()){
                $item = new UsuarioDAO();
                $item->username = $row['username'];
                $item->email    = $row['email'];
                $item->passwordd  = $row['passwordd'];
                $item->create_time  = $row['create_time'];
              
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
        $item = new UsuarioDAO();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM usuario WHERE username = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                $item->dao_username = $row['username'];
                $item->dao_email    = $row['email'];
                $item->dao_passwordd  = $row['passwordd'];
                $item->dao_create_time  = $row['create_time'];
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
        $query = $this->db->connect()->prepare('UPDATE usuario SET email = :email, passwordd = :passwordd, create_time = :create_time WHERE username = :username');
        try{
            $query->execute([
                'username' => $item['frm_username'],
                'email' => $item['frm_email'],
                'passwordd' => $item['frm_passwordd'],
                'create_time' => $item['frm_create_time']
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
        $query = $this->db->connect()->prepare('DELETE FROM usuario WHERE username = :id');
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