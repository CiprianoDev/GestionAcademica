<?php 

namespace Controllers;

use Models\User;
use MVC\Router;

class LoginController {
    public static function index (Router $router){
        $alerts = [];
        $user = new User();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user->sync($_POST);
            $alerts = $user->validate();

            if(empty($alerts)){
                
                $userExist = $user::where('email',$user->email);
                
                if ($userExist) {
                    $userEnteredPassword = $user->password;
                    $correctPassword = $user->comparePassword($userEnteredPassword);

                    if ($correctPassword) {
                        header('Location: /dashboard');
                    }

                
                }

                User::setAlert('error', 'El correo o la contraseña son incorrectos');
               
            }
        }

        $alerts = User::getAlerts();
        $router->renderView('auth/login',[
            'alerts' => $alerts
        ]);
    }

    public static function dashboard(){
        echo 'EN DESARROLLO PORQUE EL SCRUM MASTER NO NOS HA PAGAGADO';
    }
}