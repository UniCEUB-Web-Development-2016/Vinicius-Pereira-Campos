<?php
include_once "Model/Task";
include_once "Model/IEntitiesController";

class TaskController extends IEntitiesController
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