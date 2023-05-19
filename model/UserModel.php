<?php

class UserModel extends Model
{

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
