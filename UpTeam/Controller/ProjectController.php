<?php
include_once "Model/Project.php";
class ProjectController
{
    private $TeamParams = ["id","name","team","createdOn", "estimatedDeadline", "description"];
    public function register($request)
    {
        $params = $request->getParams();
        if($this->isValid($params)) {
            $project = new Project ($params["id"],
                $params["name"],
                $params["team"],
                $params["createdOn"],
                $params["estimatedDeadline"],
                $params["description"]
            );

            $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
            $conn = $db->connect();
            return $conn->query($this->generateInsertQuery($project));
        }
        else{
            return "Error 404";
        }
    }
    public function search($request)
    {
        $params = $request->getParams();
        $crit = $this->generateCriteria($params);
        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        $result = $conn->query("SELECT name, team, createdOn, estimatedDeadline, description from Project Where " . $crit);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function update($request)
    {
        $params = $request->getParams();
        $project = new Project ($params["id"],
            $params["name"],
            $params["team"],
            $params["createdOn"],
            $params["estimatedDeadline"],
            $params["description"]
        );

        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        return $conn->query("UPDATE Project SET name ='" . $project->getName()
            . "', team = '". $project->getTeam()
            . "', createdOn = '" . $project->getCreatedOn()
            . "', estimatedDeadline = '" . $project->getEstimatedDeadline()
            . "', description = '" . $project->getDescription()
            . "'Where id = '" . $project->getId() . "'");

    }
    public function delete($request)
    {
        $params = $request->getParams();
        $project = new Project ($params["id"],
            $params["name"],
            $params["team"],
            $params["createdOn"],
            $params["estimatedDeadline"],
            $params["description"]
        );
        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        return $conn->query("UPDATE Project SET active = 1 Where id = '" . $project->getId() . "'");
    }
    private function generateInsertQuery($project)
    {
        $query =  "INSERT INTO Project (name, team, createdOn, estimatedDeadline, description) VALUES ('".
            $project->getName()."','".
            $project->getTeam()."','".
            $project->getCreatedOn()."','".
            $project->getEstimatedDeadline()."','".
            $project->getDescription()."')";
        return $query;
    }
    private function generateCriteria($params)
    {
        $criteria = "";
        foreach($params as $key => $value)
        {
            $criteria = $criteria . $key." LIKE '%".$value."%' OR ";
        }
        return substr($criteria, 0, -4);
    }
    private function isValid($params){
        $keys = array_keys($params);
        $diff = array_intersect($keys, $this->TeamParams);
        if (count($diff) == count($params)){
            return true;
        }
        return false;
    }
}