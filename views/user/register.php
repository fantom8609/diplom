<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">


                
                <?php if ($result): ?>
                    <p>Вы зарегистрированы! <a href="/">перейти в личный кабинет</a></p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; print_r($_SESSION); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>



                    <div class="signup-form"><!--sign up form-->
                        <h2>Регистрация в системе</h2>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Имя" />
                            <input type="text" name="surname" placeholder="Фамилия" />
                            <input type="text" name="age" placeholder="Возраст" />


                            <div class="select-and-input">
                                <select placeholder="Специализация" name="selectName" onchange="parentNode.getElementsByTagName('input')[0].value=value">
                                    <option value=" "> </option>
                                    <option value="PHP-developer">PHP-developer</option>
                                    <option value="Java-script developer">Java-script developer</option>
                                    <option value="Дизайнер">Дизайнер</option>
                                    <option value="Верстальщик">Верстальщик</option>
                                    <option value="SEO-специалист">SEO-специалист</option>
                                </select>
                                <input placeholder="Специализация" type="text" name="spec"/>
                            </div>

                            <input type="text" name="work_exp" placeholder="Рабочий стаж(полных месяцев)" />
                            <input type="text" name="work_exp" placeholder="Рабочий стаж(полных месяцев)" />

                            <input type="password" name="password" placeholder="Пароль"/>
                            <input type="password" name="password_r" placeholder="Повторите пароль"/>

                            <input type="email" name="email" placeholder="E-mail"/>
                            
                            <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
                        </form>
                        <a href="/user/login">Вход</a> <br>
                        <a href="/admin/login">Вход в панель администратора</a>
                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>