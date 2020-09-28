<?php

namespace Controllers;

use Core\View;
use Models\Task;

class mainController
{

    public function index()
    {
        $title = 'ToDO - Home Page';
        View::render('index', array('title' => $title));
    }
}