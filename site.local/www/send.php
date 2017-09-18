<?php

// отправка сообщения

require 'config.php'; // подключаем конфиг

$sender = $_POST['sender'];

$text = $_POST['message'];

$message = "\n$sender написал: $text"; // шаблон нашего сообщения

// функция iconv() меняет кодировку в тексте
// поменяем в отправленном сообщении кодировку с UTF-8 на WINDOWS-1251 (или cp1251)
//$message = iconv("UTF-8", "WINDOWS-1251", $message);

$file = fopen($filename, 'a'); // открываем файл для редакции

fwrite($file, $message); // записываем отправленное сообщение в чат

fclose($file); // закрываем файл

?>