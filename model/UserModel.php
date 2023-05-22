<?php

class UserModel extends Model
{
    public function register(User $user)
    {
        $username = $user->getUsername();
        $password = $user->getPassword();
        $mail = $user->getMail();


        $req = $this->getDb()->prepare("INSERT INTO `user` (`password`, `username`, `mail`) VALUES (:password, :username, :mail)");
        $req->bindValue(":password", $password, PDO::PARAM_STR);
        $req->bindValue(":username", $username, PDO::PARAM_STR);
        $req->bindValue(":mail", $mail, PDO::PARAM_STR);
        $req->execute();

        $req->closeCursor();
    }

    public function getUserByUsername($username)
    {
        $req = $this->getDb()->prepare('SELECT  `username`,`password` FROM `user`  WHERE `username` = :username');
        $req->bindParam('username', $username, PDO::PARAM_STR);
        $user = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        if ($user) {
            return new User([
                'username' => $user['username']

            ]);
        }

        return null;
    }
}
