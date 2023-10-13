<?php
    $host       = "db4.myarena.ru";
    $dbname     = "u19978_a11";
    $user       = "u19978_a11";
    $password   = "1G5l8M0x6S";
    $connection = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);

    try {
        // Remove the redundant connection here
    }
    catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
        $login = $_POST['login']; 
        if (empty($login)) exit('Поле "логин" не заполнено');

        if (empty($_POST['password'])) exit('Введите пароль'); 
        if (empty($_POST['password_2'])) exit('Подтвердите пароль');
        
        $password1 = $_POST['password']; 
        $password2 = $_POST['password_2']; 

        if (strlen($password1) < 8) exit('Минимальная длина пароля 8 символов');
        if (strlen($password1) > 15) exit('Максимальная длина пароля 15 символов');

        if ($password1 === $password2) {
            // Continue with the rest of your code
        } else {
            echo "Пароли не совпадают. Пожалуйста, введите одинаковые пароли.";
        }

        $mail = $_POST['mail']; 
        if (empty($mail)) exit('Поле "почта" не заполнено');

        $select = $connection->prepare( "SELECT COUNT(`id`) as Users FROM `Users` WHERE `login` = ? OR `mail` = ?;");
        $res = $select->execute( [ $_POST['login'], $_POST['mail'] ]);
        $row = $select->fetch();
        if( !$res && !isset($row['users'])) {
            exit("Ошибка регистрации....(3)". '<br>');
        }
    
        if( $row[0] >0) {
            exit("Ошибка регистрации....(Пользователь уже существует)". '<br>' );
        }

        $pas_hash = password_hach($_POST['password'], PASSWORD_DEFAULT);
        $data = [$_POST['login'],$_POST['mail'], $pas_hash];
        
        $data = [ $login, $password1, $mail ];
        $insert = $connection->prepare("INSERT INTO `Users` (`login`, `password`, `mail`) VALUES (?, ?, ?)");
        $res = $insert->execute($data);
        if ($res) {
            echo ('Регистрация успешна!');
        } else {
            exit('Ошибка регистрации');
        }
    }

   
?>