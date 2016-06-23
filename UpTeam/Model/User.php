<?php


class User
{
    private $name;
    private $cpf;
    private $lastName;
    private $password;
    private $email;
    private $role;
    private $birthday;
    private $experience;
    private $alias;
    private $trophies;
    private $level;
    private $active;

    public function __construct($name, $lastName, $password, $email, $role, $birthday, $experience, $alias, $trophies, $level, $cpf)
    {
        $this->setName($name);
        $this->setCpf($cpf);
        $this->setLastName($lastName);
        $this->setPassword($password);
        $this->setEmail($email);
        $this->setRole($role);
        $this->setBirthday($birthday);
        $this->setExperience($experience);
        $this->setAlias($alias);
        $this->setTrophies($trophies);
        $this->setLevel($level);


    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setTrophies($trophies)
    {
        $this->trophies = $trophies;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getExperience()
    {
        return $this->experience;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getTrophies()
    {
        return $this->trophies;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getActive()
    {
        return $this->active;
    }

}