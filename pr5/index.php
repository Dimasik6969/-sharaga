<?php
    $host       = "db4.myarena.ru";      // Адрес сервера базы данных
    $dbname     = "u19978_a11";    // Имя базы данных
    $user       = "u19978_a11";           // Имя пользователя
    $password   = "1G5l8M0x6S";               // Пароль
    $connection = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);

    try {
        // подключаемся к серверу
        $connection = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);
        echo "Подключение к базе данных успешно";
    }
    catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $result = $connection->query('SELECT * FROM `product`');
while($row = $result->fetch( PDO::FETCH_ASSOC )){
    foreach ($row as $key => $value) {
        echo "<td>".$value."</td>";
    }
}

?>