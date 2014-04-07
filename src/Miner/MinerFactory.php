<?php
namespace Miner;

class MinerFactory
{
    private $pdo;

    private $lastMinerObject;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create()
    {
        $this->lastMinerObject = new Miner($this->pdo);
        return  $this->lastMinerObject;
    }
    
    public function getLastMinerObject()
    {
        return $this->lastMinerObject;
    }
}
