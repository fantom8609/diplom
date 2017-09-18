<?php
function postexec($url, $fields="", $method="POST")
{
$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL,$url); // set url to post to  
curl_setopt($ch, CURLOPT_FAILONERROR, 1);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable  
curl_setopt($ch, CURLOPT_TIMEOUT, 20); // times out after 20s  
curl_setopt($ch, CURLOPT_POST, 1); // set POST method  
curl_setopt($ch, CURLOPT_POSTFIELDS, "$fields"); // add POST fields  
$result = curl_exec($ch); // run the whole process  
curl_close($ch);  
return $result;
}

$user="login";    // ваш логин
$pass="password"; // ваш пароль

// расскомментировать эти строки для отправки смс

$phone="79123456789";
$msg="message";
$from="from";
$result=postexec("http://litesms.net/sms.php", "action=send_sms&login=$user&password=$pass&phone=$phone&message=$msg&from=$from&translit=1");


//получаем текущий баланс
$result=postexec("http://litesms.net/sms.php", "action=balance&login=$user&password=$pass");

if($result=="Error: Auth failed")
 $result="Ошибка аутентификации!";
if($result=="Error: can't send this message")
 $result="Какое-то из полей СООБЩЕНИЕ или ОТПРАВИТЕЛЬ задано некорректно!";
if($result=="Error: your credit is null")
 $result="Недостаточно средств для отправки сообщения. Пополните баланс.";
if($result=="Error: unsupported phone number")
 $result="Неподдерживаемый номер телефона";

echo "Result: $result";

$start=strrpos($result, "Message_ID");
if($start>0) {
 $id=substr($result, $start+11);
 $result="OK ID=$id";
}
?>