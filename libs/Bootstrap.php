<?php

class Bootstrap
{
    public function __construct()
    {
        $url = $_GET['url'];
        $url = rtrim($url, "/");
        $url = explode('/', $url);

        //check login session
        if($url[0] !="login")
        {
            if (!isset($_SESSION['login_ss'])) {
                header('location: http://localhost/nhi_mvc/login/loginForm');
                exit();
            } else {
                $ctrlName = ucfirst($url[0]) ."Controller";
                $controller = new $ctrlName();

                if(isset($url[1]))
                {
                    if (isset($url[2]))
                        $controller->{$url[1]}($url[2]);
                    else
                        $controller->{$url[1]}();
                }
            }
        } else {

            $ctrlName = ucfirst($url[0]) ."Controller";
            $controller = new $ctrlName();

            if(isset($url[1]))
            {
                if (isset($url[2]))
                    $controller->{$url[1]}($url[2]);
                else
                    $controller->{$url[1]}();
            }
        }
    }
}