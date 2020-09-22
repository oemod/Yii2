


<?php

//$memcache = new Memcache;
//$memcache->connect('localhost', 11211);
//echo  $memcache->getVersion();
//if (!$memcache->get('key')) {
//    $tmp_object = new stdClass;
//    $tmp_object->author = 'Phạm Thanh Hiền';
//    $tmp_object->email = 'hienpthanh@gmail.com';
//    $tmp_object->website = 'https://hienpthanh.blogspot.com';
//    $tmp_object->date = date('d-m-Y h:i:s', time());
//    $memcache->set('key', $tmp_object, false, 3000);
//    echo '<b>Store data in the cache (data will expire in 30 seconds)</b><br />';
//} else {
//    echo '<b>Read data from cache you have created</b> <br />';
//}
//echo '<hr />Data from the cache:<br />';
//
//var_dump($memcache->get('key'));
//
//echo '<hr />Current date time:’ .date(‘d-m-Y h:i:s', time();
//die;

//header('Conten-Type:text/html;charset=utf8');
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
