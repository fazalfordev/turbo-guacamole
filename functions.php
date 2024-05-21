<?php
function pdo_connect(){
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'password';
    $DATABASE_NAME = 'pdocrud';

    $dsn = 'mysql:dbname=' . $DATABASE_NAME . ';host=' . $DATABASE_HOST;
    $user = $DATABASE_USER;
    $password = $DATABASE_PASS;

    try {
        return new PDO($dsn, $user, $password);
    } catch (PDOEXCEPTION $exception) {
        die('failed to connect to database!');
    }
}
?>