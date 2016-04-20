<?php
include "Controller/ControlManager.php";

class RequestRouter
{
    public function route()
    {
        return json_encode((new ControlManager) -> getResource());
    }
}