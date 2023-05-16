<?php
class User
{
    private $user_Id;
    private $username;
    private $mail;
    private $password;
    private $date_Of_Birth;


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
    public function getUser_Id()
    {
        return $this->user_Id;
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
        return $this->date_Of_Birth;
    }


    // **************************************************************SETTER*******************************************************************************

    /**
     * Set the value of userId
     *
     * @return  self
     */
    public function setUser_Id($user_Id)
    {
        $this->user_Id = $user_Id;

        return $this;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set the value of dateOfBirth
     *
     * @return  self
     */
    public function setDate_of_birth($date_Of_Birth)
    {
        $this->date_Of_Birth = $date_Of_Birth;

        return $this;
    }
}
