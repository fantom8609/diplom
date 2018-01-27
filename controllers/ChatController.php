<?php

class ChatController {
    /**
     * 
     * @param int $user_id 
     * @return boolean
     */
    public function actionSendMessage($user_id) {
        
        $text = $_POST['message'];
        
        $user = User::getUserById($user_id);
        
        $user_name = $user['name'];
        
       // $message = "\n$user_name написал: $text"; // шаблон нашего сообщения
        
        Chat::addMessedgeByUserId($user_id, $text);
        
        //$messages = Chat::getMessages();
        
        return true;
    }
    
    /**
     * 
     * @return boolean
     */
    public function actionShowMessages() {
        
        $messages = Chat::getMessages();
        //$messages = array_reverse($messages);
        
        foreach ($messages as $message) {
            $user_id = $message['user_id'];
            $user = User::getUserById($user_id);
            $user_name = $user['name'];
            $text = $message['text'];
            $message_view = "\n$user_name написал: $text";
            echo $message_view . "<br>";
            
        }        
        return true;
    }
    
}

