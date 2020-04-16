<?


class Site
{
    public $my_email, $my_email_pass;

    function sendZayavka()
    {
        if (isset($_POST["zayavka"])or isset($_POST['zayavkakurs'])or isset($_POST['registerform'])) {
            if (!empty($_POST['name']) && !empty($_POST['phone'] && !empty($_POST['email']))) {
                $to = $this->my_email;
                $text = '<table border="0" cellpadding="0" cellspacing="0" style="margin:0; padding:5px; border-radius: 50px; text-align: center; background: linear-gradient(to right, #FFDDD6 10%, #FFF9ED 10%, #FFF9ED 90%, #DBDBDB 90%); font-size: 20px; max-width: 600px; width: 100%;">
<b>Имя:&nbsp;</b>' . $_POST['name'] . ';
<br><b>Телефон:&nbsp;</b>' . $_POST['phone'] . ';
<br><b>Email:&nbsp;</b>' . $_POST['email'] . ';
<br><b>Instagram:&nbsp;</b>' . $_POST['Instagram'] . ';
<br><b>Желаемая дата:&nbsp;</b>' . $_POST['zayavdate'] . ';
<br><b>Услуга:&nbsp;</b>' . $_POST['checkbox_1'] . '<p>' . $_POST['checkbox_2'] . '</p><p>' . $_POST['checkbox_3'] . '</p><p>' . $_POST['checkbox_4'] . '</p><p>' . $_POST['checkbox_5'] . '</p><p>' . $_POST['checkbox_6'] . '</p><p> ' . $_POST['checkbox_7'] . ';</p>
<br><b>На курс:&nbsp;</b>' . $_POST['checkbox_kurs1'] . '<p>' . $_POST['checkbox_kurs2'] . '</p><p> ' . $_POST['checkbox_kurs3'] . ';</p>
<br><b>Во сколько Вам нужно быть готовой?:&nbsp;</b>' . '"<i>' .$_POST['zayavtextvopros1'] .'"</i>' . ';
<br><b>В какой половине дня Вам будет удобно?:&nbsp;</b>' . '"<i>' .$_POST['zayavtextvopros2'] .'"</i>' . '</table>;';

                $this->sendMail($to, $text);

            }
            $this->refresh();
        }
    }

    function sendMail($to, $text, $subject = 'Новая заявка')
    {

        include ROOT2 . "/lib/SendMailSmtpClass.php"; // include the class name
        $mailSMTP = new SendMailSmtpClass($this->my_email, $this->my_email_pass, 'ssl://smtp.gmail.com', 'From', 465);
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: From<" . $this->my_email . ">\r\n";
        $result = $mailSMTP->send($to, $subject, $text, $headers);

        if($result === true){
            echo "Письмо успешно отправлено";
        }else{
            echo "Письмо не отправлено. Ошибка: " . $result;
        }


    }
    /* https://api.telegram.org/bot1034295124:AAFsmvc9IBp3ELKgtaGYbMFiw9WVn5G-MoA/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */
    function telegramMessage()
    {
        global $txt;
        if (isset($_POST["zayavka"]) or isset($_POST['zayavkakurs']) or isset($_POST['registerform'])) {
            if (!empty($_POST['name']) && !empty($_POST['phone'] && !empty($_POST['email']))) {
                $name =($_POST['name']);
                $email =($_POST['email']);
                $phone = ($_POST['phone']);
                $instagram = ($_POST['Instagram']);
                $date = ($_POST['zayavdate']);
                $usluga = $_POST['checkbox_1'] . ',' .$_POST['checkbox_2'] . ',' .$_POST['checkbox_3'] . ',' .$_POST['checkbox_4'] . ',' . $_POST['checkbox_5'] . ',' .$_POST['checkbox_6'] . ',' .$_POST['checkbox_7'] . ',' .$_POST['checkbox_kurs1'] . ',' .$_POST['checkbox_kurs2'] . ',' . $_POST['checkbox_kurs3'];
                $token = "1034295124:AAFsmvc9IBp3ELKgtaGYbMFiw9WVn5G-MoA";
                $chat_id = "-421075543";
                $arr = array(
                    'Имя пользователя: ' => $name,
                    'Телефон: ' => $phone,
                    'Email: ' => $email,
                    'Instagram: ' => $instagram,
                    'Желаемая дата : ' => $date,
                    'Услуга: ' => $usluga,
                );

                foreach ($arr as $key => $value) {
                    $txt .= "<b>" . $key . "</b> " . $value . "%0A";
                };
                $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");
            }
        }
    }
   static function counterClient ()
    {
        global $pdo;
        $counter1 = $pdo->prepare("SELECT * FROM users "); //запрашиваем строку из БД с логином, введённым пользователем
        $counter1->execute();
        return $counter1->rowCount();
    }

    function refresh()
    {
        header('Location: .');
    }

    // types mess  message/error/save
    function alertMessage($header, $txt, $type, $close = 0)
    {
        echo '<script> futu_alert("' . $header . '","' . $txt . '",' . $close . ',"' . $type . '",);</script>';
    }
}
