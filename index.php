<?php

session_start();

use Controller\ControllerUser;
use Controller\ControllerAdmin;
use Utils\Path;

require_once 'config/bootstrap.php';

$request = $_SERVER['REQUEST_URI'];
$rootPath = ROOT_PATH;

$path = new Path($entityManager);
$paths = $path->getPaths();

if (isset($_SESSION['adminLoggedIn'])) {
    if (isset($_REQUEST['addNewPost'])) {
        $controller = new ControllerAdmin($entityManager, $rootPath, $paths, true);
        $request = $rootPath;
    } else {
        $controller = new ControllerAdmin($entityManager, $rootPath, $paths, false);
    }
} else {
    if (isset($_SESSION['adminAccess'])) {
        $controller = new ControllerUser($entityManager, $rootPath, $paths, true);
        unset($_SESSION['adminAccess']);
    } else {
        $controller = new ControllerUser($entityManager, $rootPath, $paths, false);
    }
}

if (startsWith($request, $rootPath . '404')) {
    $controller->setRequestPath('error 404: page not found');
} elseif (count($paths) === 0) {
    $controller->setRequestPath('No Posts Yet!');
} else {
    $isPathFound = false;
    foreach ($paths as $path) {
        if (startsWith(urldecode($request), $rootPath . urldecode($path))) {
            $controller->setRequestPath($path);
            $isPathFound = true;
            break;
        }
    }
    if (!$isPathFound) {
        http_response_code(404);
        header('location:' . ROOT_PATH . '404');
        exit();
    }
}

echo $controller;

unset($_SESSION['msg']);

function startsWith($string, $startString) {
    $len = strlen($startString);
    return (substr($string, -$len, $len) === $startString);
}
