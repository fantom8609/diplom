<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if ($result): ?>
                    <p>Вы зарегистрированы! <a href="/admin/index.php">перейти в личный кабинет</a></p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; print_r($_SESSION); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Регистрация в панеле администратора</h2>
                        <form action="#" method="post">

                            <input type="email" name="email" placeholder="E-mail"/>
                            <input type="password" name="password" placeholder="Пароль"/>
                            <input type="password" name="password_r" placeholder="Повторите пароль"/>

                            <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
                        </form>
                        <a href="/admin/login">Вход</a>

                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>