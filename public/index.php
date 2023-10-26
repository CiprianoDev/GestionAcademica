<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
$router = new Router();


//Login
$router->get('/', [LoginController::class,'index']);
$router->post('/', [LoginController::class,'index']);

//Dashboard

$router->get('/dashboard', [LoginController::class,'dashboard']);

// Check and validate the routes, ensuring their existence and assigning them the Controller functions
$router->checkRoutes();