<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        /*
         Запрос имеет тип POST, обрабатываем данные
        */ 

        if(empty($_POST['age'])) exit('Поле "возраст" не заполнено');
        if((int)$_POST['age'] < 1) exit('Поле "возраст" < 1');

        echo 'Здравствуйте, '.htmlspecialchars($_POST['name']).'. <br>';
        echo 'Вам '.(int)$_POST['age'].' лет.'.'<br>';
    }
?>
    <form action="" method="post">
    <p>В данном примере, форма ссылается сама на себя</p>
    <p>Ваше имя: <input type="text" name="name"></p>
    <p>Ваш возраст: <input type="text" name="age"></p>
    <p><input type="submit"></p> 
    </form>

</body>
</html>