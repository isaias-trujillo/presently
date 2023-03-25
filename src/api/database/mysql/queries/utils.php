<?php

function bind_params(mysqli_stmt $statement, array $args)
{
    $types_array = array_map(fn($item) => $item[0], $args);
    $types = implode("", $types_array);
    $values = array_map(fn($item) => $item[1], $args);
    $statement->bind_param($types, ...$values);
}

function modifyRecords(string $query, array $args, mysqli $connection): ?string
{
    if ($connection->connect_errno) {
        return $connection->connect_error;
    }

    $statement = $connection->prepare($query);
    if (empty($args)) {
        return 'There must be at least 1 argument';
    }
    bind_params($statement, $args);

    if (!$statement->execute()) {
        return $connection->error;
    }
    return null;
}