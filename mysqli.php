<?php
const MYSQL_HOSTNAME = 'localhost';
const MYSQL_USERNAME = 'root';
const MYSQL_PASSWORD = 'root';
const MYSQL_DATABASE = 'programming_courses';

$conn = new mysqli(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);


function db_connect(): mysqli
{
    static $mysqli;

    if (!is_null($mysqli)) {
        return $mysqli;
    }

    $mysqli = mysqli_connect(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);

    if ($mysqli === false) {
        throw new Exception('Неудачная попытка соединения ' . mysqli_connect_error());
    }

    return $mysqli;
}

function fetch_all_from_query(string $query): array
{
    $mysqli = db_connect();

    $statement = mysqli_prepare($mysqli, $query);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    if ($result === false) {
        return [];
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}