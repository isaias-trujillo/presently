<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: content-type");
header("Access-Control-Allow-Methods: GET");

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/connection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/utils.php';

function selectOne(string $query, array $args): array
{
    ['records' => $records, 'error' => $error] = selectAll($query, $args);
    return [
        'record' => $records[0] ?? null,
        'error' => $error
    ];
}

function selectByPage(string $query, ?int $page, ?int $perPage): array
{
    $limit = $perPage ? (($perPage >= 2) ? $perPage : 10) : 10; // assign a valid page as limit
    $offset = (max($page, 1) - 1) * ($limit); // calculate offset with valid 'per page'
    ['records' => $records, 'error' => $error] = selectAll($query, [
        ['i', $limit],
        ['i', $offset]
    ]);
    return [
        'records' => $records,
        'error' => $error,
        'page' => max($page, 1),
        'perPage' => $limit,
    ];
}

function selectAll(string $query, array $args = []): array
{
    try {
        $connection = connection();

        if ($connection->connect_errno) {
            return ['records' => null, 'error' => $connection->connect_error];
        }

        $statement = $connection->prepare($query);
        if (!empty($args)) {
            bind_params($statement, $args);
        }

        if (!$statement->execute()) {
            return ['records' => null, 'error' => $connection->error];
        }

        $result = $statement->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $connection->close();
        return ['records' => $rows, 'error' => null];
    } catch (mysqli_sql_exception $exception) {
        return ['records' => null, 'error' => $exception->getMessage()];
    }
}