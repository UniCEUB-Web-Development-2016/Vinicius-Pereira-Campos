<?php

/**
 * Created by PhpStorm.
 * User: vpcam
 * Date: 22/06/2016
 * Time: 23:54
 */
class RolesController
{
    private $RolesParams = ["id", "Role"];
    private $conn;
    private $rolesSQLFactory;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->rolesSQLFactory = new SQLFactory("Roles", $this->RolesParams, $conn);
    }

    public function search($params)
    {
        switch (count($params)) {
            case 0:
                $result = $this->conn->query($this->rolesSQLFactory->generateSelectAll());
                return $result->fetchAll(PDO::FETCH_ASSOC);
                break;

            case 1:
                $result = $this->conn->query($this->rolesSQLFactory->generateSelectById($params["id"]));
                return $result->fetch(PDO::FETCH_ASSOC);
                break;

        }
    }
}