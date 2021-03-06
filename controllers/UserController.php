<?php
include ROOT . '/config/constants.php';
/**
 * Контроллер UserController
 */
class UserController
{
    
    /**
     * Action для страницы "Регистрация"
     */
    public function actionRegister()
    {
        // Переменные для формы
        $name = false;
        $surname = false;
        $age = false;
        $spec = false;
        $work_exp = false;
        $password = false;
        $email = false;

        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $name = htmlspecialchars(trim($_POST['name']));
            $surname = htmlspecialchars(trim($_POST['surname']));
            $age = htmlspecialchars(trim($_POST['age']));
            $spec = htmlspecialchars(trim($_POST['spec']));
            $work_exp = htmlspecialchars(trim($_POST['work_exp']));
            $password = htmlspecialchars(trim($_POST['password']));
            $password_r = htmlspecialchars(trim($_POST['password_r']));
            $email = htmlspecialchars(trim($_POST['email']));
            
            $new_password = password_hash($password, PASSWORD_BCRYPT, ['salt' => SALT]);
            
            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
             if (!User::checkName($surname)) {
                $errors[] = 'Фамилия не должна быть короче 2-х символов';
            }
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
             
                $result = User::register($name, $surname, $age, $spec, $work_exp, $new_password, $email);

                /*$userId = User::checkUserData($email, $new_password);
                
                User::auth($userId);*/
                
             }
        }

        // Подключаем вид
        require_once(ROOT . '/views/user/register.php');
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
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $email = htmlspecialchars(trim($_POST['email']));
            $password = htmlspecialchars(trim($_POST['password']));
            
            /*//хэшируем
            $new_password = password_hash($password, PASSWORD_BCRYPT, ['salt' => SALT]);
            echo $email.' '.$new_password;*/
            // Флаг ошибок
            $errors = false;
            
            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);
            if (!$userId) {$errors[] = 'failt';}

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        // Стартуем сессию
        session_start();
        
        // Удаляем информацию о пользователе из сессии

        unset ($_SESSION['user']);
        
        // Перенаправляем пользователя на главную страницу
        header("Location: /user/login");
    }

        /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function actionView($userId)
    {
        $user = User::getUserById($userId);
        $categoryList = Category::getCategoriesListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin/view_user.php');
        
        return true;
    }



    public function actionEdit($userId) {

        $user = User::getUserById($userId);

        // Переменные для формы
        $name = false;
        $surname = false;
        $age = false;
        $spec = false;
        $work_exp = false;
        $password = false;
        $email = false;

        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $age = $_POST['age'];
            $spec = $_POST['spec'];
            $work_exp = $_POST['work_exp'];
            $password = $_POST['password'];
            
            $email = $_POST['email'];
            

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
             if (!User::checkName($surname)) {
                $errors[] = 'Фамилия не должна быть короче 2-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            
           

            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
             
                $result = User::edit($userId,$name, $surname, $age, $spec, $work_exp, $password, $email);
               
             }
        }
        require_once(ROOT . '/views/admin/edit_user.php');
        
        return true;

    }


     public function actionDelete($userId) {

     
            User::deleteUserById($userId);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/upravlenie");
        }

     




    



}
