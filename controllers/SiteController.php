<?php

/**
 * Контроллер CartController
 */
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {

        // Список категорий для левого меню
        $categories = array();
        $categories = Category::getCategoriesList();


        $tasks = Task::getTasksList();

        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    /**
     * Action для страницы "Контакты"
     */
    
    
    /**
     * Action для страницы "О магазине"
     */
    public function actionProfile()
    {
        // Подключаем вид
        require_once(ROOT . '/views/site/profile.php');
        return true;
    }

        /**
     * Action для страницы "О магазине"
     */
    public function actionStatistic()
    {
        // Подключаем вид
        require_once(ROOT . '/views/site/statistic.php');
        return true;
    }

            /**
     * Action для страницы "О магазине"
     */
    public function actionRating()
    {
        // Подключаем вид
        require_once(ROOT . '/views/site/rating.php');
        return true;
    }




}
