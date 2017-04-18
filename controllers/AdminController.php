<?php

/**
 * Контроллер AdminController
 * Главная страница в админпанели
 */
class AdminController
{
    /**
     * Action для стартовой страницы "Панель администратора"
     */
    public function actionIndex()
    {
        // Проверка доступа
        //self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();
        $users = User::getUsersList();

        // Подключаем вид
        require_once(ROOT . '/views/admin/admin.php');
        return true;
    }

    /**
     * Action для страницы "Регистрация"
     */
    public function actionRegister()
    {
        // Переменные для формы
        $email = false;
        $password = false;
        $password_r = false;

        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $password = $_POST['password'];
            $password_r = $_POST['password_r'];
            $email = $_POST['email'];
            
            // Флаг ошибок
            $errors = false;

            // Валидация полей
           
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            if($password != $password_r) {
                $errors[] = 'Пароли не совпадают';
            }
            
            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
             
                $result = Admin::register($email,$password);

                $adminId = Admin::checkUserData($email, $password);
                Admin::auth($adminId);
             }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/register.php');

        return true;
    }


        /**
     * Action для страницы "Вход на сайт"
     */
    public function actionLogin()
    {
        // Переменные для формы
        $email = false;
        $password = false;
        $password_r = false;
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_r = $_POST['password_r'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if($password != $password_r) {
                $errors[] = 'Пароли не совпадают';
            }

            // Проверяем существует ли пользователь
            $adminId = Admin::checkUserData($email, $password);

            if ($adminId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                Admin::auth($adminId);

                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /admin/index.php");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/login.php');
        return true;
    }



        public function actionLogout()
    {
        // Стартуем сессию
        session_start();
        
        // Удаляем информацию о пользователе из сессии

        unset ($_SESSION['admin']);
        
        // Перенаправляем пользователя на главную страницу
        header("Location: /admin/login");
    }


        public function actionUpravlenie()
    {
        // Проверка доступа
        //self::checkAdmin();

        
        //$categoriesList = Category::getCategoriesListAdmin();
        $users = User::getUsersList();

        // Подключаем вид
        require_once(ROOT . '/views/admin/upravlenie.php');
        return true;
    }


   /* public function actionSearch() {

        if (isset($_POST['bsearch'])) {
            $words = $_POST['words'];
        }

        $result = Admin::search($words);



        require_once(ROOT . '/views/admin/upravlenie.php');
        return true;

    }*/







    












}
