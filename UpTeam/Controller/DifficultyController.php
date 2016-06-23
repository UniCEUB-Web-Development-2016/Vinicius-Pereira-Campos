<?php

/**
 * Created by PhpStorm.
 * User: vpcam
 * Date: 14/06/2016
 * Time: 18:54
 */


class DifficultyController
{
    private $DifficultyParams = ["id", "Difficulty"];
    private $conn;
    private $difficultySQLFactory;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->difficultySQLFactory = new SQLFactory("Difficulty", $this->DifficultyParams, $conn);
    }


    public function search($params)
    {
        switch (count($params)) {
            case 0:
                $result = $this->conn->query($this->difficultySQLFactory->generateSelectAll());
                return $result->fetchAll(PDO::FETCH_ASSOC);
                break;

            case 1:
                $result = $this->conn->query($this->difficultySQLFactory->generateSelectById($params["id"]));
                return $result->fetch(PDO::FETCH_ASSOC);
                break;

        }
    }
}