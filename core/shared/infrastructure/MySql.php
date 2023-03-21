<?php


namespace core\shared\infrastructure;
use mysqli;

abstract class MySql
{
    public function __construct(
        private string $hostname = 'localhost',
        private string $username = 'root',
        private string $password = '',
        private string $database = 'presently',
        private string $port = '3306'
    )
    {
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