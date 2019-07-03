<?php

class Bootstrap
{
    public function __construct()
    {
        spl_autoload_register(function ($class) {

            $filename = 'controller/' . $class . '.php';
            if (file_exists($filename)) {
                include $filename;
            }
        });

        $url = $_GET['url'];
        $url = rtrim($url, "/");
        $url = explode('/', $url);
        // print_r($url);die();

        //check login session
        if($url[0] !="login")
        {
            session_start();
            if (!isset($_SESSION['login_ss']) ||(trim ($_SESSION['login_ss'])) == '') {
                header('location: http://localhost/nhi_mvc/login/loginForm');
                exit();
            }else
            {
                $ctrlName = $url[0] . "_controller";
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
        else
        {
            $ctrlName = $url[0] . "_controller";
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