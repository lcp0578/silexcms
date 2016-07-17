<?php
/**
 * filename
 *
 * @package: packname
 * @author: lcp0578@gmail.com
 * @date: 2016-07-11 11:45:37
 * @version: 0.0.1
 * @copyright: http://lcpeng.cn
 */
$app->get('/', function () use($app)
{
//     session_start();
//     $_SESSION['silex'] = 'Test';
    $name = 'Hello Silex CMS';
    return $app['twig']->render('home/index.html.twig', array(
        'name' => $name
    ));
});

$app->get('/images/{file}', function ($file) use($app)
{
    if (! file_exists(__DIR__ . '../web/images/' . $file)) {
        return $app->abort(404, 'The image was not found.');
    }
    $stream = function () use($file)
    {
        readfile($file);
    };
    return $app->stream($stream, 200, array(
        'Content-Type' => 'image/png'
    ));
});