<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/main_menu_admin.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h5>Выберите категорию сотрудников:</h5>
                    
                    <div class="panel-group category-products">
                        <?php foreach ($categoryList as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id']; ?>"
                                           class="<?php if ($categoryId == $categoryItem['id']) echo 'active'; ?>"
                                           >                                                                                    
                                               <?php echo $categoryItem['name']; ?>
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

                <?php foreach($categoryUsers as $userItem): ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                              <a href="/user/<?php echo $userItem['id'];?>" 
                                  class="<?php if($categoryId==$userItem['id']) echo 'active';?>">
                                  <?php echo $userItem['name']." ".$userItem['surname'];?> <br>
                                  Специализация: <?php echo $userItem['spec'];?> <br>
                                  Рабочий стаж: <?php echo $userItem['work_exp'];?> мес.  <br>
                                  Email: <?php echo $userItem['email'];?>
                              </a>
                          </h4>
                      </div>
                  </div>

              <?php endforeach; ?>
          </div>
          
      </div>
        </div>
       
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>