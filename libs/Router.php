<?php

class Router {

    function __construct() {

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //print_r($url);

        if (empty($url[0])) {
            require 'Controllers/login.php';
            $controller = new login();
            $controller->index();
            return false;
        }
        $file = 'Controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            $controller = new $url[0];

            if (isset($url[2])) {
                if (method_exists($controller, $url[1]))
                    $controller->{$url[1]}($url[2]);
                else {
                    $this->error();
                }
            } else {
                if (isset($url[1])) {
                    if (method_exists($controller, $url[1])) {
                        $controller->{$url[1]}();
                    } else {
                        $this->error();
                    }
                } else {
                    $controller->index();
                }
            }
        } else {
            $this->error();
        }


        //Call method
    }

    function error() {
        require 'Controllers/errorpage.php';
        $controller = new Errorpage();
        $controller->index();
        return false;
    }

}
