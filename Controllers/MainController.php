<?php

namespace Controllers;

use Core\View;
use Models\Task;

class mainController
{

    const PER_PAGE = 3;

    public function index()
    {
        $task = new Task();
        $page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $sort = !empty($_GET['sort']) ? $_GET['sort'] : null;
        $order = !empty($_GET['order']) ? $_GET['order'] : 'asc';
        $title = 'ToDo - Home Page';
        $data = $task->get(self::PER_PAGE, $page, $sort, $order);
        $total = $task->total();
        $page_count = ceil($total / self::PER_PAGE);

        View::render('index', array('title' => $title,
            'data' => $data,
            'page_count' => $page_count,
            'sort' => $sort,
            'order' => $order,
            'per_page' => self::PER_PAGE,
            'page' => $page));
    }

    public function cms()
    {
        $title = 'CMS';
        $user = !empty($_SESSION['user']) ? $_SESSION['user'] : null;

        $task = new Task();
        $page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $data = $task->get(self::RECORD_LIMIT, $page);
        $total = $task->total();
        $page_count = ceil($total / self::RECORD_LIMIT);

        View::render('cms', array('title' => $title, 'user' => $user, 'page_count' => $page_count, 'data' => $data, 'page' => $page));
    }

    public function login()
    {
        extract($_POST);

        if (!empty($login) && !empty($password)) {
            if ($login === 'admin' && $password === '123') {
                $_SESSION['user'] = $login;
                header('Location: /cms');
            }
        }
        die();
    }

    public function create()
    {
        extract($_POST);


        if (!empty($name) && !empty($email) && !empty($text)) {
            $name = strip_tags($name);
            $text = strip_tags($text);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "E-mail is invalid!";
                die;
            }

            $task = new Task();
            $res = $task->create($name, $email, $text);

            if ($res) {
                header('Location: /');
            }
            die;
        } else {
            echo 'Invalid data!';
            // TODO : pretty error
            die;
        }
    }

    public function update()
    {
        extract($_POST);
        $user = !empty($_SESSION['user']) ? $_SESSION['user'] : null;

        $status = empty($status) ? 'open' : $status;

        if (empty($id) || empty($text) || empty($user)) die();

        $task = new Task();
        $res = $task->update($id, $text, $status);

        if ($res)
            header('Location: /cms');

        exit;
    }
}