<?php


$sql = file_get_contents(__DIR__ . '/tables.sql');

$pdo = require __DIR__ . '/../config/conn.php';

$pdo->exec($sql);
echo 'Tables created! :)';
