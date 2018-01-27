<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/main_menu.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->

                                <h2><?php echo $task['title']; ?></h2>
                                <p>Комментарий: <?php echo $task['coment']; ?></p>
                                <span>
                                    <span>Статус задачи: <?php echo $status; ?></span>
                                </span>




                                <?php if($status == "Текущая"): ?>

                                    <a class="btn btn-lg btn-success" href="#" data-toggle="modal"
                                    data-target="#basicModal">Отметить выполнение</a>

                                    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog">
                                     <div class="modal-dialog">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                            <button class="close" type="button" data-dismiss="modal">x</button>
                                            <h4 class="modal-title" id="myModalLabel">Заполните поля</h4>
                                        </div>



                                        <div class="modal-body">
                                          <form action="#" method="post" enctype="multipart/form-data" id="feedback_form">

                                            <h5>Комментарий к задаче</h5>
                                            <textarea  name="coment" rows="8"></textarea> 
                                            <h5>Выберите файл для загрузки</h5>
                                            <input type="file" name="uploaded_file[]" multiple  id="uploaded_file" >
                                            <input class="btn btn-primary" name="submit" type="submit" value="Отправить">
                                         </form>


                              </div>
                          </div>
                      </div>

                                <?php endif; ?>




                  </div><!--/product-information-->
              </div>
          </div>
      </div><!--/product-details-->
  </div>
</div>
</div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>