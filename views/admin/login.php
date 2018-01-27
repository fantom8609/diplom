<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">


                 <?php if (Admin::auth($adminId)): ?>
                    <p>Добро пожаовать! <a href="/admin/index.php">войти в панель управления системой</a></p>
                <?php endif; ?>
        

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="signup-form"><!--sign up form-->
                    <h2>Вход в панель администратора</h2>
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="E-mail" />
                        <input type="password" name="password" placeholder="Пароль" />
                        <input type="password" name="password_r" placeholder="Повторите пароль" />
                        <input type="submit" name="submit" class="btn btn-default" value="Вход" />
                    </form>
                </div><!--/sign up form-->


                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>