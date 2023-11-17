<?php

namespace Controllers;

use Models\ActiveRecord;
use Models\Course;
use MVC\Router;

class CourseController {

    public static function courses() {
        //echo "Courses";
        self::showCourses();
        
    }

    public static function showCourses() {
        $course = new Course();
        $allCourses = $course->getCourses();
        
        for ($i=0; $i < count($allCourses); $i++) { 
            $dataCourse = get_object_vars($allCourses[$i]);
            $folioCourse = $dataCourse['folio'];
            
            echo "Nombre curso: " . $dataCourse['name'];
            echo "<a href='/edit-course?course=$folioCourse'>Editar</a>";
            echo "<a href='/delete-course?course=$folioCourse'>Eliminar</a>";
            echo "<br><br>";
        }
    }
    
    public static function getCourse(Router $router) {
        $course = new Course();
        $folioCourse = $_GET['course'];
        
        //$alerts = Course::getAlerts();
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
        $result = $course->editCourse();
        debuguear($result);
    }
}