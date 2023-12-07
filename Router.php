<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function checkRoutes()
    {

        $currentUrl = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        session_start();

        $auth = $_SESSION['login'] ?? null;
       
        
        $method = $_SERVER['REQUEST_METHOD'];
        $protectedRoutes = [
            '/dashboard',
            '/courses', 
            '/edit-course', 
            '/delete-course', 
            '/create-course', 
            '/course-info', 
            '/enroll-teacher',
            '/undo-enroll',
            '/teachers',
            '/create-teacher',
            '/edit-teacher',
            '/vendedores/eliminar',
            '/delete-teacher'
        ];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if (in_array($currentUrl, $protectedRoutes) && !$auth) {
            header('Location: /');
        }


        if ($fn) {
            // call_user_func will call a function when we don't know what it will be
            call_user_func($fn, $this); // 'This' is used to pass arguments
        } else {
            echo "Page Not Found or Invalid Route";
        }
    }

    public function renderView($view, $data = [])
    {

        // Read what we pass to the view
        foreach ($data as $key => $value) {
            $$key = $value;  // Double dollar sign means: variable variable, basically, our variable remains the original, but when assigned to another, it doesn't overwrite it, it keeps its value. This way, the variable name is assigned dynamically.
        }

        ob_start(); // Store in memory for a moment...

        // Include the view in the layout
        include_once __DIR__ . "/views/$view.php";
        $content = ob_get_clean(); // Clean the buffer
        include_once __DIR__ . '/views/layout.php';
    }
}

