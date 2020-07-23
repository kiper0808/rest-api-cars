<?php
// Enable error messages
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Enable autoload
require_once 'vendor/Autoloader.php';

use Rest\System\Router;
use Rest\Action\CarsAction;
use Rest\Action\SingleCarAction;

// Add routes
Router::routeAdd('cars', '/v1/cars{params}', ['{params}' => '($)|(\?((order=(name|year|year-desc)&?)|(limit=\d+)&?|(offset=\d+)&?)+)'], CarsAction::class);
Router::routeAdd('singlecar', '/v1/cars/{id}', ['{id}' => '[0-9]+'], SingleCarAction::class);

echo Router::enableRouter($_SERVER['REQUEST_URI']);