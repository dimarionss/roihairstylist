<?php
// подключение базы данных
$host = '127.0.0.1';
$db   = 'hairstylist';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


// подключаемся к серверу
$link = mysqli_connect($host, $user, $pass, $db)
    or die("Ошибка " . mysqli_error($link));



// выполняем операции с базой данных

$statement = $pdo->prepare('Select * From users');
$statement->execute();
$results = $statement->fetchAll();












//$sql_goods_on_id = $pdo->prepare('Select * From goods Where id = :id');
//
//
//
//$sql_goods_on_id->execute([
//    ':id' => 1
//]);
//$results = $statement->fetchAll();
//
//
//
//$sql_goods_on_id->execute([
//    ':id' => 6
//]);
//$results = $statement->fetchAll();
