<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

define('USER_FILENAME',__DIR__.'/users.txt');

$errors = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    processRequest();
}

function processRequest()
{
    global $errors, $data;

    $fields = ['first_name','last_name','email','password'];

    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = 'Значение не может быть пустым';
        }

        $data[$field]= isset($_POST[$field]) ? $_POST[$field] :'';
    }

    if (mb_strpos($data['email'],'@')===false){
        $errors['email'] = 'Email должен содержать символ @';
    }
    if (count($errors)==0){
        saveUser();
        header('Location: done.html');
        exit();
    }

}
function saveUser()
{
    global $data;

    $file = fopen(USERS_FILENAME, 'a');
    fputs($file,implode("\t",$data)."\n");
    fclose($file);

}

function getError($field)
{
    global $errors;

    if (!empty($errors[$field])){//проверяем, что ошибка у переданного поля есть
        return '<p class="error">'.$errors[$field].'</p>';// возвращаем ошибку с тегом <p> и классом error
    }
        return'';// ошибки нет, возвращаем пустую строку

}

function getValue($field)
{
    global $data;

    return isset($data[$field])? $data[$field] :'';
}
