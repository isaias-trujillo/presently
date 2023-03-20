<?php

// include_once './../domain/Reply.php';
// include_once './Repository.php';

use JetBrains\PhpStorm\ArrayShape;

abstract class MySqlRepository implements Repository
{
    private string $host;
    private string $user;
    private string $pass;
    private string $database;
    private string $port;

    public function __construct(
        string $host = 'localhost',
        string $user = 'root',
        string $pass = '',
        string $database = 'presently',
        string $port = '3306'
    )
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;
        $this->port = $port;
    }

    #[ArrayShape(['connection' => "false|\mysqli", 'error' => "string"])]
    protected function connect(): ?mysqli
    {
        $connection = mysqli_connect($this->host, $this->user, $this->pass, $this->database, $this->port);
        $error = mysqli_error($connection);
        return $connection;
    }
}