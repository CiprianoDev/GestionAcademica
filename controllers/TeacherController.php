<?php

namespace Controllers;

use Models\Teacher;
use MVC\Router;

class TeacherController
{

    public static function teachers(Router $router)
    {
        $allTeachers = Teacher::all();

        $router->renderView('teachers/teacher', [
            'allTeachers' => $allTeachers
        ]);
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
            //debuguear($teacher);
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