<?php
include_once "Model/Request.php";
include_once "Controller/UserController.php";
include_once "Controller/TaskController.php";
include_once "Controller/TeamController.php";
include_once "Controller/ProjectController.php";

class ResourceController
{
    private $controlMap =
        [
            "team" => "TeamController",
            "user" => "UserController",
            "task" => "TaskController",
            "project" => "ProjectController"
        ];
    private function getController($resource) {
        return $this->controlMap[strtolower($resource)];
    }
    public function createResource($request, $conn, $params)
    {
        $class = new ReflectionClass($this->getController($request->getResource()));
        $resource = $class->newInstance($conn);
        return $resource->register($params);
    }
    public function searchResource($request, $conn)
    {
        $class = new ReflectionClass($this->getController($request->getResource()));
        $resource = $class->newInstance($conn);
        return $resource->search($params);
    }
    public function updateResource($request, $conn)
    {
        $class = new ReflectionClass($this->getController($request->getResource()));
        $resource = $class->newInstance($conn);
        return $resource->update($params);
    }
    public function deleteResource($request, $conn)
    {
        $class = new ReflectionClass($this->getController($request->getResource()));
        $resource = $class->newInstance($conn);
        return $resource->delete($params);
    }
    
}