<?php


namespace Core;


class DB
{
    private $host;
    private $user_name;
    private $password;
    private $name;

    protected function connect()
    {
        $this->host = '127.0.0.1';
        $this->user_name = 'root';
        $this->password = '';
        $this->name = 'todo';

        return new \mysqli($this->host, $this->user_name, $this->password, $this->name);
    }
}