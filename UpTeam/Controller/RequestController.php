<?php

class RequestController
{
    public function createRequest($method, $uri, $serverAddr, $protocol)
    {
        $uriArray = explode("/", $uri);

        return new Request(
            $protocol,
            $method,
            $uriArray[2],
            $this->getParams($uriArray[3]),
            $serverAddr
        );
    }

    private function getParams($string_params)
    {
        $params = str_replace("?", "", $string_params);
        $params = explode("&", $params);
        $paramsMap = array();
        foreach ($params as $value) {
            $parameter = explode("=", $value);
            $paramsMap[$parameter[0]] = $parameter[1];
        }
        return $paramsMap;
    }
}