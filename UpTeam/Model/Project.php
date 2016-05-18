<?php

/**
 * Created by PhpStorm.
 * User: vpcam
 * Date: 13/04/2016
 * Time: 21:04
 */
class Project
{
    private $id;
    private $name;
    private $team;
    private $createdOn;
    private $estimatedDeadline;
    private $description;

    public function __construct($id, $name, $team, $createdOn, $estimatedDeadline, $description)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setTeam($team);
        $this->setCreatedOn($createdOn);
        $this->setEstimatedDeadline($estimatedDeadline);
        $this->setDescription($description);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
    }

    public function setEstimatedDeadline($estimatedDeadline)
    {
        $this->estimatedDeadline = $estimatedDeadline;
    }

    public function setTeam($team)
    {
        $this->team = $team;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    public function getEstimatedDeadline()
    {
        return $this->estimatedDeadline;
    }

    public function getTeam()
    {
        return $this->team;
    }
    public function getDescription()
    {
        return $this->description;
    }

}