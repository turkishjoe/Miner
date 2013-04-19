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

    public function fetchAllAsObject(){
        return $this->execute()->fetchAll(\PDO::FETCH_CLASS);
    }

    public function fetchAll(){
        return $this->execute()->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchOne(){
        return $this->execute()->fetch(\PDO::FETCH_ASSOC);
    }

    public function getById($table,$id){

        return $this->select('*')->from($table)->where('id',$id)->execute()->fetch(\PDO::FETCH_ASSOC);
    }
}