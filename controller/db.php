<?php

$host = "localhost";
$username = "root";
$password = "";
$dbName = "ini";

$dsn = "mysql:host={$host};dbname={$dbName}";

$conn = new PDO($dsn, $username, $password);

function query($query){
    global $conn;
    $data = $conn->query($query);
    $datas = $data->fetchAll(PDO::FETCH_ASSOC);
    return $datas;
}

function execute($query){
    global $conn;
    return $conn->exec($query);
}