<?php
class User{
    private $name;
    private $lastname;
    private $password;
    private $birthday;
    private $email;

    public function __construct($name,$lastname,$email, $password, $birthday)
    {
        $this.$this->setBirthday($birthday);
        $this->setEmail($email);
        $this->setLastname($lastname);
        $this->setName($name);
        $this->setPassword($password);
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}