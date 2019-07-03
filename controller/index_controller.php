<?php
spl_autoload_register(function ($class) {

    $filename = 'model/' . $class . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
});

class index_controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new student_model();
    }

    //go to list of students page
    public function students()
    {
        $this->view->list = $this->model->listOfStudents();
        $this->view->render("student/list");
    }

    //go to add page
    public function add()
    {
        $this->view->render("student/add");
    }

    //execute add action
    public function postAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'
            && isset($_POST["inputName"])
            && isset($_POST["inputBirthdate"])) :

            $name = $_POST["inputName"];
            $birthDate = $_POST["inputBirthdate"];
            //echo $name.$birthDate;

            $this->model->creatStudent($name, $birthDate);
            //echo "hihi";

        endif;
        header('location:students');
        exit();
    }

    //go to detail page
    public function detail()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) :

            $this->view->row = $this->model->datailOfStudent((int)$_GET['id']);
            $this->view->render("student/detail");

        endif;
    }

    //go to update page
    public function update()
    {
        $name = null;
        $birthdate = null;
        $id = null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitUpdate'])) :
            $name = $_POST['name'];
            $birthdate = $_POST['birthdate'];
            $id = $_POST['id'];
        endif;
        $this->view->studentId = $id;
        $this->view->studentName = $name;
        $this->view->studentBd = $birthdate;
        $this->view->render("student/update");
    }

    //execute update action
    public function postUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'
            && isset($_POST["inputName"])
            && isset($_POST["inputBirthdate"])) :

            $name = $_POST["inputName"];
            $birthDate = $_POST["inputBirthdate"];
            $id = $_POST['inputId'];

            $this->model->updateStudent((int)$id, $name, $birthDate);

        endif;
        header('location:students');
        exit();
    }

    //execute delete action
    public function postDelete()
    {
        $studentId = null;
        if (isset($_POST['deleteFlag']) && isset($_POST['id'])) :
            $studentId = (int)$_POST['id'];
            $this->model->deleteStudent($studentId);
        endif;
        header('location:students');
        exit();
    }
}