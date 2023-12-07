<?php

namespace Controllers;

use Models\Academy;
use Models\History;
use Models\Teacher;
use MVC\Router;

class TeacherController
{

    public static function teachers(Router $router)
    {
        $allTeachers = Teacher::all();
        $allTeachersEnrolled = self::countTeachersEnrolled($allTeachers)[0];
        $allStatusPositive = self::countTeachersEnrolled($allTeachers)[1];
        $allStatusNegative = self::countTeachersEnrolled($allTeachers)[2];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $teacherToSearch = $_POST['teacher'];

            if (!$teacherToSearch) header('Location: /courses');

            $searchResult = Teacher::search($teacherToSearch);
            $allTeachers = $searchResult;
        }

        $router->renderView('teachers/teacher', [
            'allTeachers' => $allTeachers,
            'teachersEnrolled' => $allTeachersEnrolled,
            'allStatusPositive' => $allStatusPositive,
            'allStatusNegative' => $allStatusNegative,
        ]);
    }

    public static function countTeachersEnrolled($allTeachers) {
        $allTeachersEnrolled = [];
        $allStatusPositive = [];
        $allStatusNegative = [];

        foreach ($allTeachers as $teacher) {
            $teacherArray = get_object_vars($teacher);
            $teacherID = $teacherArray['id'];
            
            $historyTeacher = History::SQL("SELECT count(idTeacher) FROM history where idTeacher = " . $teacherID);
            $accreditStatusPositive = History::SQL("SELECT count(status) FROM history where idTeacher = " . $teacherID . " AND status = " . 1);
            $accreditStatusNegative = History::SQL("SELECT count(status) FROM history where idTeacher = " . $teacherID . " AND status = " . -1);

            $arrayStatusPositive = get_object_vars($accreditStatusPositive[0]);
            $accreditStatusNegative = get_object_vars($accreditStatusNegative[0]);
            array_push($allStatusPositive, $arrayStatusPositive['count(status)']);
            array_push($allStatusNegative, $accreditStatusNegative['count(status)']);
            $historyCourseArray = get_object_vars($historyTeacher[0]);
            array_push($allTeachersEnrolled, $historyCourseArray['count(idTeacher)']);
        }

        return [$allTeachersEnrolled, $allStatusPositive, $allStatusNegative];
    }

    public static function create(Router $router)
    {
        $alerts = [];
        $teacher = new Teacher();
        $academy = new Academy();
        $academies = $academy->getAllAcademies();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $teacher->sync($_POST);
            // debuguear($_POST);
            $alerts = $teacher->validate();

            if (empty($alerts)) {

                $result = $teacher->save();

                if ($result) {
                    header('Location: /teachers');
                } else {
                    $alerts = Teacher::setAlert('error', 'Algo salio mal inteta de nuevo');
                }
            }
        }

        $alerts = Teacher::getAlerts();
        $router->renderView('teachers/createTeacher', [
            'alerts' => $alerts,
            'teacher' => $teacher,
            'academies' => $academies
        ]);
    }


    public static function edit(Router $router)
    {
        $alerts = [];
        $payroll = s($_GET['payroll']);
        $academy = new Academy();
        $academies = $academy->getAllAcademies();

        if (!$payroll) header('Location: /teachers');

        $teacher = Teacher::where('payroll', $payroll);


        if (!$teacher) header('Location: /teachers');


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $teacher->sync($_POST);
            $alerts = $teacher->validate();

            if (empty($alerts)) {

                $result = $teacher->save();

                if ($result) {
                    header('Location: /teachers');
                } else {
                    $alerts = Teacher::setAlert('error', 'Algo salio mal inteta de nuevo');
                }
            }
        }

        $alerts = Teacher::getAlerts();
        $router->renderView('teachers/editTeacher', [
            'alerts' => $alerts,
            'teacher' => $teacher,
            'academies' => $academies
        ]);
    }

    public static function delete()
    {
        
        $payroll = s($_POST['payroll']);

        if (!$payroll) header('Location: /teachers');

        $teacher = Teacher::where('payroll', $payroll);


        if (!$teacher) header('Location: /teachers');

        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $teacher->delete('payroll',$payroll);

            if($result){
                header('Location: /teachers');
            }
        }
    }

    public static function teacherInfo(Router $router) {
        $teacherPayroll = s($_GET['teacher']);
        $teacherInfo = Teacher::where('payroll', $teacherPayroll);
        $academy = Academy::where('idAcademy', get_object_vars($teacherInfo)['idAcademy']);

        $router->renderView('teachers/teacherInfo', [
            'teacherInfo' => get_object_vars($teacherInfo),
            'academy' => get_object_vars($academy)
        ]);
    }
}
