<?php
namespace Miner\Provider;

use Miner\Miner;
use Miner\MinerFactory;

use Silex\ServiceProviderInterface;
use Silex\Application;

class MinerServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['pdo'] = $app->share(function () use ($app) {
            $driver = isset($app['db.driver']) ? $app['db.driver'] : 'mysql';
            $dsn    = $driver . ':host=' . $app['db.host'] . ';port=' . $app['db.port'] . ';dbname=' . $app['db.name'];
            $conn   = new \PDO($dsn,
                $app['db.user'],
                $app['db.password'],
                array(
                    \PDO::ATTR_EMULATE_PREPARES => false,
                    \PDO::ATTR_STRINGIFY_FETCHES => false,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                )
            );

            $conn->exec('SET CHARACTER SET ' . (isset($app['db.charset']) ? $app['db.charset'] : 'UTF8'));

            return $conn;
        });

        $app['miner.factory'] = $app->share(function () use ($app) {
            return new MinerFactory($app['pdo']);
        });

        $app['miner'] = function () use ($app) {
            return $app['miner.factory']->create();
        };
    }

    public function boot(Application $app)
    {
    }
}
