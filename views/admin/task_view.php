<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/main_menu_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <h2><?php echo $task['title']; ?></h2>
                                <p>Комментарий: <?php echo $task['coment']; ?></p>
                                
                                
                                <span id="status-task">Статус: <?php echo Task::getStatusTask($task['status']); ?></span>
                                <span>Файлы:</span>
                                <a  target="_blank" href="<?php $path=$task['upload'];
                                $path_name=explode("/htdocs",$path);
                                print_r ($path_name[1]); ?>" download><?php $path=$task['upload'];
                                $name=explode("upload/",$path); print_r ($name[1]); ?></a><br>
                                
                                <a href="#" class="btn change-status-complete" data-id="<?php echo $task['id'];?>"><i class="fa fa-shopping-cart"></i>Отметить выполнение</a><br>
                                <a href="#" class="btn change-status-failed" data-id="<?php echo $task['id'];?>"><i class="fa fa-shopping-cart"></i>Отметить провал</a><br>
                                <a href="#" class="btn task-delete" data-id="<?php echo $task['id'];?>"><i class="fa fa-shopping-cart"></i>удалить</a>
                            </div><!--/product-information-->
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>