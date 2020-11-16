<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$dirName = basename(getcwd());
if ($dirName === 'utils') {
    require_once '../../vendor/autoload.php';
} else {
    require_once 'vendor/autoload.php';
}

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(
    array(getcwd() . '/src/models'),
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);


/*
* relative path of project directory, :
* '/' (if url http://localhost/)
* '/app-directory/' (if url http://localhost/app-directory/)
* '/php/app-directory/' (if url http://localhost/php/app-directory/)
*/
// define('ROOT_PATH', '/app-directory/');
define('ROOT_PATH', '/php/BitPHP-Sprint3/');

// database configuration parameters
$conn = array(
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'dbname'   => 'db_sprint3_test',
    'user'     => 'root',
    'password' => 'root'
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
