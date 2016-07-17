<?php
use Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler;
// configure PDO session handler
$app['pdo.dsn'] = 'mysql:dbname=silexcms';
$app['pdo.user'] = 'root';
$app['pdo.password'] = 'lcp0578';

$app['session.db_options'] = [
    'db_table' => 'silex_session',
    'db_id_col' => 'session_id',
    'db_data_col' => 'session_value',
    'db_time_col' => 'session_time'
];

$app['pdo'] = function () use ($app) {
    return new PDO(
            $app['pdo.dsn'],
            $app['pdo.user'],
            $app['pdo.password']
        );
};

$app['session.storage.handler'] = function () use ($app) {
    return new PdoSessionHandler(
            $app['pdo'],
            $app['session.db_options'],
            $app['session.storage.handler']
        );
}; 