<?php
namespace Miner;

class MinerFactory
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create()
    {
        return new Miner($this->pdo);
    }
}
