<?php 
include 'simple_html_dom.php';

function curl_get($uri, $referer = 'http://www.google.com') {
//Инициализируем сеанс
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $uri);
// нас не интересуют заголовки(куки,сессии)
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozila/5.0 (Windows NT 6.1; WOW64;rv:38.0) Gecko/20100101 Firefox/38.0");
curl_setopt($ch, CURLOPT_REFERER, $referer);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}

$html = curl_get("http://newsorel.ru",'http://www.google.com' );
$dom = str_get_html($html);
$titles = $dom->find('.post-title');

$i=1;

// парсинг тайтлов новостей
/*foreach ($titles as $title) {
        echo $i . ') ' . $title . "<br>";
        $i++;
    }*/

//парсинг ссылок на новости
/*foreach ($titles as $title) {
        echo $i . ') ' . $title->href . "<br>";
    }*/
    
//парсинг одной новости полностью
/*foreach ($titles as $title) {
        $new = curl_get("http://newsorel.ru/".$title->href);
        echo $new;
        break;
        file_put_contents('1.txt', $new);
    }*/
    
//парсинг времени новости из новости
foreach ($titles as $title) {
    $new = curl_get("http://newsorel.ru/" . $title->href);
    //делаем из штмл элеменов объекты
    $one_dom = str_get_html($new);
    $meta_of_new = $one_dom->find('.post-meta', 0);
    //выводит неодчеркиваемую ссылку
    echo $i.$title . " " . $meta_of_new->plaintext . "<br>";
    $i++;
    //if($i==31) {break;}
}






//file_put_contents('1.txt', $titles);
?>