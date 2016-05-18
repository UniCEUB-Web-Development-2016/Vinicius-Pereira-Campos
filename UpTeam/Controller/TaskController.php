<?php
include "Model/Task.php";
include "Model/IEntitiesController.php";

class TaskController /*implements IEntitiesController*/
{
    private $TeamParams = ["id", "name", "description", "estimate", "difficulty", "owner", "createdBy", "state", "project", "createdOn"];

    public function register($request)
    {
        $params = $request->getParams();
        if ($this->isValid($params)) {
            $task = new Task ($params["id"],
                $params["name"],
                $params["description"],
                $params["estimate"],
                $params["difficulty"],
                $params["owner"],
                $params["createdBy"],
                $params["state"],
                $params["project"],
                $params["createdOn"]
            );

            $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
            $conn = $db->connect();
            var_dump($this->generateInsertQuery($task));
            return $conn->query($this->generateInsertQuery($task));
        } else {
            return "Error 404";
        }
    }

    public function search($request)
    {
        $params = $request->getParams();
        $crit = $this->generateCriteria($params);
        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        $result = $conn->query("SELECT name, description, estimate, difficulty, owner, createdBy state, project, createdOn from Task Where " . $crit);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function update($request)
    {
        $params = $request->getParams();
        $task = new Task ($params["id"],
            $params["name"],
            $params["description"],
            $params["estimate"],
            $params["difficulty"],
            $params["owner"],
            $params["createdBy"],
            $params["state"],
            $params["project"],
            $params["createdOn"]
        );

        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        return $conn->query("UPDATE Task SET name ='" . $task->getName()
            . "', description = '" . $task->getDescription()
            . "', estimate = '" . $task->getEstimate()
            . "', difficulty = '" . $task->getDifficulty()
            . "', owner = '" . $task->getOwner()
            . "', createdBy = '" . $task->getCreatedBy()
            . "', state = '" . $task->getState()
            . "', project = '" . $task->getProject()
            . "', createdOn = '" . $task->getCreatedOn()
            . "'Where id = '" . $task->getId() . "'");

    }

    public function delete($request)
    {
        $params = $request->getParams();
        $task = new Task ($params["id"],
            $params["name"],
            $params["description"],
            $params["estimate"],
            $params["difficulty"],
            $params["owner"],
            $params["createdBy"],
            $params["state"],
            $params["project"],
            $params["createdOn"]
        );
        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        return $conn->query("UPDATE Task SET active = 1 Where id = '" . $task->getId() . "'");
    }

    private function generateInsertQuery($task)
    {
        $query = "INSERT INTO Task (name, description, estimate, difficulty, owner, createdBy, state, project, createdOn) VALUES ('" .
            $task->getName() . "','" .
            $task->getDescription() . "','" .
            $task->getEstimate() . "','" .
            $task->getDifficulty() . "','" .
            $task->getOwner() . "','" .
            $task->getCreatedBy() . "','" .
            $task->getState() . "','" .
            $task->getProject() . "','" .
            $task->getCreatedOn() . "')";
        return $query;
    }

    private function generateCriteria($params)
    {
        $criteria = "";
        foreach ($params as $key => $value) {
            $criteria = $criteria . $key . " LIKE '%" . $value . "%' OR ";
        }
        return substr($criteria, 0, -4);
    }

    private function isValid($params)
    {
        $keys = array_keys($params);
        $diff = array_intersect($keys, $this->TeamParams);
        if (count($diff) == count($params)) {
            return true;
        }
        return false;
    }
}