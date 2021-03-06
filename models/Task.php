<?php

/**
 * Класс Task - модель для работы с задачами
 */
class Task
{

    /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
    public static function getTasksList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, title, coment, status, upload, user_id FROM task');

        // Получение и возврат результатов
        $i = 0;
        $taskList = array();
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['title'] = $row['title'];
            $taskList[$i]['coment'] = $row['coment'];
            $taskList[$i]['status'] = $row['status'];
            $taskList[$i]['upload'] = $row['upload'];
            $taskList[$i]['user_id'] = $row['user_id'];
            $i++;
        }
        return $taskList;
    }

      /**
     * Возвращает продукт с указанным id
     * @param integer $id <p>id товара</p>
     * @return array <p>Массив с информацией о задаче</p>
     */
      public static function getTaskById($id)
      {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM task WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }

    public static function addTaskByUserId($user_id) {

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO task (title, coment, status, user_id, upload) '
        . 'VALUES (:title, :coment, :status, :user_id, :upload)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':coment', $coment, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':upload', $upload, PDO::PARAM_STR);
        return $result->execute();
    }




    public static function getTasksByUserId($user_id) {
         // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $sql = 'SELECT id, title, coment, status, user_id, upload FROM task WHERE user_id = :user_id ORDER BY id ASC ';
        
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        //выполнение запроса
        $result->execute();

        // Получение и возврат результатов
        $tasks = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $tasks[$i]['id'] = $row['id'];
            $tasks[$i]['title'] = $row['title'];
            $tasks[$i]['coment'] = $row['coment'];
            $tasks[$i]['upload'] = $row['upload'];
            $tasks[$i]['status'] = $row['status'];
            $tasks[$i]['user_id'] = $row['user_id'];
            
            $i++;
        }
        return $tasks;
    }
    public static function getTaskByUserId($user_id) {
         // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $sql = 'SELECT id, title, coment, status, user_id, upload FROM task WHERE user_id = :user_id ORDER BY id ASC ';
        
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        //выполнение запроса
        $result->execute();

        // Получение и возврат результатов
        $task = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $task[$i] = $row['id'];
            $task[$i] = $row['title'];
            $task[$i] = $row['coment'];
            $task[$i] = $row['upload'];
            $task[$i] = $row['status'];
            $task[$i] = $row['user_id'];
            
            $i++;
        }
        return $tasks;
    }

// Изменение статусов задач
    public static function changeTasksStatusToCompleted($taskId) {

        $db = Db::getConnection();
        $status = "2";

        // Текст запроса к БД
        $sql = "UPDATE task
        SET 
        status = :status 
        WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $taskId, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->execute();
        return $status;
    }


    public static function changeTasksStatusToFailed($taskId) {

        $db = Db::getConnection();
        $status = "3";

        // Текст запроса к БД
        $sql = "UPDATE task
        SET 
        status = :status 
        WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $taskId, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->execute();
        return $status;

    }


    public static function changeTasksStatusToActive($taskId) {

        $db = Db::getConnection();
        $status = "1";

        // Текст запроса к БД
        $sql = "UPDATE task
        SET 
        status = :status 
        WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $taskId, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->execute();
        return $status;

    }


    public static function deleteTaskById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM task WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }










    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createTaskByUserId($userId,$title,$coment,$path_in_project)
    {
        // Соединение с БД
        $db = Db::getConnection();
        $status="1";

        // Текст запроса к БД
        $sql = 'INSERT INTO task (title, coment, status, user_id, upload) '
        . 'VALUES (:title, :coment, :status, :user_id, :path_in_project)';
        
        $path_in_project = json_encode($path_in_project);
        
       //замена обратных слешей на прямые 
        $path_in_project = str_replace('\\', '/', $path_in_project);  
        
        //удаление лишних слешей
        $path_in_project = preg_replace("/\/\/+/","/",$path_in_project);

// Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':coment', $coment, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':path_in_project', $path_in_project, PDO::PARAM_STR);
      
        $result->execute();

    }

    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function otmetkaTaskByUserId($userId,$coment,$path_in_project)
    {
        // Соединение с БД
        $db = Db::getConnection();
        $status="3";

        // Текст запроса к БД
        $sql = 'UPDATE task SET comment_user = :comment_user, upload_user = :path_in_project,
        status = :status
        WHERE user_id = :user_id';
        
        $path_in_project = json_encode($path_in_project);
        
       //замена обратных слешей на прямые 
        $path_in_project = str_replace('\\', '/', $path_in_project);  
        
        //удаление лишних слешей
        $path_in_project = preg_replace("/\/\/+/","/",$path_in_project);

// Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':comment_user', $coment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':path_in_project', $path_in_project, PDO::PARAM_STR);
      
        if(!$result->execute()) echo "FAILT";

    }


    /**
     * Возвращает текстое пояснение статуса для категории :<br/>
     * <i>0 - Скрыта, 1 - Отображается</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getStatusTask($status)
    {
        switch ($status) {
            case '1':
            return 'Выполняется';
            break;
            case '2':
            return 'Выполнено';
            break;
            case '3':
            return 'Провалено';
            break;
        }
    }



    /**
     * Возвращает массив категорий для списка в админпанели <br/>
     * (при этом в результат попадают и включенные и выключенные категории)
     * @return array <p>Массив категорий</p>
     */
    public static function getCategoriesListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC');

        // Получение и возврат результатов
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * Удаляет категорию с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteCategoryById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM category WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирование категории с заданным id
     * @param integer $id <p>id категории</p>
     * @param string $name <p>Название</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE category
        SET 
        name = :name, 
        sort_order = :sort_order, 
        status = :status
        WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }


    /**
     * Добавляет новую категорию
     * @param string $name <p>Название</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createCategory($name, $sortOrder, $status)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO category (name, sort_order, status) '
        . 'VALUES (:name, :sort_order, :status)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->execute();
    }
    
    
    // оценка
     public static function setMark($taskId, $difficultly, $work_cost, $coef_working) {

        $db = Db::getConnection();
         // Текст запроса к БД
        $sql = "UPDATE task
        SET 
        difficultly = :difficultly, 
        work_cost = :work_cost, 
        coef_working = :coef_working
        WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $taskId, PDO::PARAM_INT);
        $result->bindParam(':difficultly', $difficultly, PDO::PARAM_INT);
        $result->bindParam(':work_cost', $work_cost, PDO::PARAM_INT);
        $result->bindParam(':coef_working', $coef_working, PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function checkMark($difficultly, $work_cost, $coef_working) {
        if (filter_var($difficultly, FILTER_VALIDATE_FLOAT) && 
                filter_var($work_cost, FILTER_VALIDATE_FLOAT)&& 
                filter_var($coef_working, FILTER_VALIDATE_FLOAT) ) {
            return true;
        }
        return false;
    }

}
