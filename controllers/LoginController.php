<?php 

namespace Controllers;

use MVC\Router;

class LoginController {
    public static function index (Router $router){
        $router->renderView('auth/login',[]);
    }
}