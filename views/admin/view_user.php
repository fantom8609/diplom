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





         <div class="col-sm-9 padding-right">
           
                    <div class="col-sm-7">
                    <h5>Информация о сотруднике</h5>
                        
                          <p>Имя: <?php echo $user['name']; ?></p>
                          <p>Фамилия: <?php echo $user['surname']; ?></p>
                          <p>Возраст: <?php echo $user['age']; ?></p>
                          <p>Специализация: <?php echo $user['spec']; ?></p>
                          <p>Рабочий стаж: <?php echo $user['work_exp']; ?> .мес</p>
                          <p>Email: <?php echo $user['email']; ?></p>
                         
                      
                  </div>

      </div>
  </div>
</div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>