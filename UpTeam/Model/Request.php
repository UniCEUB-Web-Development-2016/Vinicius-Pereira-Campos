<?php

/**
 * Created by PhpStorm.
 * User: vpcam
 * Date: 11/04/2016
 * Time: 19:48
 */
class Request
{
    private $protocol;
    private $method;
    private $resource;
    private $serverAddr;
    private $params;
    
    public function __construct($protocol, $method, $resource, $params, $serverAddr)
    {
        $this->setProtocol($protocol);
        $this->setMethod($method);
        $this->setResource($resource);
        $this->setParams($params);
        $this->setServerAddr($serverAddr);
    }

    public function setServerAddr($serverAddr)
    {
        $this->serverAddr = $serverAddr;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function setParams($params)
    {
        $this->params = $params;
    }

    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
    }

    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    public function getResource()
    {
        return $this->resource;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getProtocol()
    {
        return $this->protocol;
    }

    public function getServerAddr()
    {
        return $this->serverAddr;
    }


}