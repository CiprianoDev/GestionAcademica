<?php

namespace Controllers;

use Models\History;
use Models\Teacher;
use MVC\Router;

class TeacherController
{

    public static function teachers(Router $router)
    {
        $allTeachers = Teacher::all();
        $allTeachersEnrolled = self::countTeachersEnrolled($allTeachers);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $teacherToSearch = $_POST['teacher'];

            if (!$teacherToSearch) header('Location: /courses');

            $searchResult = Teacher::search($teacherToSearch);
            $allTeachers = $searchResult;
        }

        $router->renderView('teachers/teacher', [
            'allTeachers' => $allTeachers,
            'teachersEnrolled' => $allTeachersEnrolled
        ]);
    }

    public static function countTeachersEnrolled($allTeachers) {
        $allTeachersEnrolled = [];

        foreach ($allTeachers as $teacher) {
            $teacherArray = get_object_vars($teacher);
            $teacherID = $teacherArray['id'];
            
            $historyTeacher = History::SQL("SELECT count(idTeacher) FROM history where idTeacher = " . $teacherID);
            $historyCourseArray = get_object_vars($historyTeacher[0]);
            array_push($allTeachersEnrolled, $historyCourseArray['count(idTeacher)']);
        }

        return $allTeachersEnrolled;
    }

    public static function create(Router $router)
    {
        $alerts = [];
        $teacher = new Teacher();
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
        $router->renderView('teachers/createTeacher', [
            'alerts' => $alerts,
            'teacher' => $teacher
        ]);
    }


    public static function edit(Router $router)
    {
        $alerts = [];
        $payroll = s($_GET['payroll']);

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
            'teacher' => $teacher
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
}
