<?php

namespace Controllers;

use Models\Course;
use Models\History;
use Models\Teacher;
use MVC\Router;

class HistoryController {

    public static function signTeacher(Router $router) {
        $teacher = Teacher::where('payroll', $_POST['teacher']);
        $course = Course::where('folio', $_POST['course']);

        $teacherId = get_object_vars($teacher)['id'];
        $courseId = get_object_vars($course)['id'];

        $values = [
            "idTeacher" => intval($teacherId),
            "idCourse" => intval($courseId),
            "status" => 1
        ];

        $history = new History();
        $history->addTeacherToCourse($values);

        header("Location: /course-info?course=" . get_object_vars($course)['folio']);
    }

    public static function getHistoryCourse(Router $router, $folioCourse) {
        $historyCourseObject = new History();
        $courseObject = Course::where('folio', s($folioCourse));
        
        $courseInfo = get_object_vars($courseObject);
        $idCourse = $courseInfo['id'];
        
        $historyInfo = $historyCourseObject->getHistoryCourse($idCourse);
        return $historyInfo;
    }
}