<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\CourseController;
use Controllers\HistoryController;
use Controllers\LoginController;
use Controllers\ReportsController;
use Controllers\TeacherController;
use MVC\Router;
$router = new Router();


//Login
$router->get('/', [LoginController::class,'index']);
$router->post('/', [LoginController::class,'index']);
$router->get('/logout', [LoginController::class,'logout']);

//Dashboard

$router->get('/dashboard', [LoginController::class,'dashboard']);

// Courses
$router->get('/courses', [CourseController::class, 'courses']);
$router->post('/courses', [CourseController::class, 'courses']);
$router->get('/edit-course', [CourseController::class, 'editCourse']);
$router->post('/edit-course', [CourseController::class, 'editCourse']);
$router->post('/delete-course', [CourseController::class, 'deleteCourse']);
$router->get('/create-course', [CourseController::class, 'createCourse']);
$router->post('/create-course', [CourseController::class, 'createCourse']);
$router->get('/course-info', [CourseController::class, 'courseInfo']);
$router->post('/course-info', [CourseController::class, 'courseInfo']);

// History
$router->post('/enroll-teacher', [HistoryController::class, 'enrollTeacher']);
$router->post('/undo-enroll', [HistoryController::class, 'undoEnrollTeacher']);
$router->post('/accredit-course', [HistoryController::class, 'accreditCourse']);

//Teachers
$router->get('/teachers',[TeacherController::class,'teachers']);
$router->post('/teachers',[TeacherController::class,'teachers']);
$router->get('/teacher-info',[TeacherController::class,'teacherInfo']);
$router->get('/create-teacher',[TeacherController::class,'create']);
$router->post('/create-teacher',[TeacherController::class,'create']);
$router->get('/edit-teacher',[TeacherController::class,'edit']);
$router->post('/edit-teacher',[TeacherController::class,'edit']);
$router->post('/delete-teacher',[TeacherController::class,'delete']);

//Reports
$router->get('/reports',[ReportsController::class,'reports']);


// Check and validate the routes, ensuring their existence and assigning them the Controller functions
$router->checkRoutes();