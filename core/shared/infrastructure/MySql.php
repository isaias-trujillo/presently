<?php


namespace core\shared\infrastructure;
use mysqli;

abstract class MySql
{
    private string $port = '3306';
    private string $database = 'presently';
    private string $password = '';
    private string $username = 'root';
    private string $hostname = 'localhost';

    public function __construct(
        string $hostname = 'localhost',
        string $username = 'root',
        string $password = '',
        string $database = 'presently',
        string $port = '3306'
    )
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;
    }

    protected function connect(): ?mysqli
    {
        return mysqli_connect(
            $this->hostname,
            $this->username,
            $this->password,
            $this->database,
            $this->port
        );
    }
}