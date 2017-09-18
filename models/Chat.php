<?php

class Chat {
    public static function addMessedgeByUserId($user_id, $text)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO chat (text,user_id) '
        . 'VALUES (:text, :user_id)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function getMessages()
        {
        // Соединение с БД
            $db = Db::getConnection();

        // Запрос к БД
            $result = $db->query('SELECT id, text, user_id FROM chat');

        // Получение и возврат результатов
            $i = 0;
            $messages = array();
            while ($row = $result->fetch()) {
                $messages[$i]['id'] = $row['id'];
                $messages[$i]['text'] = $row['text'];
                $messages[$i]['user_id'] = $row['user_id'];
                $i++;
            }
            return $messages;
        }
}

