<?php
    require_once("../db/database.php");
    global $pdo;

    $type = $_POST["form"];
    switch($type) {
        case "reg":
            $login = $_POST["login"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirm = $_POST["confirm"];

            $sql = "SELECT * FROM `users` WHERE `login` = :login OR `email` = :email";
            $query = $pdo->prepare($sql);
            $query->execute(array(
                "email" => $email,
                "login" => $login
            ));
            $count = $query->rowCount();
            if($count == 0) {
                if($password === $confirm) {
                    $sql = "INSERT INTO users (login, email, password) VALUE (:login, :email, :password)";
                    $query = $pdo->prepare($sql);
                    $query->execute(array(
                        "login" => $login,
                        "email" => $email,
                        "password" => $password
                    ));
                    echo "Регистрация завершена.";
                }
                else {
                    echo "Пароли не совпадают.";
                }
            }
            else {
                echo "Пользователь с такими данными уже существует.";
            }
        break;
        case "auth":
            $login = $_POST["login"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM `users` WHERE `login` = :login OR `email` = :email";
            $query = $pdo->prepare($sql);
            $query->execute(array(
                "email" => $email,
                "login" => $login
            ));
            $count = $query->rowCount();
            if($count == 0)
            {
                echo "Данные введены не верно, перезагрузите страницу";
            }
            else
            {
                $sql = "SELECT * FROM `users` WHERE `login` = :login OR `email` = :email";
            $query = $pdo->prepare($sql);
            $query->execute(array(
                "email" => $email,
                "login" => $login
            ));
                
            }
        break;
        default:
            echo "404";
        break;        
    }


    $result = $query->fetch(PDO::FETCH_OBJ); //Условный оператор на поиск пользователей:
    if($count) { 
        //Создание ключа безопасности при помощи описанного метода: 
   $token = genRandomString(32); //Сохранение ключа безопасности в сессию: 
   $_SESSION["token"] = $token; //Объявление переменной для хранения ключе безопасности:  
   $session = session_id(); 
   //Описание SQL-запроса для сохранения ключа безопасности в базе данных. Где DATE_ADD — функция SQL для добавления определённого временного интервала (24 минуты) к текущему времени: 
   $sql = "INSERT INTO tokens (id_user, token, session_id,  token_expiration) VALUES (:user, :token, :session, 
   DATE_ADD(now(), INTERVAL 24 MINUTE))"; //Подготовка запроса: 
   $query = $pdo->prepare($sql); //Выполнение запроса с указанием маркерами: 
   $query->execute(array( 
   "user" => $result->id_user, 
   "token" => $token, 
   "session" => $session 
   )); 
    echo "Успешная аутенфикация";
   } else { 
    echo "Неуспешная аутенфикация";
   } 



    function genRandomString($length = 8) { 
        //Набор символов, которые будут использоваться для выборки: 
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLM 
        NOPQRSTUVWXYZ"; 
        //Получение длинны строки для использования её в качестве  массива: 
        $charsLength = strlen($chars); 
        //Инициализация пустой строки, в которую будут добавляться  символы: 
        $randomString = ""; 
        //Цикл со счётчиком, где в качестве инициализирующего значения создаётся новая переменная i (количество итераций), в качестве условия — i строго меньше входного аргумента, а также инкрементирующее значение (i возрастает с каждой итерацией): 
        for($i = 0; $i < $length; $i++) { 
        //При выполнении итерации в пустую переменную будут добавляться новые символы, которые берутся из набора в начале. Набор представлен в качестве массива, а его значение берётся случайным образом благодаря использованию метода rand(x, y), где x — начальное значение выборки (0, так как массивы нумеруются с нуля), а y — общая длинна строки минус единица (по той же причине): 
        $randomString .= $chars[rand(0, $charsLength - 1)]; 
        } 
        //Возвращение итоговой строки для использования в программном коде: 
        return $randomString; 
        } 
        

        
        
        
   
    

   function checkAuth() { 
    //Объявление глобальной переменной для работы с базой данных: 
 global $pdo; 
   //Объявление переменной для получения значения ключа безопасности из сессии:
    $token = @$_SESSION["token"]; //Объявление переменной для хранения ключе безопасности:  
   $session = session_id(); 
   //Описание SQL-запроса для поиска данных об аутентификации по существующему ключу безопасности и номеру сессии с условием, чтобы ключ не считался «просроченным»: 
   $sql = "SELECT * FROM tokens WHERE token = :token AND  session_id = :session AND token_expiration > now()"; $query = $pdo->prepare($sql); 
   $query->execute(array( 
   "token" => $token, 
   "session" => $session 
   )); 
   //Подсчёт количества строк таблицы после поиск (1 — активный ключ безопасности найден, 0 — не найден):
    $count = $query->rowCount(); if($count) { 
   //Действия в случае нахождения активного ключа безопасности. Требуется вернуть «истину» и обновить существующий ключ. 
   } else { 
   //Действия в случае отсутствия активного ключа безопасности. Требуется вернуть «ложь». 
    } 
   } 
   


?>