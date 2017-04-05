<?php

/**
 * Контроллер ProductController
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

        // Подключаем вид
        require_once(ROOT . '/views/task/view.php');
        return true;
    }

    





}
