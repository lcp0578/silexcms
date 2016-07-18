<?php
use Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler;

// include the database configuration
require __DIR__.'/database.php';
require __DIR__.'/twig.php';
require __DIR__.'/session.php';
require __DIR__.'/swiftmailer.php';
/**
 * configure your app for the production environment
 * 
 */

//[assets]
$app['assets.version'] = 'v1024';
$app['assets.version_format'] = '%s?version=%s';
$app['assets.named_packages'] = [
    'css' => [
        'version' => 'vc1024',
        'base_path' => '/css'
    ],
    'images' => [
        'base_urls' => [
            'http://www.silexcms.com/index_dev.php/images'
        ]
    ]
];

// Parameters
$app['assets.host'] = 'http://cnd.lcpeng.cn';


//[Global Configuration for controllers]
/**
 * If a controller setting must be applied to all controllers 
 * (a converter, a middleware, a requirement, or adefault value)
 */
$app['controllers'] 
->value('id', 1)
->assert('id', '\d+')
//->requireHttps()
->method('GET')
->convert('id', function ($id){
    return $id * 10;
})
->before(function(){});