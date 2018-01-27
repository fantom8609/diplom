<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/main_menu_admin.php'; ?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">

        <div class="signup-form"><!--sign up form-->

          <h2>Добавить задачу для <?php echo $user['name']." ".$user['surname'] ?></h2>
          <form action="#" method="post" enctype="multipart/form-data">
            <h5>Название</h5>
            <input type="text" name="title"  />
            <h5>Подробное описание</h5>
            <textarea  name="coment" rows="8"></textarea> 
            <h5>Выберите файл для загрузки</h5>
            <input type="file" name="uploaded_file[]" multiple id="uploaded_file" >
            <input type="submit" name="submit" class="btn btn-default" value="Добавить" />
          </form>

        </div><!--/sign up form-->
      </div>
      <div class="col-sm-4 padding-right">
      </div>
    </div>
  </div>

</section>
<?php include ROOT . '/views/layouts/footer_admin.php'; ?>