<?php

namespace Controllers;

use Core\View;
use Models\Task;

class mainController
{

    const VALID_TEXT_REGEX = "/[^а-яёА-ЯЁa-zA-Z0-9\s.,]/u";
    const ADMIN_LOGIN = 'admin';
    const ADMIN_PASS = '123';

    /**
     * @route GET '/'
     */
    public function index()
    {
        $task = new Task();
        $page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $sort = !empty($_GET['sort']) ? $_GET['sort'] : null;
        $order = !empty($_GET['order']) ? $_GET['order'] : 'asc';

        $title = 'ToDo - Home Page';

        [$page_count, $current_sort, $json_data] = $task->get($page, $sort, $order);

        if ($page > $page_count)
            $this->not_found();

        View::render('index', array('title' => $title,
                'data' => json_decode($json_data)->data ?? [],
                'page_count' => $page_count,
                'current_sort' => $current_sort,
                'sort' => $sort,
                'order' => $order,
                'page' => $page,
                'user' => $this->get_user()
            )
        );
    }

    /**
     * @route GET '/cms'
     */
    public function cms()
    {
        $user = $this->get_user();

        if (empty($user)) {
            $title = 'ToDo - Login';
            View::render('login', array('title' => $title));
        } else {
            $task = new Task();
            $page = !empty($_GET['page']) ? $_GET['page'] : 1;
            $sort = !empty($_GET['sort']) ? $_GET['sort'] : null;
            $order = !empty($_GET['order']) ? $_GET['order'] : 'asc';

            $title = 'ToDo - CMS';

            [$page_count, $current_sort, $json_data] = $task->get($page, $sort, $order);

            if ($page > $page_count)
                $this->not_found();

            View::render('cms',
                array('title' => $title,
                    'data' => json_decode($json_data)->data ?? [],
                    'page_count' => $page_count,
                    'current_sort' => $current_sort,
                    'sort' => $sort,
                    'order' => $order,
                    'page' => $page,
                    'status' => $task->status,
                    'user' => $user
                )
            );
        }
    }

    /**
     * @route POST '/login'
     */
    public function login()
    {
        extract($_POST);

        if (!empty($login) && !empty($password)) {
            if ($login === self::ADMIN_LOGIN && $password === self::ADMIN_PASS) {
                $data = base64_encode("{$login};{$password}");
                $_SESSION['user'] = $data;
                header('Location: /cms');
                die;
            }
        }

        echo "Invalid login or password!!";
        die;
    }

    /**
     * @route POST '/logout'
     */
    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
        die;
    }

    /**
     * @route POST ['/create', '/update']
     */
    public function create_or_update()
    {
        extract($_POST);
        $update = false;
        if (!empty($id)) {
            // edit
            $user = $this->get_user();
            if (empty($user)) {
                echo "У вас нет доступа для выполнения данной операции!";
                die;
            }

            $task = new Task();
            if (empty($text) || empty($status) || !in_array($status, $task->status)) {
                echo "invalid data!";
                die;
            }
            $res = $task->update($id, $text, $status);
            $update = true;
        } else {
            // create
            if (empty($email) || empty($name) || empty($text)) {
                echo "Invalid data!";
                die;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "E-mail is invalid!";
                die;
            }

            $task = new Task();
            $res = $task->create($name, $email, $text);
        }

        if ($res) {
            $location = $update ? '/cms' : '/';
            header("Location: {$location}");
        } else {
            echo "Error!";
        }
        die;
    }


    /**
     * 404 error
     */
    protected function not_found()
    {
        http_response_code(404);
        die;
    }

    /**
     * Get user
     * @return string|null
     */
    protected function get_user()
    {
        $user = !empty($_SESSION['user']) ? $_SESSION['user'] : null;

        if (empty($user))
            return null;

        $decode_user = explode(';', base64_decode($user));

        if ($decode_user[0] !== self::ADMIN_LOGIN || $decode_user[1] !== self::ADMIN_PASS) {
            unset($_SESSION['user']);
            return null;
        }

        return $user;
    }
}