<?php
include "RequestController.php";
include "ResourceController.php";
include_once "Util/DBConnector.php";

class ControlManager
{
    private $resourceController;
    private $requestController;
    private $conn;

    public function __construct()
    {
        $this->resourceController = new ResourceController();
        $this->requestController = new RequestController();
        $this->conn = $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $this->conn = $db->connect();
    }

    public function getResource()
    {
        $request = $this->requestController->createRequest(
            $_SERVER["REQUEST_METHOD"], 
            $_SERVER["REQUEST_URI"], 
            $_SERVER["SERVER_ADDR"], 
            $_SERVER["SERVER_PROTOCOL"]);
        $params = $request->getParams();
        return $this->routeMethod($request, $params);
    }

    /**
     * @param Request $request
     */
    public function routeMethod($request, $params) {
        switch ($request->getMethod()) {
            case "GET":
                return $this->resourceController->searchResource($request, $this->conn, $params);
                break;
            case "POST":
                return $this->resourceController->createResource($request, $this->conn, $params);
                break;
            case "PUT":
                return $this->resourceController->updateResource($request, $this->conn, $params);
                break;
            case "DELETE":
                return $this->resourceController->deleteResource($request, $this->conn, $params);
                break;
            default:
                return "Erro 404";
                break;
        }
    }
}