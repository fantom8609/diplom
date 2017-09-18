<?php

// вывод сообщений

require 'config.php'; // подключаем конфиг

$file = file($filename);

$count = count($file);

for($i = $count; $i-- > 0;) {
    echo $file[$i]; // выводим сообщение
    echo "<br>"; // а вместе с ним HTML-тег <br> для переноса строки
}

?>