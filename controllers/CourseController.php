<?php

namespace Controllers;

use Models\ActiveRecord;
use Models\Course;
use MVC\Router;

class CourseController {

    public static function courses(Router $router) {
        //echo "Courses";
        
        $router->renderView('courses/courses', [
            'allCourses' => self::showCourses()
        ]);
    }

    public static function showCourses() {
        $course = new Course();
        $allCourses = $course->getCourses();

        return $allCourses;
        
        // for ($i=0; $i < count($allCourses); $i++) { 
        //     $dataCourse = get_object_vars($allCourses[$i]);
        //     $folioCourse = $dataCourse['folio'];
            
        //     echo "Nombre curso: " . $dataCourse['name'];
        //     echo "<a href='/edit-course?course=$folioCourse'>Editar</a>";
        //     echo "<a href='/delete-course?course=$folioCourse'>Eliminar</a>";
        //     echo "<br><br>";
        // }
    }
    
    public static function getCourse(Router $router) {
        $course = new Course();
        $folioCourse = $_GET['course'];
        
        $dataCourse = get_object_vars($course->getCourse('folio', $folioCourse));
        $router->renderView('courses/editCourse', [
            'folio' => $dataCourse['folio'],
            'name' => $dataCourse['name'],
            'instructor' => $dataCourse['instructor'],
            'totalHours' => $dataCourse['totalHours'],
            'startDate' => $dataCourse['startDate'],
            'finishDate' => $dataCourse['finishDate'],
            'period' => $dataCourse['period'],
            'classroom' => $dataCourse['classroom'],
            'type' => $dataCourse['type']
        ]);
        //debuguear($dataCourse);
    }

    public static function editCourse() {
        $course = new Course();
        $folio = $_POST['folio'];
        $result = $course->editCourse('folio', $_POST);

        if ($result) {
            header("Location: /edit-course?course=$folio");
        }
        //debuguear($result);
    }

    public static function deleteCourse() {
        $course = new Course();
        $folio = $_POST['folio'];
        $result = $course->deleteCourse('folio', $folio);


        if ($result) {
            header('Location: /courses');
        }
    }

    public static function createCourse(Router $router) {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $router->renderView('courses/createCourse');
            return;
        }

        $curso = new Course();
        $dataCourse = $_POST;
        $result = $curso->createCourse($dataCourse);

        if ($result) {
            header('Location: /courses');
        }
        
        Course::setAlert('error', 'Ha ocurrido un error al crear el curso');
        $alerts = Course::getAlerts();
        $router->renderView('courses/createCourse',[
            'alerts' => $alerts,
            'folio' => $dataCourse['folio'],
            'name' => $dataCourse['name'],
            'instructor' => $dataCourse['instructor'],
            'totalHours' => $dataCourse['totalHours'],
            'startDate' => $dataCourse['startDate'],
            'finishDate' => $dataCourse['finishDate'],
            'period' => $dataCourse['period'],
            'classroom' => $dataCourse['classroom'],
            'typeC' => $dataCourse['type']
        ]);
    }
}