<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/main_menu_admin.php'; ?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">

       <?php if ($result): ?>
                    <p>Данные сотрудника <?php echo $user['name']." ".$user['surname'] ?> отредактированы  успешно <a href="/admin/upravlenie/">перейти обратно к списку</a></p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; print_r($_SESSION); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

        <div class="signup-form"><!--sign up form-->
        <h2>Редакттирование данных сотрудника <?php echo $user['name']." ".$user['surname'] ?></h2>
          <form action="#" method="post">
           Имя:  <input type="text" name="name" placeholder="Имя" value="<?php echo $user['name']; ?>" />
           Фамилия: <input type="text" name="surname" placeholder="Фамилия" value="<?php echo $user['surname']; ?>" />
           Возраст: <input type="text" name="age" placeholder="Возраст" value="<?php echo $user['age']; ?>"/>


           Специальность: <div class="select-and-input">
              <select placeholder="Специализация" name="selectName" onchange="parentNode.getElementsByTagName('input')[0].value=value">
                <option value=" "> </option>
                <option value="PHP-developer">PHP-developer</option>
                <option value="Java-script developer">Java-script developer</option>
                <option value="Дизайнер">Дизайнер</option>
                <option value="Верстальщик">Верстальщик</option>
                <option value="SEO-специалист">SEO-специалист</option>
              </select>
              <input placeholder="Специализация" type="text" name="spec" value="<?php echo $user['spec']; ?>"/>
            </div>

            <input type="text" name="work_exp" placeholder="Рабочий стаж(полных месяцев)" />
           Рабочий стаж(мес.) <input type="text" name="work_exp" placeholder="Рабочий стаж(полных месяцев)" value="<?php echo $user['work_exp']; ?>" />

           Пароль: <input type="text" name="password" placeholder="Пароль" value="<?php echo $user['password']; ?>"/>

           Email: <input type="email" name="email" placeholder="E-mail" value="<?php echo $user['email']; ?>"/>

            <input type="submit" name="submit" class="btn btn-default" value="Редактировать" />
          </form>
         
      
      </div>
    <?php endif ?>



      <div class="col-sm-4 padding-right">



      </div>
    </div>
  </div>

</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>