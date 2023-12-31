<?php

namespace Controllers;

use Models\Academy;
use Models\Course;
use Models\History;
use Models\Teacher;
use MVC\Router;

class CourseController
{

    public static function courses(Router $router)
    {
        $allCourses = self::showCourses();
        $allTeachersEnrolled = self::countTeachersEnrolled($allCourses)[0];
        $allStatusPositive = self::countTeachersEnrolled($allCourses)[1];
        $allStatusNegative = self::countTeachersEnrolled($allCourses)[2];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $courseToSearch = $_POST['course'];

            if (!$courseToSearch) header('Location: /courses');

            $searchResult = Course::search($courseToSearch);
            $allCourses = $searchResult;
        }

        $router->renderView('courses/courses', [
            'allCourses' => array_reverse($allCourses),
            'teachersEnrolled' => array_reverse($allTeachersEnrolled),
            'allStatusPositive' => array_reverse($allStatusPositive),
            'allStatusNegative' => array_reverse($allStatusNegative),
        ]);
    }

    public static function showCourses()
    {
        $course = new Course();
        $allCourses = $course->getCourses();

        return $allCourses;
    }

    public static function countTeachersEnrolled($allCourses) {
        $allTeachersEnrolled = [];
        $allStatusPositive = [];
        $allStatusNegative = [];

        foreach ($allCourses as $course) {
            $courseArray = get_object_vars($course);
            $courseID = $courseArray['id'];
            
            $historyCourse = History::SQL("SELECT count(idCourse) FROM history where idCourse = " . $courseID);
            $accreditStatusPositive = History::SQL("SELECT count(status) FROM history where idCourse = " . $courseID . " AND status = " . 1);
            $accreditStatusNegative = History::SQL("SELECT count(status) FROM history where idCourse = " . $courseID . " AND status = " . -1);
            
            $arrayStatusPositive = get_object_vars($accreditStatusPositive[0]);
            $accreditStatusNegative = get_object_vars($accreditStatusNegative[0]);
            array_push($allStatusPositive, $arrayStatusPositive['count(status)']);
            array_push($allStatusNegative, $accreditStatusNegative['count(status)']);
            $historyCourseArray = get_object_vars($historyCourse[0]);
            array_push($allTeachersEnrolled, $historyCourseArray['count(idCourse)']);
        }

        return [$allTeachersEnrolled, $allStatusPositive, $allStatusNegative];
    }

    public static function courseInfo(Router $router) {
        if (isset($_GET['course']) && !empty(isset($_GET['course']))) {
            $courseFolio = $_GET['course'];
            $historyCtrl = new HistoryController();
            $course = get_object_vars(Course::where('folio', $courseFolio));
            $history = $historyCtrl->getHistoryCourse($courseFolio);

            $academies = [];

            foreach ($history as $h) {
                $idAcademy = get_object_vars($h);
                $academy = Academy::where('idAcademy', $idAcademy['idAcademy']);

                array_push($academies, $academy);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $teacherToSearch = $_POST['teacher'];

                if (!$teacherToSearch) header("Location: /course-info?course=$courseFolio");

                $searchResult = Teacher::search($teacherToSearch);
                $allTeachers = $searchResult;

                $router->renderView('courses/courseInfo', [
                    'course' => $course,
                    'history' => $history,
                    'teachers' => $allTeachers
                ]);

            }

            $teachers = Teacher::all();
            $router->renderView('courses/courseInfo', [
                'course' => $course,
                'history' => $history,
                'teachers' => $teachers,
                'academies' => $academies
            ]);
        }
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
