<?php include ROOT . '/views/layouts/header.php'; ?>
<link href="/template/css/style.css" rel="stylesheet">
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>Вы зарегистрированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Регистрация в системе</h2>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
                            <input type="text" name="surname" placeholder="Фамилия" value="<?php echo $surname; ?>"/>
                            <input type="text" name="age" placeholder="Возраст" value="<?php echo $age; ?>"/>
                            <input type="text" name="spec" placeholder="Специализация" value="<?php echo $spec; ?>"/>
                            <input type="text" name="work_exp" placeholder="Рабочий стаж(полных месяцев)" value="<?php echo $work_exp; ?>"/>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                            <input type="password" name="password_r" placeholder="Повторите пароль" value="<?php echo $password_r; ?>"/>

                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                            
                            <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />



        <div class="select-and-input">
                <select placeholder="Специализация" name="selectName" onchange="parentNode.getElementsByTagName('input')[0].value=value">
                    <option value=" "> </option>
                    <option value="PHP-developer">PHP-developer</option>
                    <option value="Java-script developer">Java-script developer</option>
                    <option value="Дизайнер">Дизайнер</option>
                    <option value="Верстальщик">Верстальщик</option>
                    <option value="SEO-специалист">SEO-специалист</option>
                </select>
                <input placeholder="Специализация" type="text" name="inputText"/>
        </div>




                        </form>
                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>