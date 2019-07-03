<?php
spl_autoload_register(function ($class) {

    $filename = 'model/' . $class . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
});

class login_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new login_model();
    }

    //go to login form
    public function loginForm()
    {
        $this->view->render("login/login");
    }

    //execute login action and create a session
    public function postLogin()
    {
        if (isset($_POST['inputUser']) && isset($_POST['inputPassword'])) {
            $username = $_POST['inputUser'];
            $password = $_POST['inputPassword'];
            $user = $this->model->checkUser($username);
            if (count($user) > 0 && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['login_ss'] = "1";
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
            session_start();
            session_destroy();
            header('location: http://localhost/nhi_mvc/login/loginForm');
            exit();
        }

    }
}