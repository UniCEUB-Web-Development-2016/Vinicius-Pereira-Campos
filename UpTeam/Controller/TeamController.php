<?php
include_once "Model/Team.php";

class TeamController
{
    private $TeamParams = ["id", "name", "createdOn", "createdBy"];
    public function register($request)
    {
        $params = $request->getParams();
        if ($this->isValid($params)) {
            $team = new Team($params["id"],
                $params["name"],
                $params["createdBy"],
                $params["createdOn"]
            );

            $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
            $conn = $db->connect();
            return $conn->query($this->generateInsertQuery($team));
        }
        else {
            return "Error 404";
        }
    }
    public function search($request)
    {
        $params = $request->getParams();
        $crit = $this->generateCriteria($params);
        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        $result = $conn->query("SELECT name, createdOn, createdBy from team Where ".$crit);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function update($request)
    {
        $params = $request->getParams();
        var_dump($params);
        $team = new Team($params["id"],
            $params["name"],
            $params["createdBy"],
            $params["createdOn"]
        );
        var_dump($team);

        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        return $conn->query("UPDATE Team SET name ='" . $team->getName()
            . "', createdBy = '". $team->getCreatedBy()
            . "', createdOn = '" . $team->getCreatedOn()
            . "'Where id = '" . $team->getId() . "'");

    }
    public function delete($request)
    {
        $params = $request->getParams();
        $team = new Team ($params["id"],
            $params["name"],
            $params["createdOn"],
            $params["createdBy"]
        );
        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        return $conn->query("UPDATE Team SET active = 1 Where id = '" . $team->getId() . "'");
    }

    /**
     * @param Team $team
     */
    private function generateInsertQuery($team)
    {
        $query =  "INSERT INTO Team (name, createdBy, createdOn) VALUES ('".
            $team->getName()."','".
            $team->getCreatedBy()."','".
            $team->getCreatedOn()."')";
        return $query;
    }
    private function generateCriteria($params)
    {
        $criteria = "";
        foreach ($params as $key => $value)
        {
            $criteria = $criteria.$key." LIKE '%".$value."%' OR ";
        }
        return substr($criteria, 0, -4);
    }
    private function isValid($params) {
        $keys = array_keys($params);
        $diff = array_intersect($keys, $this->TeamParams);
        if (count($diff) == count($params)) {
            return true;
        }
        return false;
    }
}