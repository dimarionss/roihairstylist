<?php

session_start();
define("ROOT2", $_SERVER['DOCUMENT_ROOT']);

require_once "classes/site.php";
require_once "lib/functions.php";
require_once "classes/user.php";
require_once "bd.php";


$site = new Site();
$user = new User();
$site->my_email = 'royspost2019@gmail.com';
$site->my_email_pass = 'dima13572468';

$user->createTempUser();
$user->loadUser();
$site->sendZayavka();
$user->createUser();
//$site->telegramMessage();
$site->counterClient();
$user->resetUserAndGoHome();
//$user->loadCart();
//$user->checkCart();

// читаем урл и создаем массив разбивая его по '/'
$url = $_SERVER['REQUEST_URI'];
//отсекаем GET
$clear_url = explode("?", $url);
//разделяем урл
$pieces_url = explode("/", $clear_url[0]);
//var_dump($pieces_url);
//exit();

require_once "views/header.php";
//если урл пустой обычно содержыт '/' то подключаем шаблон главной страницы
if($url=='/' or $pieces_url[1]==''){
    require_once "views/main.php";
}
//если урл не пустой то читаем его первый елемент и подключаем нужный шаблон
else{

    //проверяем есть ли такой файл в шаблонах если есть подключаем
    //если нету выводим шаблон 404
    if(file_exists("views/".$pieces_url[1].".php")){
        require_once "views/".$pieces_url[1].".php";
    }else{
        require_once "views/404.php";
    }
}

require_once "views/footer.php";
