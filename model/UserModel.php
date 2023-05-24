<?php

class UserModel extends Model
{
    public function getUserByUsername(String $username)
    {
        $req = $this->getDb()->prepare('SELECT  `username`,`password`,`mail`,`date_of_birth` FROM `user`  WHERE `username` = :username');
        
        $req->bindParam(':username', $username, PDO::PARAM_STR);
        $req->execute();

        return $req->rowCount() === 1 ? new User($req->fetch(PDO::FETCH_ASSOC)) : false ;
    }

    public function register (User $user){

        $username = $user->getUsername();
        $password = $user->getPassword();
        $mail = $user->getMail();
    
        $req = $this->getDb()->prepare('INSERT INTO `user` ( `password`, `username`, `mail`) VALUES (:password, :username, :mail)');
       
        }
    
}
    