<?php

namespace Models;

use Core\DB;

class Task extends DB
{
    protected $table = 'tasks';

    protected $fields = array(
        'name' => 'name',
        'email' => 'email',
        'text' => 'text',
        'status' => array(
            'open' => 'open',
            'closed' => 'closed',
            'deleted' => 'deleted'
        )
    );

    protected $orders = array('asc', 'desc');

    public $status = array(
        'open',
        'closed',
        'deleted'
    );

    public function get($limit, $page, $sort = null, $order = 'asc')
    {
        $data = [];
        $offset = ($page - 1) * $limit;

        $order = strtolower($order);

        if (!in_array($order, $this->orders)) {
            echo 'Invalid sort type!';
            die;
        }

        $order_by = '';
        if (!empty($sort)) {
            switch ($sort) {
                case 'name':
                    $order_by = "ORDER BY name {$order}";
                    break;
                case 'email':
                    $order_by = "ORDER BY email {$order}";
                    break;
                case 'status':
                    $order_by = "ORDER BY CASE WHEN status = '{$this->fields['status']['closed']}' THEN 1 ELSE 2 END {$order}";
                    break;
                default:
                    $order_by = '';

            }
        }

        $query = "SELECT `id`, `name`, `text`, `email`, `status` FROM {$this->table} WHERE `status` != '{$this->fields['status']['deleted']}' {$order_by} LIMIT {$limit} OFFSET {$offset}";

        $res = $this->connect()->query($query);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $data[] = (object)$row;
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
        $query = "INSERT INTO {$this->table} (name, email, text) VALUES ('{$name}', '{$email}', '{$text}')";
        return $this->connect()->query($query);
    }

    public function update($id, $text, $status)
    {
        $query = "UPDATE `{$this->table}` SET `text` = '{$text}', `status` = '{$status}' WHERE `id` = '{$id}'";
        return $this->connect()->query($query);
    }
}