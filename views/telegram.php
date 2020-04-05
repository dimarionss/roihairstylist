<?php

/* https://api.telegram.org/bot1034295124:AAFsmvc9IBp3ELKgtaGYbMFiw9WVn5G-MoA/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$instagram = htmlspecialchars($_POST['Instagram']);
$usluga = htmlspecialchars($_POST['checkbox_1']) . ',' . htmlspecialchars($_POST['checkbox_2']) . ',' . htmlspecialchars($_POST['checkbox_3']) . ',' . htmlspecialchars($_POST['checkbox_4']) . ',' . htmlspecialchars($_POST['checkbox_5']) . ',' . htmlspecialchars($_POST['checkbox_6']) . ',' . htmlspecialchars($_POST['checkbox_7'] . ',' . htmlspecialchars($_POST['checkbox_kurs1']) . ',' . htmlspecialchars($_POST['checkbox_kurs2']) . ',' . htmlspecialchars($_POST['checkbox_kurs3']));
$token = "1034295124:AAFsmvc9IBp3ELKgtaGYbMFiw9WVn5G-MoA";
$chat_id = "-421075543";
$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone,
  'Email: ' => $email,
  'Instagram:' => $instagram,
  'Usluga:' => $usluga,
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: thank-you.html');
} else {
  echo "Error";
}
?>