<?php

/**
 * Created by PhpStorm.
 * User: vpcam
 * Date: 18/04/2016
 * Time: 21:41
 */
class ProjectController
{
    public function register($request)
    {
        $params = $request->getParams();
        $project = new Project($params["name"],
            $params["team"],
            $params["createdon"],
            $params["estimatedDeadline"],
            $params["description"]);
        return $project;

    }
}