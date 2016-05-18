<?php

class Team
{
    private $id;
    private $Name;
    private $createdBy;
    private $createdOn;

    public function __construct($id, $name, $createdBy, $createdOn)
    {
            $this->setId($id);
            $this->setName($name);
            $this->setCreatedBy($createdBy);
            $this->setCreatedOn($createdOn);
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->Name;
    }
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
    public function getCreatedOn()
    {
        return $this->createdOn;
    }
    public function getId()
    {
        return $this->id;
    }

}