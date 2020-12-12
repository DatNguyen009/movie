<?php
class Controller
{
    public function model($model)
    {
        require_once "./MVC/models/" . $model . ".php";
        return new $model;
    }
    public function view($view, $data = [])
    {
        require_once "./MVC/views/" . $view . ".php";
    }
}
