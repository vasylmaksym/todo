<?php

namespace Models;

use Core\DB;

class Task extends DB
{
    protected $table = 'tasks';

    public function get($limit, $page, $sort = null)
    {
        $data = [];
        $offset = ($page - 1) * $limit;

        $order_by = '';
        if (!empty($sort)) {
            switch ($sort) {
                case 'name':
                    $order_by = "ORDER BY name DESC";
                    break;
                case 'email':
                    $order_by = "ORDER BY email DESC";
                    break;
                case 'status':
                    $order_by = "ORDER BY done DESC";
                    break;
                default:
                    $order_by = '';

            }
        }

        $query = "SELECT name, text, done FROM {$this->table} {$order_by} LIMIT {$limit} OFFSET {$offset}";
        $res = $this->connect()->query($query);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function total()
    {
        $query = "SELECT count(1) total FROM {$this->table};";
        $res = $this->connect()->query($query);
        $row = $res->fetch_row();
        return !empty($row[0]) ? $row[0] : 0;
    }

    public function create($name, $email, $text)
    {
        $query = "INSERT INTO {$this->table} (name, email, text, done) VALUES ('{$name}', '{$email}', '{$text}', false)";
        return $this->connect()->query($query);
    }
}