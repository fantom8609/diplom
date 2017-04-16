<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/main_menu_admin.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h5>Выберите категорию сотрудников:</h5>

                    <div class="panel-group category-products">
                        <?php foreach($categoriesList as $categoryItem): ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a href="/category/<?php echo $categoryItem['id'];?>" 
                                          class="<?php if($categoryId==$categoryItem['id']) echo 'active';?>">
                                          <?php echo $categoryItem['name'];?>
                                      </a>
                                  </h4>

                              </div>
                          </div>

                      <?php endforeach; ?>
                  </div>
              </div>
          </div>



          <div class="col-sm-4 padding-right">

              <div class="users_list">
                 <h5>Сотрудники</h5>
                <?php foreach($users as $user): ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                              <a href="/user/<?php echo $user['id'];?>" 
                                  class="<?php if($categoryId==$user['id']) echo 'active';?>">
                                  <?php echo $user['name']." ".$user['surname'];?> <br>
                                  Специализация: <?php echo $user['spec'];?> <br>
                                  Рабочий стаж: <?php echo $user['work_exp'];?> мес.  <br>
                                  Email: <?php echo $user['email'];?>
                              </a>
                          </h4>
                          <a href="/admin/task/add/<?php echo $user['id'];?>">Добавить задачу</a> <br>
                          <a href="/admin/tasks/<?php echo $user['id'];?>">Задачи сотрудника</a>

                      </div>
                  </div>

              <?php endforeach; ?>
          </div>

      </div>

</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>