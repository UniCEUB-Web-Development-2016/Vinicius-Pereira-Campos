<?php
include_once "Model/Team.php";

class TeamController /*implements IEntitiesController*/
{
    public function register($request)
    {
        $params = $request->getParams();
        $team = new Team($params["name"]);
        return $team;
    }
}