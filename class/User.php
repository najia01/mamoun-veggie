<?php
class User
{
    private $user_id;
    private $username;
    private $mail;
    private $password;
    private $date_of_birth;


    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }

    private function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    // **************************************************GETTER AND SETTER*******************************************************************************

    // *********************************************************GETTER**********************************************************************************
    /**
     * Get the value of userId
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of dateOfBirth
     */
    public function getDate_of_birth()
    {
        return $this->date_of_birth;
    }


    // **************************************************************SETTER*******************************************************************************

    /**
     * Set the value of userId
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Set the value of dateOfBirth
     *
     * @return  self
     */
    public function setDate_of_birth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }
}
