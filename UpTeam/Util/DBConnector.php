<?php

/**
 * Created by PhpStorm.
 * User: vpcam
 * Date: 19/04/2016
 * Time: 21:31
 */
class DBConnector
{
    private $ipAddr;
    private $dbName;
    private $dbType;
    private $dbPort;
    private $dbUser;
    private $dbPassword;

    /**
     * @param string $ipAddr
     * @param string $dbName
     * @param string $dbType
     * @param string $dbPort
     * @param string $dbUser
     * @param string $dbPassword
     */
    public function __construct($ipAddr, $dbName, $dbType, $dbPort, $dbUser, $dbPassword)
    {
        $this->setDbName($dbName);
        $this->setIpAddr($ipAddr);
        $this->setDbPort($dbPort);
        $this->setDbType($dbType);
        $this->setDbUser($dbUser);
        $this->setDbPassword($dbPassword);
    }

    public function connect()
    {
        $connString = $this->getDbType().':host='.$this->getIpAddr().';dbname='.$this->getDbName();
        try {
            $conn = new PDO($connString,
                $this->getDbUser(),
                $this->getDbPassword());
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: ".$e->getMessage();
        }
    }

    public function closeConnection($connection)
    {
        $connection = null;
    }

    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * @return string|null
     */
    public function getDbPassword()
    {
        return $this->dbPassword;
    }

    public function getDbPort()
    {
        return $this->dbPort;
    }

    public function getDbType()
    {
        return $this->dbType;
    }

    /**
     * @return string|null
     */
    public function getDbUser()
    {
        return $this->dbUser;
    }

    public function getIpAddr()
    {
        return $this->ipAddr;
    }

    /**
     * @param string $dbName
     */
    public function setDbName($dbName)
    {
        $this->dbName = $dbName;
    }

    /**
     * @param string $dbPassword
     */
    public function setDbPassword($dbPassword)
    {
        $this->dbPassword = $dbPassword;
    }

    /**
     * @param string $dbPort
     */
    public function setDbPort($dbPort)
    {
        $this->dbPort = $dbPort;
    }

    /**
     * @param string $dbType
     */
    public function setDbType($dbType)
    {
        $this->dbType = $dbType;
    }

    /**
     * @param string $dbUser
     */
    public function setDbUser($dbUser)
    {
        $this->dbUser = $dbUser;
    }

    /**
     * @param string $ipAddr
     */
    public function setIpAddr($ipAddr)
    {
        $this->ipAddr = $ipAddr;
    }

}