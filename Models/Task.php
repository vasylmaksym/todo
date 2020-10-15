<?php

namespace Models;

use Core\DB;

/**
 * Class Task
 * @package Models
 */
class Task extends DB
{
    /**
     * Model table name
     * @var string
     */
    protected $table = 'tasks';

    /**
     * Tasks table all fields
     * @var array
     */
    protected $fields = array(
        'id' => 'id',
        'name' => 'name',
        'email' => 'email',
        'text' => 'text',
        'status' => array(
            'open' => 'open',
            'closed' => 'closed',
            'deleted' => 'deleted'
        )
    );

    /**
     * Items per page
     * @var int
     */
    protected $per_page = 3;

    /**
     * Allowed order by keys
     * @var array
     */
    protected $orders = array('asc', 'desc');

    /**
     * Allowed sort fields
     * @var array
     */
    protected $sort = array('name', 'email', 'status');

    /**
     * Allowed status for `status` column
     * @var array
     */
    public $status = array(
        'open',
        'closed',
        'deleted'
    );


    /**
     * Get data
     * @param $page
     * @param null $sort
     * @param string $order
     * @return array|mixed
     */
    public function get($page, $sort = null, $order = 'asc')
    {
        $order_by = '';
        $concat_ws = 0;

        $offset = ($page - 1) * $this->per_page;
        $order = strtolower($order);

        if (!in_array($order, $this->orders) || !in_array($sort, $this->sort))
            unset($sort);

        if (isset($sort) && !empty($sort)) {
            if ($sort === 'status')
                $order_by = "ORDER BY CASE WHEN status = '{$this->fields['status']['closed']}' THEN 1 ELSE 2 END {$order}";
            else
                $order_by = "ORDER BY `{$sort}` {$order}";

            $concat_ws = "CONCAT_WS('&', 'sort={$sort}', 'order={$order}')";
        }

        $query = "SELECT
		            CEIL((SELECT COUNT(1) FROM tasks WHERE status != '{$this->fields['status']['deleted']}') / {$this->per_page}) AS page_count,
                    {$concat_ws} as filters,
                    CONCAT('{\"data\": [', GROUP_CONCAT(`data`), ']}')
                      FROM (
                        SELECT
                          JSON_OBJECT(
                            'id', `id`,
                            'name', `name`,
                            'email', `email`,
                            'text', `text`,
                            'status', `status`
                          ) `data`
                        FROM `tasks`
                        WHERE status != '{$this->fields['status']['deleted']}' {$order_by} limit {$this->per_page} OFFSET {$offset}
                    ) `t`";

        $res = $this->connect()->query($query);

        return $res->num_rows > 0
            ? $res->fetch_row()
            : array();
    }

    /**
     * Create new task
     * @param $name
     * @param $email
     * @param $text
     * @return bool|\mysqli_result
     */
    public function create($name, $email, $text)
    {
        $query = "INSERT INTO {$this->table} (name, email, text) VALUES ('{$name}', '{$email}', '{$text}')";
        return $this->connect()->query($query);
    }

    /**
     * Update task
     * @param $id
     * @param $text
     * @param $status
     * @return bool|\mysqli_result
     */
    public function update($id, $text, $status)
    {
        $query = "UPDATE `{$this->table}` SET `text` = '{$text}', `status` = '{$status}' WHERE `id` = '{$id}'";
        return $this->connect()->query($query);
    }
}