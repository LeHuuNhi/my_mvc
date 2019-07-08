<?php

class LoginController extends Controller
{
    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new LoginModel();
    }

    //go to login form
    public function loginForm()
    {

        if (isset($_SESSION['login_ss'])) {
            header('location: http://localhost/nhi_mvc/index/students');
            exit();
        }
        $this->view->render("login/login");
    }

    //execute login action and create a session
    public function postLogin()
    {
        if (isset($_POST['inputUser']) && isset($_POST['inputPassword'])) {
            $username = $_POST['inputUser'];
            $password = $_POST['inputPassword'];
            $user = $this->model->checkUser($username);
            if (is_array($user) && count($user) > 0 && password_verify($password, $user['password'])) {
                //session_start();
                $_SESSION['login_ss'] = "1";
                if(!isset($_COOKIE['cookie_flag'])){
                    setcookie('cookie_flag','1', time() + (86400 * 30), "/");
                }

                header('location: http://localhost/nhi_mvc/index/students');
                exit();
            } else {
                header('location:loginForm');
                exit();
            }
        }
    }

    //execute logout action
    public function logout()
    {
        if (isset($_POST['logout'])) {
           // session_start();
            session_destroy();
            header('location: http://localhost/nhi_mvc/login/loginForm');
            exit();
        }
    }
}