<?php


class View
{
    public function __construct()
    {
       // echo "</br>"."this is view";
    }
    public function render($name)
    {

       require 'view/'.$name.'.php';
    }

}