<?php

class Team
{
    private $Name;

    public function __construct($name)
    {
        $this->setName($name);
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function getName()
    {
        return $this->Name;
    }

}