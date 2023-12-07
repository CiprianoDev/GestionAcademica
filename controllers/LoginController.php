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
                    $correctPassword = $userExist->comparePassword($userEnteredPassword);

                    if ($correctPassword) {
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }
                        $_SESSION['login'] = true;
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

    public static function dashboard(Router $router){
        $router->renderView('dashboard/dashboard',[
        ]);
    }

    public static function logout(Router $router)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];
        header('Location: /');
    }
}