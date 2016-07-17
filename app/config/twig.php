<?php
/**
  * twig.php
  *
  * @package: configure
  * @author: lcp0578@gmail.com
  * @date: 2016-07-12 12:10:06
  * @version: 0.0.1
  * @copyright: http://lcpeng.cn
  */
/**
 * @var $app \Silex\Application
 */
// [twig]
$app['twig.path'] = [
    __DIR__ . '/../../src/views'
];
$app['twig.options'] = [
    'cache' => __DIR__ . '/../../var/cache/twig'
];
$app->extend('twig', function($twig, $app){
    /**
     * @var $twig 
     */
    $twig->addGlobal('PI', 3.1415);
    $twig->addFilter('lcpeng', new \Twig_Filter_Function('lcpeng'));
    return $twig;
});