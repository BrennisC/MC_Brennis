<?php
class User
{
    private $username;
    private $password;
    private $perfil;
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }
}
