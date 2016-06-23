<?php
include_once "Model/Request.php";
include_once "Controller/UserController.php";
include_once "Controller/TaskController.php";
include_once "Controller/TeamController.php";
include_once "Controller/ProjectController.php";
include_once "Controller/DifficultyController.php";
include_once "Controller/LoginController.php";
include_once "Controller/StateController.php";
include_once "Controller/RolesController.php";

class ResourceController
{
    private $controlMap =
        [
            "team" => "TeamController",
            "user" => "UserController",
            "task" => "TaskController",
            "project" => "ProjectController",
            "difficulty" => "DifficultyController",
            "login" => "LoginController",
            "state" => "StateController",
            "roles" => "RolesController"
        ];
    private function getController($resource) {
        return $this->controlMap[strtolower($resource)];
    }

    /**
     * @param Request $request
     */
    public function createResource($request, $conn, $params)
    {
        $class = new ReflectionClass($this->getController($request->getResource()));
        $resource = $class->newInstance($conn);
        return $resource->register($params);
    }

    /**
     * @param Request $request
     */
    public function searchResource($request, $conn,  $params)
    {
        $class = new ReflectionClass($this->getController($request->getResource()));
        $resource = $class->newInstance($conn);
        return $resource->search($params);
    }

    /**
     * @param Request $request
     */
    public function updateResource($request, $conn, $params)
    {
        $class = new ReflectionClass($this->getController($request->getResource()));
        $resource = $class->newInstance($conn);
        return $resource->update($params);
    }

    /**
     * @param Request $request
     */
    public function deleteResource($request, $conn,  $params)
    {
        $class = new ReflectionClass($this->getController($request->getResource()));
        $resource = $class->newInstance($conn);
        return $resource->delete($params);
    }
    
}