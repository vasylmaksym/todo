<?php

namespace Controllers;

use Core\View;
use Models\Task;

class mainController
{

    const RECORD_LIMIT = 3;

    public function index()
    {
        $task = new Task();
        $page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $title = 'ToDO - Home Page';
        $data = $task->get(self::RECORD_LIMIT, $page);

        View::render('index', array('title' => $title, 'data' => $data));
    }
}