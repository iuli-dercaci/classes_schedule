<?php
/**
 * @author Iuli Dercaci <iuli.dercaci@gmail.com>
 */
echo 'test';
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../lib/SplClassLoader.php';
$classLoader = new SplClassLoader('Scheduler', '../app');
$classLoader->register();

$controller = 'Index';
if (!empty(trim($_SERVER['REQUEST_URI'], '/'))) {
	$name = trim($_SERVER['REQUEST_URI'], ' \/');
	$controller = ucfirst(strtolower($name));
} 
$controller = sprintf('\Scheduler\Controller\%s', $controller);

try {
	$controller = new $controller;
} catch (Exception $e) {
	var_dump($e->getMessage());
}
var_dump($controller);