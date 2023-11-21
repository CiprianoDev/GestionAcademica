<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\CourseController;
use Controllers\LoginController;
use MVC\Router;
$router = new Router();


//Login
$router->get('/', [LoginController::class,'index']);
$router->post('/', [LoginController::class,'index']);

//Dashboard

$router->get('/dashboard', [LoginController::class,'dashboard']);

// Courses
$router->get('/courses', [CourseController::class, 'courses']);
$router->get('/edit-course', [CourseController::class, 'getCourse']);
$router->post('/edit-course', [CourseController::class, 'editCourse']);
$router->post('/delete-course', [CourseController::class, 'deleteCourse']);
$router->get('/create-course', [CourseController::class, 'createCourse']);
$router->post('/create-course', [CourseController::class, 'createCourse']);

// Check and validate the routes, ensuring their existence and assigning them the Controller functions
$router->checkRoutes();