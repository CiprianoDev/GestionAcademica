<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
$router = new Router();


//Login


// Check and validate the routes, ensuring their existence and assigning them the Controller functions
$router->checkRoutes();