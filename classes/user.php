<?

class User
{
    public $login,
        $loged = false,
        $usercart_goods_on_id,
        $cart,
        $price,
        $data,
        $email;


    function __construct()
    {
        global $pieces_url;
        if ($pieces_url[1] == 'exit') {
            $this->resetUserAndGoHome();
        }
    }

    function createTempUser()
    {
        if ((!isset($_COOKIE['email']) or !isset($_COOKIE['email'])) and !isset($_SESSION['email']) and !isset($_COOKIE['user'])) {
            setCookie('user', rand(1, 99999), time() + 3600, '/');
            header("Refresh:0");
        } else {
        }
    }

    function createUser()
    {
        global $succ_message;
        global $pdo;
        if (isset($_POST["zayavka"]) or isset($_POST['zayavkakurs']) or isset($_POST['registerform'])) {
            if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone'])) {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $phone = htmlspecialchars($_POST['phone']);
                $instagram = htmlspecialchars($_POST['Instagram']);
                $usluga = htmlspecialchars($_POST['checkbox_1']) . ',' . htmlspecialchars($_POST['checkbox_2']) . ',' . htmlspecialchars($_POST['checkbox_3']) . ',' . htmlspecialchars($_POST['checkbox_4']) . ',' . htmlspecialchars($_POST['checkbox_5']) . ',' . htmlspecialchars($_POST['checkbox_6']) . ',' . htmlspecialchars($_POST['checkbox_7'] . ',' . htmlspecialchars($_POST['checkbox_kurs1']) . ',' . htmlspecialchars($_POST['checkbox_kurs2']) . ',' . htmlspecialchars($_POST['checkbox_kurs3']));
                $rezuser1 = $pdo->prepare("SELECT * FROM users WHERE email='" . $email . "'"); //запрашиваем строку из БД с почтой, введённым пользователем
                $rezuser1->execute();
                if ($rezuser1->rowCount() == 0) //если нашлась одна строка, значит такой юзер существует в БД
                {
                    $rezuser1 = $pdo->prepare("INSERT INTO users (name, email, password, instagram, phonenumber, usluga) VALUES('$name','$email','$password','$instagram','$phone','$usluga')");
                    $rezuser1->execute();
                    $result = $rezuser1->fetchAll();
                    if (!$result) {
//                        $succ_message = "Регистрация прошла успешно";
//                        global $site;
//                        $site->sendMail($site->my_email,'Новая заявка с регистрацией <br>'. $name ."<br>".$phone);
                    } else {
                        $succ_message = "Ошибка регистрации";
                    }
                } else {
                    $message = "Пользователь с таким логином существует";
                }
            } else {
                $message = "All fields are required!";
            }

        }
    }

    function loadCart()
    {
        if ($this->loged) {
            if (isset($this->data['cart']) and !empty($this->data['cart'])) {

                $this->usercart_goods_on_id = unserialize($this->data['cart']);
            } else {
                $this->usercart_goods_on_id = '';
            }
            if (isset($this->data['pricecart'])) {
                $this->price = $this->data['pricecart'] . ' грн';
            } else {
                $this->price = '';
            }
        } else {
            if (!isset($_COOKIE['cart'])) $_COOKIE['cart'] = '';
            $this->usercart_goods_on_id = unserialize($_COOKIE['cart']);
            if (!isset($_COOKIE['price'])) $_COOKIE['price'] = 0;
            $this->price = $_COOKIE['price'] . ' грн';
        }
    }

    function loadUser()
    {
        if (isset($_SESSION['email']) and isset($_SESSION['password'])) {
            $this->loadUserFromBd($_SESSION['email'], $_SESSION['password']);
        } else if (isset($_COOKIE['email']) and isset($_COOKIE['password'])) {
            $this->loadUserFromBd($_COOKIE['email'], $_COOKIE['password']);
        } elseif (isset($_POST['email']) and isset($_POST['userpass'])) {
            $this->loadUserFromBd($_POST['email'], $_POST['userpass']);
//        }else{
//            if(empty($this->email) and isset($_COOKIE['user'])){
//                @$this->data['cart']= unserialize($_COOKIE['cart']);
//            }
        }


    }

    function checkCart()
    {
        global $url;
        if (isset($_GET['buycart']) and isset($_GET['id'])) {

//            dump($this->usercart_goods_on_id);
//            dumpx($_GET['id']);
            $this->usercart_goods_on_id[] = $_GET['id'];
            $this->saveCart();

            $succ_message = 'Товар добавлен в корзину ' . $this->price;
            $url_after_buy = explode("buycart", $url)[0];

            $url_after_buy = $url_after_buy . 'succ_message=' . $succ_message;
            header("Location: http://" . $_SERVER['SERVER_NAME'] . $url_after_buy);
        }
    }

    function delCookieUser()
    {
        setCookie('user', rand(1, 10), time() - 1, '/');
        setCookie('login', rand(1, 10), time() - 1, '/');
    }

    function resetUserAndGoHome()
    {
        if (isset($_GET['exit'])) {
            $this->resetUser();
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/'); //перенаправляем на главную страницу сайта
            exit();
        }
    }

    function resetUser()
    {
        unset($_SESSION);
        session_destroy();
        session_write_close();
        setCookie('password', '', time() - 1, '/');
        setCookie('user', '', time() - 1, '/');
        setCookie('cart', '', time() - 1, '/');
        setCookie('price', '', time() - 1, '/');
        setCookie('login', '', time() - 1, '/');
    }

    function delGoodFromCart($id)
    {
        if (isset($_POST['registerform']) or isset($_POST['zakazregistration'])) {
            unset($_COOKIE['cart']);
            unset($_COOKIE['price']);
        } else {

            $i = 0;
            foreach ($this->usercart_goods_on_id as $good_id) {
                if ($id == $good_id) {
                    break;
                }
                $i++;
            }
            unset($this->usercart_goods_on_id[$i]);
            $this->usercart_goods_on_id = array_values($this->usercart_goods_on_id);
            $this->saveCart();


        }
    }

    private function loadUserFromBd($email, $password)
    {
        global $pdo;
        global $succ_message;
        global $err_message;
        $rez1 = $pdo->prepare("SELECT * FROM users WHERE email='" . $email . "'"); //запрашиваем строку из БД с логином, введённым пользователем
        $rez1->execute();
        $rez = $rez1->fetchAll();

        if ($rez1->rowCount() == 1) //если нашлась одна строка, значит такой юзер существует в БД
        {

            $baza = $rez[0];
            $this->data = $baza;

//            $this->price = $baza['pricecart'];
            if (($password) == $baza['password']) //сравниваем хэшированный пароль из БД с хэшированными паролем, введённым пользователем и солью (алгоритм хэширования описан в предыдущей статье)
            {


                $this->loged = true;
                $this->email = $baza['email'];

//                $succ_message = 'Привет ' . $baza['login'];
                if (isset($_POST['brain'])) {            //кнопка запомнить

                    //пишем логин и хэшированный пароль в cookie, также создаём переменную сессии
                    setcookie("email", $baza['email'], time() + 50000);
                    setcookie("user", $baza['email'], time() + 50000);
                    setcookie("password", $baza['password'], time() + 50000);


                } else {
                    $_SESSION['email'] = $baza['email'];    //записываем в сессию id пользователя
                    $_SESSION['password'] = $baza['password'];    //записываем в сессию id пользователя
                    $this->delCookieUser();
                }
            } else { //если пароли не совпали
                $err_message = "Неверный пароль";
                $this->resetUser();

            }
        } else { //если такого пользователя не найдено в БД
            $err_message = "Неверный логин и пароль";
//            $this->resetUser();

        }
    }

    private function calculate_price()
    {
        global $goods;
        $this->price = '';
        foreach ($this->usercart_goods_on_id as $good_id) {
            foreach ($goods->allGoods as $good) {
                if ($good['id'] == $good_id) {
                    $this->price += $good['currentlyprice'];
                }

            }

        }
        return $this->price;
    }

    function get_goods_from_cart()
    {
        global $goods;
        $this->cart = '';
        foreach ($this->usercart_goods_on_id as $good_id) {
            foreach ($goods->allGoods as $good) {
                if ($good['id'] == $good_id) {
                    $this->cart[] = [
                        'name' => $good['name'],
                        'currentlyprice' => $good['currentlyprice']
                    ];
                }

            }

        }
        return $this->cart;
    }

    function saveCart()
    {
        global $pdo;
        $this->calculate_price();

        if (isset($_POST['zayavname']) or isset($_POST['zakazregistration'])) {
            $cart = '';
            $price = '';
            $login = '';


        } else {

            $cart = serialize($this->usercart_goods_on_id);
            $price = $this->price;
            $login = $this->login;
        }

        if ($this->loged) {


            $stmt = $pdo->prepare("UPDATE users SET cart = :cart, pricecart = :price where login=:login");
            $stmt->bindParam(':cart', $cart);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':login', $login);


            $stmt->execute();


        } else {
            setCookie('cart', serialize($this->usercart_goods_on_id), time() + 3600, '/');
            setCookie('price', $this->price, time() + 3600, '/');
        }
    }

    function getComment()
    {
        global $pdo;
        $comment = $pdo->prepare("SELECT * FROM messages"); //запрашиваем строку из БД
        $comment->execute();
        return $comment->fetchAll();

    }

    function unsetCart()
    {
        global $pdo;
        if ($this->loged) {
            $sql = ("UPDATE users SET cart = ?, pricecart = ? where login=?");
            $pdo->prepare($sql)->execute(['', '', $this->login]);
        }
        setCookie('cart', serialize($this->usercart_goods_on_id), time() - 1, '/');
        setCookie('price', $this->price, time() - 1, '/');
    }
}



