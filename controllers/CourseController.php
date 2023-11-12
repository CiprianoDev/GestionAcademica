<?php

namespace Controllers;

use Models\Course;
use MVC\Router;

class CourseController {

    public static function courses() {
        echo "Courses";
        $course = new Course();
        $course->getCourses();
    }

    public static function showCourses() {
       
    }
}