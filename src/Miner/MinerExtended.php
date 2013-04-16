<?php

namespace Miner;
/**
 * Created by JetBrains PhpStorm.
 * User: Antoxa
 * Date: 16.04.13
 * Time: 18:00
 */

class MinerExtended extends Miner{

    public function __construct(\PDO $pdo){
        parent::__construct();
        $this->setPdoConnection($pdo);
    }

    public function fetchAllAsArray(){
        return $this->execute()->fetchAll();
    }

    public function fetchAll(){
        return $this->execute()->fetchAll(\PDO::FETCH_CLASS);
    }
}