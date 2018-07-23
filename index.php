<?php
include __DIR__. '/actions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма регистрации</title>
    <style>
        label{
            display: block;
            position: relative;
            line-height: 1.5em;
            margin-bottom: 0.7em;
        }

        label input {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
            border: 1px solid gray;
        }
        label p.error {
            margin: -0.2em 0 0.7em 100px;
            color: red;
        }

    </style>

</head>
<body>

    <h1>Регистрация</h1>
    <form method="post">
        <label>
            Имя:
            <input name="first_name" value="<?=getValue ('first_name')?>">
        <?= getError('first_name')?>
        <label>
            Фамилия:
            <input name="last_name" value="<?=getValue ('last_name')?>">
            <?= getError('last_name')?>
        </label>

        <label>
            Email:
            <input tape="email" name="email" value="<?=getValue ('email')?>">
            <?= getError('email')?>
        </label>

        <label>
            Пароль:
            <input tape="password" name="password" value="<?=getValue ('password')?>">
            <?= getError('password')?>
        </label>

        <button type="submit">Зарегестрироваться</button>

    </form>
</body>
</html>
