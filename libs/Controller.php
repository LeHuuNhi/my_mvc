<?php


class Controller
{
    protected $view;

    public function __construct()
    {
        //echo "this is main controller";
        $this->view = new View();

    }
    public function say()
    {
        echo "this is main controller";

    }
}