<?php

class Task
{
    private $id;
    private $name;
    private $description;
    private $estimate;
    private $difficulty;
    private $owner;
    private $createdBy;
    private $state;
    private $project;
    private $createdOn;

    public function __construct($id, $name, $description, $estimate, $difficulty, $owner, $createdby, $state, $project, $createdOn)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setDescription($description);
        $this->setEstimate($estimate);
        $this->setDifficulty($difficulty);
        $this->setOwner($owner);
        $this->setCreatedBy($createdby);
        $this->setState($state);
        $this->setProject($project);
        $this->setCreatedOn($createdOn);

    }

    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }

    public function setEstimate($estimate)
    {
        $this->estimate = $estimate;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    public function setProject($project)
    {
        $this->project = $project;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDifficulty()
    {
        return $this->difficulty;
    }

    public function getEstimate()
    {
        return $this->estimate;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getProject()
    {
        return $this->project;
    }

    public function getState()
    {
        return $this->state;
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