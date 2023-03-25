<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: content-type");
header("Access-Control-Allow-Methods: UPDATE, PATCH");

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/connection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/utils.php';

function total(string $query, array $args = []): array
{
    try {
        $connection = connection();

        if ($connection->connect_errno) {
            return ['total' => null, 'error' => $connection->connect_error];
        }

        $statement = $connection->prepare($query);
        if (!empty($args)) {
            bind_params($statement, $args);
        }

        if (!$statement->execute()) {
            return ['total' => null, 'error' => $connection->error];
        }

        $result = $statement->get_result();
        $total = $result->fetch_row()[0] || 0;
        $connection->close();
        return ['total' => $total, 'error' => null];
    } catch (mysqli_sql_exception $exception) {
        return ['total' => null, 'error' => $exception->getMessage()];
    }
}

// $json_str = file_get_contents('php://input');
// $data = json_decode($json_str) ?? $_POST;
