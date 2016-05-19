<?php
include "Model/Task.php";
include "Model/IEntitiesController.php";

class TaskController /*implements IEntitiesController*/
{
    private $TeamParams = ["id", "name", "description", "estimate", "difficulty", "owner", "createdBy", "state", "project", "createdOn"];
    private $conn;
    private $taskSQLFactory;
    public function __construct()
    {
        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $this->conn = $db->connect();
        $this->taskSQLFactory = new SQLFactory("Task", $this->TeamParams);
    }

    public function register($request)
    {
        $params = $request->getParams();
        /*if ($this->isValid($params)) {
           */
        return $this->conn->query($this->taskSQLFactory->generateInsert($params));
        /*} else {
            return "Error 404";
        }*/
    }

    public function search($request)
    {
        $params = $request->getParams();
        $result = $this->conn->query($this->taskSQLFactory->generateSelect($params));
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function update($request)
    {
        $params = $request->getParams();


        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        return $this->conn->query($this->taskSQLFactory->generateUpdate($params), $params["id"]);

    }

    public function delete($request)
    {
        $params = $request->getParams();
        $task = new Task($params["id"],
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

    private function generateCriteria($params)
    {
        $criteria = "";
        foreach ($params as $key => $value) {
            $criteria = $criteria.$key." LIKE '%".$value."%' OR ";
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