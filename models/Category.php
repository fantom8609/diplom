<?php

/**
 * Класс Category - модель для работы с категориями
 */
class Category
{
	        /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
    public static function getCategoriesListAdmin()
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


    public static function getSpecialById($catId) {

        switch($catId) {
            case 1:  $special="PHP-developer";break;
            case 2:  $special="Java-script developer";break;
            case 3:  $special="Дизайнер";break;
            case 4:  $special="Верстальщик";break;
            case 5:  $special="SEO-специалист";break;
        }
        return $special;
    }

    
}
