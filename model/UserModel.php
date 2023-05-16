<?php

class UserModel extends Model{

    public function getUser(int $user_id){
        $req = $this->getDb()->prepare('SELECT * FROM  `user` WHERE `user_id` = :id');
        $req->bindParam('id',$user_id,PDO::PARAM_INT);
        $req->execute();

        $user = new User($req->fetch(PDO::FETCH_ASSOC));
                       
        $req->closeCursor();
    
        return $user;
        
    }
}