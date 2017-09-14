<?php

class Admin
{
    /**
     * Регистрация пользователя 
     * @param string $name <p>Имя</p>
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function register($email, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO admin (email,password) '
        . 'VALUES (:email, :password)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function checkUserData($email, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM admin WHERE email = :email AND password = :password';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        // Обращаемся к записи
        $user = $result->fetch();

        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id'];
        }
        return false;
    }


    public static function auth($adminId)
    {
        // Записываем идентификатор admina в сессию
        $_SESSION['admin'] = $adminId;
    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['admin'])) {
            return $_SESSION['admin'];
        }
        header("Location: /admin/login");
    }



        /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
        public static function getCategoriesList()
        {
        // Соединение с БД
            $db = Db::getConnection();

        // Запрос к БД
            $result = $db->query('SELECT id, name FROM category');

        // Получение и возврат результатов
            $i = 0;
            $categoryList = array();
            while ($row = $result->fetch()) {
                $categoryList[$i]['id'] = $row['id'];
                $categoryList[$i]['name'] = $row['name'];
                $i++;
            }
            return $categoryList;
        }



        public static function search($words) {

            $words = htmlspecialchars($words);
            if ($words === "") return false;
            $query_search = "";
            $arraywords = explode(" ",$words);
            foreach ($arraywords as $key => $value) {
                if (isset($arraywords[$key-1])) {
                    $query_search .= ' OR ';
                }
                $query_search .= 'name LIKE "%'.$value.'%" OR surname LIKE "%'.$value.'%"';
            }
            $query = "SELECT * FROM user WHERE $query_search";
            $db = Db::getConnection();

            $result_set = $db->query($query);
            $results = array();
            $i = 0;
            while ($row = $result_set->fetch()) {
                $results[$i] = $row;
                $i++;
            }
            return $results;
        }


    }