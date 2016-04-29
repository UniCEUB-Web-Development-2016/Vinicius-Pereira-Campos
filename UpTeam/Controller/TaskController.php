<?php
include "Model/Task.php";
include "Model/IEntitiesController.php";

class TaskController /*implements IEntitiesController*/
{
    public function register($request)
    {
        $params = $request->getParams();
        $task = new Task($params["name"],
            $params["description"],
            $params["estimate"],
            $params["dificulty"],
            $params["owner"],
            $params["createdby"],
            $params["state"],
            $params["project"],
            $params["createdon"]
            );
        return $task;
    }
}