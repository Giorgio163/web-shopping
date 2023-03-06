<?php
$host = 'localhost';
$dbname = 'web_shopping';
$username = 'root';
$password = '';

try {
    return new PDO("mysql:host=$host;dbname=$dbname", "$username", '');
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    die('Something went wrong. Please, try again later.');
}
