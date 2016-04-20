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
private function getController($resource){
    return $this->controlMap[strtolower($resource)];
}
    public function createResource($request)
    {
        $class = new ReflectionClass($this->getController($request->getResource()));
        $resource = $class->newInstance();
        return $resource->register($request);
    }
}