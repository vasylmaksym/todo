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
        $sort = !empty($_GET['sort']) ? $_GET['sort'] : null;
        $title = 'ToDo - Home Page';
        $data = $task->get(self::RECORD_LIMIT, $page, $sort);
        $total = $task->total();
        $page_count = ceil($total / self::RECORD_LIMIT);

        View::render('index', array('title' => $title, 'data' => $data, 'page_count' => $page_count, 'sort' => $sort, 'page' => $page));
    }

    public function create()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $text = $_POST['text'];

        if (!empty($name) && !empty($email) && !empty($text)) {
            $task = new Task();
            $res = $task->create($name, $email, $text);

            if ($res) {
                header('Location: /');
            }
            exit;
        } else {
            // TODO : pretty error
            die();
        }
    }
}