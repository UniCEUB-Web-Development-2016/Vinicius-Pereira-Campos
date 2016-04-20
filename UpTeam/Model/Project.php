<?php

/**
 * Created by PhpStorm.
 * User: vpcam
 * Date: 13/04/2016
 * Time: 21:04
 */
class Project
{
    private $name;
    private $team;
    private $createdOn;
    private $estimatedDeadline;
    private $description;

    public function __construct($name, $team, $createdOn, $estimatedDeadline, $description)
    {
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