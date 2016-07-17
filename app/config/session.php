<?php
use Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler;
// Using PdoSessionStorage to store Session in the Database
$app['pdo.dsn'] = 'mysql:host=localhost;port=3306;dbname=silexcms';
$app['pdo.user'] = 'root';
$app['pdo.password'] = 'lcp0578';
$app['pdo.opstions'] = [
    'PDO::ATTR_ERRMODE' => 3,
    'PDO::ERRMODE_EXCEPTION' => 2
];

$app['session.db_options'] = array(
    'db_table' => 'silex_session',
    'db_id_col' => 'sess_id',
    'db_data_col' => 'sess_data',
    'db_time_col' => 'sess_lieftime'
);

$app['pdo'] = function () use ($app) {
    return new PDO(
            $app['pdo.dsn'],
            $app['pdo.user'],
            $app['pdo.password']
        );
};
$app['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$app['session.storage.options'] = [
    'name' => 'silex_session',
    'cookie_lifetime' => 60,
    'cookie_path' => '/',
    'cookie_domain' => 'silexcms.com',
    'cookie_httponly' => true
];
$app['session.storage.handler'] = function () use ($app) {
    return new PdoSessionHandler(
            $app['pdo'],
            $app['session.db_options']
        );
}; 