<?php

// Использование подготовленных запросов PDO для предотвращения SQL инъекций

    require "db.php";
    $type = $_POST["form"];
    switch($type) {
        case "auth":
            $login = filter_var(trim($_POST['login']),
            FILTER_SANITIZE_STRING);
            $user_code = filter_var(trim($_POST['user_code']),
            FILTER_SANITIZE_STRING);
            $user_code = md5($_POST['user_code']);
            $qr = "SELECT * FROM `users`";
            $pr = array(
                "login" => $login,
                "user_code" => $user_code,
                );
            $rs = db::getAll($qr);
            foreach ($rs as $value) {
            $loginAdmin = "admin";
            $passwordAdmin = "nikita";
            if ($loginAdmin == $_POST['login'] && $passwordAdmin == $_POST['user_code']):
                session_start();
                $_SESSION["login"] = $loginAdmin;
                $_SESSION["user_code"] = $passwordAdmin;
                header('Location: control.php');
            elseif($value['login'] == $_POST['login'] && $value['user_code'] == $user_code):
                echo "Вы авторизованы"; 
                setcookie('user', $value['login'], time() + 3600, "/");
                setcookie('time', $value['time'], time() + 3600, "/");
                setcookie('name', $value['name'], time() + 3600, "/");
                header('Location: index.php'); 
                break;
            else:
            // continue;
               echo "Данные не верны";
            endif;
            }
            unset($value);
        break;
        case "reg":
            $name = filter_var(trim($_POST['name']),
            FILTER_SANITIZE_STRING);
            $login = filter_var(trim($_POST['login']),
            FILTER_SANITIZE_STRING);
            $user_code = filter_var(trim($_POST['user_code']),
            FILTER_SANITIZE_STRING);
            $user_code = md5($_POST['user_code']);
            $IP = mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
            $qr = "SELECT * FROM `users`";
            $pr = array(
                "login" => $login,
                "user_code" => $user_code,
                );
            $rs = db::getAll($qr);
            foreach ($rs as $value) {
                $loginAdmin = "admin";
                $passwordAdmin = "nikita";
                $count = 1;
                if ($loginAdmin == $_POST['login'] && $passwordAdmin == $_POST['user_code']):
                    header('Location: 404.html');
                    $count++;
                elseif($value['login'] == $_POST['login'] && $value['user_code'] == $user_code):
                    $count++;
                    break;
                else:
                   echo "Данные не верны";
                endif;
                }
                unset($value);
                if ($count == 1):
                $qr = "INSERT INTO users (login, user_code, IP, name) VALUES (:login, :user_code, :IP, :name)";
                $pr = array(
                "login" => $login,
                "user_code" => $user_code,
                "IP" => $IP,
                "name" => $name,
                );
                $rs = db::add($qr, $pr);
                header('Location: index.php');
                else:
                    echo "Придумайте новый логин или пароль";
                endif;

            // $login = filter_var(trim($_POST['login']),
            // FILTER_SANITIZE_STRING);
            // $user_code = filter_var(trim($_POST['user_code']),
            // FILTER_SANITIZE_STRING);
            // $IP = mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
            // $user_code = md5($_POST['user_code']);
            // $qr = "INSERT INTO users (login, user_code, IP) VALUES (:login, :user_code, :IP)";
            // $pr = array(
            // "login" => $login,
            // "user_code" => $user_code,
            // "IP" => $IP,
            // );
            // $rs = db::add($qr, $pr);
            // header('Location: index.php');
        break;
        default:
            echo "404";
        break;
    }



?>