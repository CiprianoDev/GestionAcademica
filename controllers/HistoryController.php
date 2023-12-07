<?php

namespace Controllers;

use Models\Course;
use Models\History;
use Models\Teacher;
use MVC\Router;

class HistoryController {

    public static function enrollTeacher(Router $router) {
        $teacher = Teacher::where('payroll', $_POST['teacher']);
        $course = Course::where('folio', $_POST['course']);

        $teacherId = get_object_vars($teacher)['id'];
        $courseId = get_object_vars($course)['id'];

        // status values
        // -1   -> Course completed but did not pass it
        // 0    -> Enrolled but not yet completed
        // 1   -> Course completed and passed it
        $values = [
            "idTeacher" => intval($teacherId),
            "idCourse" => intval($courseId),
            "status" => 0
        ];

        $history = new History();
        $history->addTeacherToCourse($values);

        header("Location: /course-info?course=" . get_object_vars($course)['folio']);
    }

    public static function getHistoryCourse($folioCourse) {
        $historyCourseObject = new History();
        $courseObject = Course::where('folio', s($folioCourse));
        
        $courseInfo = get_object_vars($courseObject);
        $idCourse = $courseInfo['id'];
        
        $historyInfo = $historyCourseObject->getHistoryCourse($idCourse);
        return $historyInfo;
    }

    public static function undoEnrollTeacher(Router $router) {
        $idHistory = s($_POST['history']);
        $folioCourse = s($_POST['course']);

        $history = new History();

        if ($history->undoEnrollTeacher($idHistory)) {
            header("Location: /course-info?course=" . $folioCourse);
        }

        History::setAlert('error', 'No se pudo eliminar al profesor del curso');
        $alerts = History::getAlerts();
        $router->renderView('courses/courseInfo', [
            'alerts' => $alerts
        ]);
    }

    public static function accreditCourse() {
        $idHistory = s($_POST['idHistory']);
        $idTeacher = s($_POST['idTeacher']);
        $idCourse = s($_POST['idCourse']);
        $folioCourse = s($_POST['folioCourse']);
        $accreditValue = $_POST['accredited'];

        $history = new History([
            'id' => $idHistory,
            'idTeacher' => $idTeacher,
            'idCourse' => $idCourse,
            'status' => $accreditValue
        ]);
        $history->updateHistory();

        header("Location: /course-info?course=" . $folioCourse);
    }
}