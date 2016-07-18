<?php
/**
  * filename
  *
  * @package: packname
  * @author: lcp0578@gmail.com
  * @date: 2016-07-18 11:45:46
  * @version: 0.0.1
  * @copyright: http://lcpeng.cn
  */
$app['swiftmailer.use_spool'] = true;
$app['swiftmailer.options'] = [
    'host' => 'localhost',
    'port' => 25,
    'username' => 'admin@silexcms.com',
    'passowrd' => 'secret',
    'encryption' =>  'tls', // tls,ssl,null
    'auth_mode' => 'cram-md5', // plain,login,cram-md5,null
];
$app['swiftmailer.sender_address'] = 'admin@silexcms.com';
//development
$app['swiftmailer.delivery_addresses'] = 'lcp0578@gmail.com'; 
$app['swiftmailer.deliver_whitelist'] = 'lcp0578@163.com';