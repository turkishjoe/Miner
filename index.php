<?php
include( "src/Miner/Miner.php" );

$host ='localhost';
$dbname = 'test';
$user = 'root';
$pass = '1234';

$db = new \PDO( "mysql:host=". $host . ";dbname=" . $dbname, $user, $pass );

//$conn->exec('SET CHARACTER SET ' . (isset($app['db.charset']) ? $app['db.charset'] : 'UTF8'));
//$conn->exec('SET NAMES ' . (isset($app['db.names']) ? $app['db.names'] : 'UTF8'));


$miner = new Miner( $db, true  );
//$query_result = $miner->select( 'name' )->from( 'test' )->where( 'id', 1, Miner::EQUALS , Miner::LOGICAL_AND, false ) ;
$query_result = $miner->insert( 'test' )->set( 'id', 'NULL', false  )->set( 'name', 'andrew', true )->set( 'desc', 'abc', true );
echo 'statement:' . $query_result->getStatement( false ) . "<br>";
$data = $query_result->execute()->fetchAll();
print_r( $data );