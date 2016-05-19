<?php
include_once "Model/Project.php";
class ProjectController
{
    private $ProjectParams = ["id", "name", "team", "createdOn", "estimatedDeadline", "description"];
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->taskSQLFactory = new SQLFactory("Task", $this->ProjectParams);
    }

    public function register($params)
    {
        $params = $request->getParams();
        if ($this->isValid($params)) {
            return $this->conn->query($this->generateInsertQuery($params));
        }
        else {
            return "Error 404";
        }
    }

    public function search($params)
    {
        $result = $conn->query("SELECT name, team, createdOn, estimatedDeadline, description from Project Where ".$crit);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function update($params)
    {
        return $conn->query("UPDATE Project SET name ='".$project->getName()
            . "', team = '".$project->getTeam()
            . "', createdOn = '".$project->getCreatedOn()
            . "', estimatedDeadline = '".$project->getEstimatedDeadline()
            . "', description = '".$project->getDescription()
            . "'Where id = '".$project->getId()."'");
    }

    public function delete($request)
    {
        return $conn->query($this->taskSQLFactory->generateDelete($params["id"]));
    }

    private function isValid($params) {
        $keys = array_keys($params);
        $diff = array_intersect($keys, $this->ProjectParams);
        if (count($diff) == count($params)) {
            return true;
        }
        return false;
    }
}