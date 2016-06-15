<?php

/**
 * Created by PhpStorm.
 * User: vpcam
 * Date: 14/06/2016
 * Time: 18:54
 */
class StateController
{
    private $StateParams = ["id", "State"];
    private $conn;
    private $stateSQLFactory;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->stateSQLFactory = new SQLFactory("State", $this->StateParams);
    }

    public function search($params)
    {
        switch (count($params)) {
            case 0:
                $result = $this->conn->query($this->stateSQLFactory->generateSelectAll());
                return $result->fetchAll(PDO::FETCH_ASSOC);
                break;

            case 1:
                $result = $this->conn->query($this->stateSQLFactory->generateSelectById($params["id"]));
                return $result->fetch(PDO::FETCH_ASSOC);
                break;

        }
    }
}