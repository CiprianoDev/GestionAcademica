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
    
    public static function editCourse() {
        $course = new Course();
        //debuguear($_GET);
        $folioCourse = $_GET['course'];

        debuguear($course->getCourse('folio', $folioCourse));
        //echo "Result: " . ActiveRecord::where('folio', $folioCourse);
    }
}