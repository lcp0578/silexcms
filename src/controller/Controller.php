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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

$app->get('/', function () use($app)
{
    session_start();
    $_SESSION['silex'] = 'Test';
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
$app->post('/feddback', function(Request $request) use ($app){
    $message = \Swift_Message::newInstance()
        ->setSubject('[silexcms] Feddback')
        ->setFrom(array('noreply@silexcms.com'))
        ->setTo('feedback@silexcms.com')
        ->setBody($request->get('message'));
    $app['mailer']->send($message);
    return new Response('Thanks you for your feedback', 201);
});
$app->get('/validate/{email}', function ($email) use ($app){
    $errors = $app['validator']->validate($email, new Assert\Email());
    if(count($errors)){
        return new Response(strval($errors));
    }else{
        return new Response('The email is valid');
    }
});