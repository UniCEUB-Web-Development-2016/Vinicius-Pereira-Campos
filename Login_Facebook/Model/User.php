<?php

class User
{
    private $Name;
    private $LastName;
    private $password;
    private $email;
    private $birthday;
    private $gender;

    public function __construct($Nm, $LName,$PWD,$email, $bday, $gndr)
    {
        $this->birthday = $bday;
        $this->Name = $Nm;
        $this->LastName = $LName;
        $this->email = $email;
        $this->gender = $gndr;
        $this->password = $PWD;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getLastName()
    {
        return $this->LastName;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getPassword()
    {
        return $this->password;
    }

}