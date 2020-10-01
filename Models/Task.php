<?php

namespace Models;

use Core\DB;

class Task extends DB
{
    protected $table = 'tasks';

    public function get($limit, $page)
    {
        $data = [];
        $offset = ($page - 1) * $limit;
        $query = "SELECT name, text, done FROM {$this->table} LIMIT {$limit} OFFSET {$offset}";
        $res = $this->connect()->query($query);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
}