<?php
/**
 * @author Iuli Dercaci <iuli.dercaci@gmail.com>
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../lib/SplClassLoader.php';
$classLoader = new \SplClassLoader('Scheduler', '../app');
$classLoader->register();

$controller = 'Index';
$action = 'index';
if (!empty(trim($_SERVER['REQUEST_URI'], '/'))) {
	$name = trim($_SERVER['REQUEST_URI'], ' /');
    if (strripos($name, '/')) {
        list($controller, $action) = explode('/', $name, 2);
        if (strlen(trim($action)) == 0){
            $action = 'index';
        }
    }
	$controller = ucfirst(strtolower($controller));
} 
$controller = sprintf('\Scheduler\Controller\%s', $controller);

if (is_file('..'.DIRECTORY_SEPARATOR.'app'.str_replace('\\',DIRECTORY_SEPARATOR,$controller ).'.php')) {
    $controller = new $controller;
    $file_db = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db.sqlite';
    $db = new PDO('sqlite:'. $file_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    var_dump($db);
    exit();
} else {
    echo $controller;
    echo '<br>\Scheduler\Controller\Error';
    $controller = new \Scheduler\Controller\Error('Страница не найдена', '404');
}
$controller->{$action}();
$controller->render();