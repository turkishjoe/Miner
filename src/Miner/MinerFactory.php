<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Antoxa
 * Date: 16.04.13
 * Time: 18:00
 */
namespace Miner;

class MinerFactory{

    /** @var \PDO */
    private $_pdo = null;

    public function __construct(\PDO $pdo){
        $this->_pdo = $pdo;
    }

    public function getQuery(){
        return new MinerExtended($this->_pdo);
    }
}