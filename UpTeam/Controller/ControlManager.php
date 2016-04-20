<?php
include "RequestController.php";
include "ResourceController.php";

class ControlManager
{
    private $resourceController;
    private $requestController;

    public function __construct()
    {
        $this->resourceController = new ResourceController();
        $this->requestController = new RequestController();
    }

    public function getResource()
    {
        $request = $this->requestController->createRequest(
            $_SERVER["REQUEST_METHOD"], 
            $_SERVER["REQUEST_URI"], 
            $_SERVER["SERVER_ADDR"], 
            $_SERVER["SERVER_PROTOCOL"]);
        
        return $this->routeMethod($request);
    }
    public function routeMethod($request){
        switch($request->getMethod()){
            case "GET":
                break;
            case "POST":
                return $this->resourceController->createResource($request);
                break;
            case "PUT":
                break;
            case "DELETE":
                break;
            default:
                break;
        }
    }
}