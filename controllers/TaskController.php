<?php

/**
 * Контроллер TaskController
 * Товар
 */
class TaskController
{
    /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function actionView($taskId)
    {
        // Список категорий для левого меню
        $tasks = Task::getTasksList();

        // Получаем инфомрацию о задаче
        $task = Task::getTaskById($taskId);
        if($task['status'] == 1) {$status = "Текущая";}
        elseif($task['status'] == 2) {$status = "Проваленная";}
        elseif($task['status'] == 3) {$status = "Выполненная";}
        $pathes = json_decode($task['upload']);


        // Подключаем вид
        require_once(ROOT . '/views/task/view.php');
        return true;
    }


    /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function actionAdminviewtask($taskId)
    {
        // Список категорий для левого меню
        $tasks = Task::getTasksList();  
        // Получаем инфомрацию о задаче
        $task = Task::getTaskById($taskId);
        $user_id = $task['user_id'];
        
        $pathes = json_decode($task['upload']);
        
        $user = User::getUserById($user_id);

        // Подключаем вид

        require_once(ROOT . '/views/admin/task_view.php');
        
        return true;
    }




    public function actionTasksofuser($userId) {

        $user = User::getUserById($userId);

        $tasks = Task::getTasksByUserId($userId);
        $user_id = $user['id'];
        
        require_once(ROOT . '/views/admin/view_tasks_of_user.php');
        
        //require_once(ROOT . '/views/site/index.php');
        return true;
    }

    //ADMIN ADD TASK
    public function actionAddtask($userId) {

        $user = User::getUserById($userId);

        // Переменные для формы
        $title = false;
        $coment = false;
        $upload = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $title = $_POST['title'];
            $coment = $_POST['coment'];
           // $upload = $_FILES["uploaded_file"]["tmp_name"];

            $files = $_FILES["uploaded_file"];
            print_r($files);
            
            //считаем количество файлов по именам
            $count = count($files['name']);
            echo "<br>";
            for($i=0;$i < $count;$i++) {  
                $upload_name[$i] = $files["name"][$i];
                echo $upload_name[$i];
                $tmp_name[$i] = $files['tmp_name'][$i];
                $path_in_project[$i] = $_SERVER['DOCUMENT_ROOT']."/upload/{$upload_name[$i]}"." (admin)";
            // Проверим, загружалось ли через форму file
                if (is_uploaded_file($files['tmp_name'][$i])) {
                // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($files['tmp_name'][$i], $path_in_project[$i]);
                }
            }
            echo "<br>";
            print_r($path_in_project);
            //добавим задачу и получим ее айди
            Task::createTaskByUserId($userId,$title,$coment,$path_in_project);
            

        }
        require_once(ROOT . '/views/admin/task_add.php');
        return true;
    }



     /**
     * Action для добавления товара в корзину при помощи асинхронного запроса (ajax)
     * @param integer $id <p>id товара</p>
     */
     public function actionSetCompletedAjax($taskId)
     {
        // Добавляем товар в корзину и печатаем результат: количество товаров в корзине
        $status = Task::changeTasksStatusToCompleted($taskId);
        echo Task::getStatusTask($status);
        
        return true;
    }

    public function actionSetFailedAjax($taskId)
    {
        // Добавляем товар в корзину и печатаем результат: количество товаров в корзине
        $status =Task::changeTasksStatusToFailed($taskId);
        echo Task::getStatusTask($status);
        return true;
    }

    public function actionDeleteAjax($taskId)
    {
        // Добавляем товар в корзину и печатаем результат: количество товаров в корзине
        Task::deleteTaskById($taskId);
        $task = Task::getTaskById($taskId);
        
        echo "Задача удалена";
        return true;
    }


    public function actionActivateAjax($taskId)
    {
        // Добавляем товар в корзину и печатаем результат: количество товаров в корзине
        $status =Task::changeTasksStatusToActive($taskId);
        echo Task::getStatusTask($status);
        return true;
    }
    
    public function actionMarkAjax($taskId)
    {
        $difficultly = $_POST['difficultly'];
        $work_cost = $_POST['work_cost'];
        $coef_working = $_POST['coef_working'];
        if (!Task::checkMark($difficultly, $work_cost, $coef_working)) {
            echo "Ошибка при вводе данных";
        }
        else {
            Task::setMark($taskId,$difficultly,$work_cost,$coef_working);
            echo "Данные успешно сохранены";
        }
        return true;
    }

    public function actionOtmetka() {
        
        $userId = $_SESSION['user'];
        // Переменные для формы
        $title = false;
        $coment = false;
        $upload = false;

        // Обработка формы
        if (isset($_POST['submit_task'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $coment = $_POST['coment'];

            $files = $_FILES["uploaded_file"];
            print_r($files);
            
            //считаем количество файлов по именам
            $count = count($files['name']);
            echo "<br>";
            for($i=0;$i < $count;$i++) {  
                $upload_name[$i] = $files["name"][$i];
                echo $upload_name[$i];
                $tmp_name[$i] = $files['tmp_name'][$i];
                $path_in_project[$i] = $_SERVER['DOCUMENT_ROOT']."/upload/{$upload_name[$i]}"." (user)";
            // Проверим, загружалось ли через форму file
                if (is_uploaded_file($files['tmp_name'][$i])) {
                // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($files['tmp_name'][$i], $path_in_project[$i]);
                }
            }
            //добавим задачу и получим ее айди
            Task::otmetkaTaskByUserId($userId,$coment,$path_in_project);
            

        }
        require_once(ROOT . '/views/admin/task_add.php');
        return true;
    }
    











}
