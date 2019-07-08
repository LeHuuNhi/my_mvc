<?php


class View
{
    public function __construct()
    {
       // echo "</br>"."this is view";
    }

    public function render($name)
    {
        require BP . "/view/header.php";
        require BP . "/view/{$name}.php";
        require BP . "/view/footer.php";
    }

}