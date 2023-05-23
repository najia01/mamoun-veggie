<?php


class UserDashboard
{
    private $username;
    private $mail;

    public function getUsername() 
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }
}
