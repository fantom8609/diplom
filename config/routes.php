<?php

return array(

   /*
    // Каталог:
    'catalog' => 'catalog/index', // actionIndex в CatalogController
    // Категория товаров:
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController   
    'task/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController
    // Корзина:
    'cart/checkout' => 'cart/checkout', // actionAdd в CartController    
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController    
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController    
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax в CartController
    'cart' => 'cart/index', // actionIndex в CartController
    // Пользователь:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    // Управление товарами:    
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    // Управление категориями:    
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    // Управление заказами:    
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    // Админпанель:
    'admin' => 'admin/index',
    // О магазине
    'contacts' => 'site/contact',
    'about' => 'site/about',
    */
     
    
    


    //установка выолненного статуса задаче
    'admin/task/setCompleted/([0-9]+)' => 'task/setCompletedAjax/$1',
    'admin/task/setFailed/([0-9]+)' => 'task/setFailedAjax/$1',
    'admin/task/activate/([0-9]+)' => 'task/activateAjax/$1',
    'admin/task/delete/([0-9]+)' => 'task/deleteAjax/$1',
    
    //оценка задачи
    'admin/task/mark/([0-9]+)' => 'task/markAjax/$1',

    


    //информация о задаче у админа
    'admin/task/([0-9]+)' => 'task/Adminviewtask/$1',



    //вывод задач пользователя 
    'admin/tasks/([0-9]+)' => 'task/tasksofuser/$1',

    //удаление пользователя
    'admin/delete/user/([0-9]+)' => 'user/delete/$1',

    //редактирование пользователя
    'admin/edit/user/([0-9]+)' => 'user/edit/$1',

    //добавить задачу
    'admin/task/add/([0-9]+)' => 'task/addtask/$1',

    
    //управление аккаунтами
    'admin/upravlenie' => 'admin/upravlenie',
    
    //рейтинг сотрудников
    'admin/rating' => 'admin/rating',
    
    //статистика сотрудников
    'admin/statistic' => 'admin/statistic',
    
    //настройки сайта
    'admin/settings' => 'admin/settings',
    
    //новости 
    'admin/line' => 'admin/line',
    
    
    //показать данные пользователя
    'user/([0-9]+)' => 'user/view/$1',

    //Вывести сотрудника по категории
     'category/([0-9]+)' => 'category/category/$1', // actionCategory в CategoryController   

    //Вход в админпанель
    'admin/login' => 'admin/login',
    'admin/logout' => 'admin/logout',

    //Вход в админпанель
    'admin' => 'admin/index',

    //вход/выход
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    //регистрация пользователя
    'user/register' => 'user/register',

    //выполнение задачи пользователем
    'task/([0-9]+)/complete' => 'task/view/$1', 

    // задача:
    'task/([0-9]+)' => 'task/view/$1', // actionView в TaskController

    //страница рейтинг
    'rating' => 'site/rating',

    //информация о пользователе
    'profile/([0-9]+)' => 'site/profile/$1',
    
    //страница "профиль"
    'statistic' => 'site/statistic',
    
    //онлайн чат
    'show/messages' => 'chat/showMessages',
    'send/([0-9]+)' => 'chat/sendMessage/$1',
    

    // Главная страница
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index/$1', // actionIndex в SiteController
);
