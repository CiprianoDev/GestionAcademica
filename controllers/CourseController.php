<?php

namespace Controllers;

use Models\Course;
use Models\Teacher;
use MVC\Router;

class CourseController
{

    public static function courses(Router $router)
    {
        $allCourses = self::showCourses();


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $courseToSearch = $_POST['course'];

            if (!$courseToSearch) header('Location: /courses');

            $searchResult = Course::search($courseToSearch);
            $allCourses = $searchResult;
        }
        $router->renderView('courses/courses', [
            'allCourses' => $allCourses
        ]);
    }

    public static function showCourses()
    {
        $course = new Course();
        $allCourses = $course->getCourses();

        return $allCourses;
    }


    public static function editCourse(Router $router)
    {
        $folio = s($_GET['course']);
        $alerts = [];

        if (!$folio) header('Location: /courses');


        $course = Course::where('folio', $folio);


        if (!$course) header('Location: /courses');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $course->sync($_POST);

            $alerts = $course->validate();

            if (empty($alerts)) {

                $result = $course->save();

                if ($result) {
                    header('Location: /courses');
                }

                $alerts = Course::setAlert('error', 'Ocurrio un error al actualizar el curso');
            }
        }

        $alerts = Course::getAlerts();

        $router->renderView('courses/editCourse', [
            'alerts' => $alerts,
            'course' => $course
        ]);
    }

    public static function deleteCourse()
    {
        $course = new Course();
        $folio = $_POST['folio'];
        $result = $course->deleteCourse('folio', $folio);


        if ($result) {
            header('Location: /courses');
        }
    }

    public static function createCourse(Router $router)
    {
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
        $router->renderView('courses/createCourse', [
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
