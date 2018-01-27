<?php
include ROOT . '/config/constants.php';
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
       // $breadkrumb[0] = "/admin/index.php"; 
        $categoriesList = Category::getCategoriesListAdmin();
        $users = User::getUsersList();

        // Подключаем вид
        require_once(ROOT . '/views/admin/admin.php');
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
            $password = htmlspecialchars(trim($_POST['password']));
            $password_r = htmlspecialchars(trim($_POST['password_r']));
            $email = htmlspecialchars(trim($_POST['email']));
            
            //$new_password = password_hash($password, PASSWORD_BCRYPT, ['salt' => SALT]);
            

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
                echo $password;
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
    
    
        public function actionRating()
    {
        // Подключаем вид
        require_once(ROOT . '/views/admin/rating.php');
        return true;
    }
    
        public function actionStatistic()
    {
        // Подключаем вид
        require_once(ROOT . '/views/admin/statistic.php');
        return true;
    }
    
        public function actionSettings()
    {

        // Подключаем вид
        require_once(ROOT . '/views/admin/settings.php');
        return true;
    }
    
    public function actionLine() {

        $result = Parse::run_parse();
        require_once(ROOT . '/views/admin/line.php');
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
