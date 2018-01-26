<?php

/**
 * Контроллер CatalogController
 * Каталог товаров
 */
class CategoryController
{
    public function actionIndex() {

        $categoryList = Category::getCategoriesListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/catalog/category.php');
        return true;

    }




    /**
     * Action для страницы "Категория товаров"
     */
    public function actionCategory($categoryId)
    {

        
        //echo $categoryId;

        $categoryList = Category::getCategoriesListAdmin();
        

        // Список товаров в категории
        $categoryUsers = User::getUsersListByCategory($categoryId);

        // Общее количетсво товаров (необходимо для постраничной навигации)
       // $total = User::getTotalProductsInCategory($categoryId);


        // Подключаем вид
        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }

}
