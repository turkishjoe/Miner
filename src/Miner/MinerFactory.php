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
        return new Miner($this->pdo);
    }
    
    public function getLastMinerObject()
    {
        return $this->lastMinerObject;
    }
}
